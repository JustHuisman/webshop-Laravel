<template>
    <div>
        <div class="product shadow">
            <div class="productContainer">
                <div class="productCloseButton" @click="hideProduct()"
                    style="cursor: pointer;">
                    <p>&#10005;</p>
                </div>
                <div class="product-image">
                    <div class="image">
                        <div v-if="discount > 0" class="sale">{{discount}}</div>
                        <img v-if="poster !== 0" v-bind:src="image">
                    </div>
                </div>
                <div class="product-info">
                    <h1>{{ poster.title }}</h1>
                    <div>
                        <button class="orientationButton" type="button" v-for="(orientation, index) in orientations"
                            :key="index" @click='updateOrientation(index)'>
                            {{ orientation }}
                        </button>
                    </div>
                    <div>
                        <button class="sizeButton" type="button" v-for="(size, index) in sizes" :key="index"
                            @click='updateSize(index)'>
                            {{ size }}
                        </button>
                    </div>
                    <div class="price">Price:</div>
                    <div v-show="originalPrice!== 0" class="price"
                        style="text-decoration: line-through; color: gray;">
                        &#36;{{ originalPrice }},-</div>
                    <div class="price">&#36;{{ price }},-</div>
                    <button v-on:click="addToCart(poster, orientations[selectedOrientation], sizes[selectedSize])">Add to Cart
                    </button>
                </div>
            </div>
        </div>
        <div class="productBackground" @click="hideProduct()"></div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Product Display Component mounted.')
        },
        data() {
            return {
                poster: 0,
                selectedOrientation: 0,
                orientations: ["Landscape", "Portrait"],
                selectedSize: 0,
                sizes: ["Large", "Medium", "Small"],
                productDiscount: 1,
            }
        },
        computed: {
            price(){
                return 0;
                //return (this.poster.price);
            },
            discount(){
                return 0;
                //return (this.poster.discount);
            },
            originalPrice(){
                return 0;
                
            },
            image(){
                if(this.selectedOrientation === 0){
                    return `/images/posters/landscape/${this.poster.id}.jpg`;
                } else {
                    return `/images/posters/portrait/${this.poster.id}.jpg`;
                }
            },
            productTitle(){
                return 0;
            },
        },
        methods: {
            showProduct: function() {
                this.updateOrientationButtons();
                this.updateSizeButtons();
                $('.product').fadeIn();
                $('.productBackground').fadeIn();
            },
            hideProduct: function() {
                $('.product').fadeOut();
                $('.productBackground').fadeOut();
            },
            updateOrientation: function(index) {
                this.selectedOrientation = index;
                this.updateOrientationButtons();
            },
            //loop through orientation buttons and set the current to 'selected'
            updateOrientationButtons: function() {
                let orientationButtons = document.querySelectorAll(".orientationButton");
                for(let i = 0; i < orientationButtons.length; i++) {
                    orientationButtons[i].classList.remove("selected");
                }
                orientationButtons[this.selectedOrientation].classList.add("selected");
            },
            updateSize: function(index) {
                this.selectedSize = index;
                this.updateSizeButtons();
            },
            //loop through size buttons and set the current to 'selected'
            updateSizeButtons: function() {
                let sizeButtons = document.querySelectorAll(".sizeButton");
                for(let i = 0; i < sizeButtons.length; i++) {
                    sizeButtons[i].classList.remove("selected");
                }
                sizeButtons[this.selectedSize].classList.add("selected");
            },
            //emit to the event bus (app.js) which item was added, the event bus is visible to all components
            addToCart: function(poster, orientation, size) {
                this.$root.$emit('add-to-cart', poster, orientation, size);
            }
        },
        created() {
            //emited from product.js when clicking on a product
            this.$root.$on('show-product', function(poster) {
                this.poster = poster;
                this.showProduct();
            }.bind(this));
        }
    }
</script>