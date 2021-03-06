require('./bootstrap');
import $ from 'jquery'
import _ from 'lodash';
window.$ = window.jQuery = $;
window.Vue = require('vue').default;
import VueResource from 'vue-resource';
Vue.use(VueResource);

Vue.component('products', require('./components/Products.vue').default);
Vue.component('product', require('./components/Product.vue').default);
Vue.component('InfiniteLoading', require('vue-infinite-loading'));
Vue.component('product-display', require('./components/ProductDisplay.vue').default);
Vue.component('product-filters', require('./components/ProductFilters.vue').default);
Vue.component('shopping-cart', require('./components/ShoppingCart.vue').default);
Vue.component('shopping-cart-icon', require('./components/ShoppingCartIcon.vue').default);



//Make sure to have an instance of Terminal running: npm run watch
//This will ensure vue gets compiled automatically

const app = new Vue({
    el: '#app',
    data: {
        appName: 'Poster Space',
    },

    mounted() {
        // Add a 'listner'
        this.$on('add-to-cart', (product, orientation, size, price, discount, originalPrice) => {
            this.addToCart(product, orientation, size, price, discount, originalPrice)
        });

        this.$on('remove-item', (item) => {
            this.removeItemFromCart(item);
        });

        this.$on('add-item', (item) => {
            this.addItemToCart(item);
        });

        this.updateTotalsOnLoad();
    },

    methods: {
        /**
         * Adds a new product to the cart or changes the amount of an 
         *  existing product in the cart
         */
        addToCart(product, orientation, size, price, discount, originalPrice) {
            // Check if localStorage key 'cart' is allready initialized
            // if not, then create localStorage entry and add first product
            // Finaly update the cart in the shopping-cart component
            if (window.localStorage.getItem('cart') === null) {
                this.$refs.shoppingCart.cart = this.initCart(product, orientation, size, price, discount, originalPrice);
                window.localStorage.setItem('cart', JSON.stringify(this.$refs.shoppingCart.cart));

                return;
            }

            // Update cart
            this.updateCart(product, orientation, size, price, discount, originalPrice);
        },

        /**
         * Initialize a new shopping cart
         */
        initCart(product, orientation, size, price, discount, originalPrice) {
            return {
                totalItems: 1,
                totalPrice: price,
                totalDiscount: ((parseFloat(originalPrice) / 100) * discount),
                items: [
                    this.addNewProductToCart(product, orientation, size, price, discount, originalPrice),
                ]
            }
        },


        /**
         * Update the entire shopping cart and calculate totals
         * 
         */
        updateCart(product, orientation, size, price, discount, originalPrice) {
            // Get and parse the cart from localStorage
            let cart = JSON.parse(window.localStorage.getItem('cart'));
            let itemIndex = false;

            // Check if the product to add to the cart allready exist in the cart
            cart.items.forEach(function(item, index) {
                if (item.id === product.id && item.orientation === orientation && item.size === size) {
                    itemIndex = index; // Product found in cart
                }
            });

            // If product was found in the cart
            //  itemIndex is the index in the array of the products in the cart
            //  and then update the ammount and totalPrice of this product
            if (itemIndex !== false) {
                cart.items[itemIndex].amount++;
                cart.items[itemIndex].totalPrice = (cart.items[itemIndex].amount * parseFloat(cart.items[itemIndex].price)).toFixed(2);
                cart.items[itemIndex].totalDiscount = cart.items[itemIndex].amount * ((parseFloat(cart.items[itemIndex].originalPrice) / 100) * cart.items[itemIndex].discount);
            } else {
                // Product not found, so add it to the cart
                cart.items.push(this.addNewProductToCart(product, orientation, size, price, discount, originalPrice));
            }

            this.updateAndStoreCart(cart);
        },

        /**
         * Create a new product object
         * 
         * @param product (object)
         * @return altered object
         */
        addNewProductToCart(product, orientation, size, price, discount, originalPrice) {
            return {
                id: product.id,
                name: product.name,
                orientation: orientation,
                size: size,
                price: price,
                discount: discount,
                originalPrice: originalPrice,
                amount: 1,
                totalPrice: price,
            }
        },

        /**
         * 
         * @param cart (object)
         * @returns total amount of products and totalPrice of all products
         */
        updateTotals(cart) {
            let totalItems = 0;
            let totalPrice = 0;
            let totalDiscount = 0;

            cart.items.forEach(item => {
                totalItems += item.amount;
                totalPrice += (item.amount * parseFloat(item.price));
                totalDiscount += (item.amount * (parseFloat(item.originalPrice) / 100) * item.discount);
            });

            this.$root.$emit('update-total-items', totalItems);

            return {
                totalItems: totalItems,
                totalPrice: totalPrice.toFixed(2),
                totalDiscount: totalDiscount.toFixed(2),
            }
        },

        updateTotalsOnLoad(){
            // Get and parse the cart from localStorage
            let cart = JSON.parse(window.localStorage.getItem('cart'));
            if (cart !== null) {
                let totalItems = 0;

                cart.items.forEach(item => {
                    totalItems += item.amount;
                });

                this.$root.$emit('update-total-items', totalItems);
            }
        },

        updateAndStoreCart(cart){
            // Finaly update the 'super totals': total products in cart
            //  and totalPrice of all the products in the cart
            let totals = this.updateTotals(cart);

            // Update the cart
            cart.totalItems = totals.totalItems;
            cart.totalPrice = totals.totalPrice;
            cart.totalDiscount = totals.totalDiscount;

            // Update the cart in the shopping-cart component
            this.$refs.shoppingCart.cart = cart;

            // And finaly update localStorage
            window.localStorage.setItem('cart', JSON.stringify(cart));
        },

        removeItemFromCart(item) {
            let cart = JSON.parse(window.localStorage.getItem('cart'));
            if (cart !== null) {
                let itemIndex = false;

                // Check if the product to remove in cart exist in the cart
                cart.items.forEach(function(i, index) {
                    if (item.id === i.id && item.orientation === i.orientation && item.size === i.size) {
                        itemIndex = index; // Product found in cart
                    }
                });

                // If product was found in the cart
                //  itemIndex is the index in the array of the products in the cart
                //  and then update the amount and totalPrice of this product
                if (itemIndex !== false) {
                    cart.items[itemIndex].amount--;
                    cart.items[itemIndex].totalPrice = (cart.items[itemIndex].amount * parseFloat(cart.items[itemIndex].price)).toFixed(2);
                    cart.items[itemIndex].totalDiscount = cart.items[itemIndex].amount * ((parseFloat(cart.items[itemIndex].originalPrice) / 100) * cart.items[itemIndex].discount);

                    if(cart.items[itemIndex].amount <= 0){
                        cart.items.splice(itemIndex, 1);
                    }
                }
                
            }
            this.updateAndStoreCart(cart);

        },

        addItemToCart(item){
            let cart = JSON.parse(window.localStorage.getItem('cart'));
            if (cart !== null) {
                let itemIndex = false;

                // Check if the product to add to the cart already exist in the cart
                cart.items.forEach(function(i, index) {
                    if (item.id === i.id && item.orientation === i.orientation && item.size === i.size) {
                        itemIndex = index; // Product found in cart
                    }
                });

                // If product was found in the cart
                //  itemIndex is the index in the array of the products in the cart
                //  and then update the amount and totalPrice of this product
                if (itemIndex !== false) {
                    cart.items[itemIndex].amount++;
                    cart.items[itemIndex].totalPrice = (cart.items[itemIndex].amount * parseFloat(cart.items[itemIndex].price)).toFixed(2);
                    cart.items[itemIndex].totalDiscount = cart.items[itemIndex].amount * ((parseFloat(cart.items[itemIndex].originalPrice) / 100) * cart.items[itemIndex].discount);
                }
                
            }
            this.updateAndStoreCart(cart);
        },

        closeShoppingCart() {
            $('.layer').fadeOut(); 
            $('.cart').fadeOut();
        },
    }
});
