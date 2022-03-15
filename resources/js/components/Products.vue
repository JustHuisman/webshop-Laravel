<template>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        <product class="col-md-4 pt-3" v-for="product in products" :key="product.id" :product="product"></product>
        <infinite-loading @infinite="handleLoadMore"></infinite-loading>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Products Component mounted.')
        },
        data: function () {
            return {
                products: [],
                page: 1,
                checkedCategories: []
            };
        },
        props: {
            
        },
        methods: {
            handleLoadMore($state) {
                this.$http.get('/products?page=' + this.page)
                    .then(res => {
                        return res.json();
                    }).then(res => {
                        if(res.data.length){
                            $.each(res.data, (key, value) => {
                                this.products.push(value);
                            });
                            $state.loaded();
                        }
                        else 
                        { 
                            $state.complete();
                        }
                        
                    });
                this.page = this.page + 1;
            },
            addToCart(product) {
                this.$root.$emit('add-to-cart', product);
            },
            showProduct(product) {
                this.$root.$emit('show-product', product);
            },
        },
        created() {
            let self = this;

            // Get all products calling function in controller (Ajax call)
            axios({
                method: 'GET',
                url: 'home/products', //Didn't make the route yet!@!@!
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            }).then(function(response) {
                self.products = response.data.products;
            }).catch(function(response) {
                
            })

            this.$root.$on('update-categories', function(checkedCategories) {
                this.checkedCategories = checkedCategories;
            }.bind(this));
        }
    }
</script>
