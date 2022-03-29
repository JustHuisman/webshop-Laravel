<template>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        <product class="col-md-4 pt-3" v-for="product in products" :key="product.id" :product="product"></product>
        <infinite-loading @infinite="handleLoadMore" ref="infiniteLoading">
            <div slot="no-more"></div>
            <div slot="no-results"></div>
        </infinite-loading>
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
                filters: {
                    checkedCategories: [],
                    orientationLandscape: true,
                    orientationPortrait: true,
                    sizeLarge: true,
                    sizeMedium: true,
                    sizeSmall: true,
                    priceLow: 0,
                    priceHigh: 9999,
                    checkedDiscount: false
                }
            };
        },
        props: {
            
        },
        methods: {
            resetInfiniteLoadingState(){
                if(this.$refs.infiniteLoading){
                    this.$refs.infiniteLoading.stateChanger.reset();
                }
                
            },
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

            this.$root.$on('update-filters', function(filters) {
                this.filters = filters;
                
            }.bind(this));

            this.$root.$on('load-more-products', function() {
                this.resetInfiniteLoadingState();
            }.bind(this));
        }
    }
</script>
