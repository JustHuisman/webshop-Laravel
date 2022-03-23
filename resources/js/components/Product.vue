<template>
    <div v-show="isVisible" class="card" @click="showProduct(product) ">
        <img :src="image" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ product.name }}</h5>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Product Component mounted.')
        },
        props: ['product'],
        data: function () {
            return {
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
                },
                lowestPrice: 999999
            };
        },
        computed: {
            image(){
                return '/images/posters/portrait/' + this.product.id + '.jpg';
            },
            isVisible(){
                return this.checkIfVisible(this.product);
            }
        },
        methods: {
            showProduct() {
                this.$root.$emit('show-product', this.product);
            },
            checkIfVisible(_product){
                let self = this;
                let hasCategory = false;
                let hasOrientation = false;
                let hasSize = false;
                let inPriceRange = false;
                let hasDiscount = false;
                //check if the product exists
                if(_product){
                    //variations
                    if('product_variations' in _product){
                        _product.product_variations.forEach(function (variations) {
                            if(variations.orientation_id == 1 && self.filters.orientationLandscape == true){
                               hasOrientation = true;
                            }
                            if(variations.orientation_id == 2 && self.filters.orientationPortrait == true){
                                hasOrientation = true;
                            }
                            if(variations.size_id == 1 && self.filters.sizeLarge == true){
                                hasSize = true;
                            } else if(variations.size_id == 2 && self.filters.sizeMedium == true){
                                hasSize = true;
                            } else if(variations.size_id == 3 && self.filters.sizeSmall == true){
                                hasSize = true;
                                
                            }
                            if(parseFloat(variations.size.price) < self.lowestPrice){
                                self.lowestPrice = parseFloat(variations.size.price);
                            }
                            
                        })
                    }
                    
                    //check if the lowest available price of the product is in range of the filter
                    if (self.lowestPrice >= self.filters.priceLow && self.lowestPrice <= self.filters.priceHigh){
                        inPriceRange = true;
                    }

                    if(_product.discount_percentage > 0 && self.filters.checkedDiscount){
                        hasDiscount = true;
                    } else if (!self.filters.checkedDiscount){
                        hasDiscount = true;
                    }

                     //if no categories are checked, show everything
                    if(self.filters.checkedCategories.length === 0){
                        hasCategory = true;
                    //check if product categories exists in the object
                    } else if('product_categories' in _product){
                        _product.product_categories.forEach(function (cat) {
                            if(Object.values(self.filters.checkedCategories).includes(cat.category_id)){
                               hasCategory = true;
                            }
                        })
                    }
                    return (hasCategory && hasOrientation && hasSize && inPriceRange && hasDiscount);
                } else {
                    return false;
                }
            }
        },
        created() {
            this.$root.$on('update-filters', function(filters) {

                this.filters = filters;
                //this.checkIfVisible(this.product);
            }.bind(this));

            this.$root.$emit('fetch-filters');
        }
    }
</script>