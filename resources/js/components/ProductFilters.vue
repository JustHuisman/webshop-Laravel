<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 productFilters">
                <form>
                    <p class="productFiltersTitle">Orientation</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterLandscape" v-model="filters.orientationLandscape" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                        Landscape
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterPortrait" v-model="filters.orientationPortrait" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        Portrait
                        </label>
                    </div>
                    <hr>
                    <p class="productFiltersTitle">Size</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterLarge" v-model="filters.sizeLarge" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                        Large
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterMedium" v-model="filters.sizeMedium" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        Medium
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterSmall" v-model="filters.sizeSmall" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        Small
                        </label>
                    </div>
                    <hr>
                    <p class="productFiltersTitle">Price</p>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Min:</span>
                        <input type="text" class="form-control" aria-label="Minimum price" value=0 id="filterMinPrice" v-model="filters.priceLow">
                        <span class="input-group-text">€</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Max:</span>
                        <input type="text" class="form-control" aria-label="Maximum price" value=9999 id="filterMaxPrice" v-model="filters.priceHigh">
                        <span class="input-group-text">€</span>
                    </div>
                    <div class="form-check">    
                        <input class="form-check-input" type="checkbox" value="" id="filterDiscount" v-model="filters.checkedDiscount">
                        <label class="form-check-label" for="flexCheckChecked">
                        Discount only
                        </label>
                    </div>
                    <hr>
                    <p class="productFiltersTitle">Category</p>
                    <div v-for="category in categories" v-bind:key="category.id">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" :value="category.id" 
                            :id="category.id" 
                            v-model="filters.checkedCategories">
                            <label class="form-check-label" for="flexCheckDefault">
                            {{ category.name }}
                            </label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('ProductFilters Component mounted.');
        },
        data: function() {
            return {
                categories: [],
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
        methods: {
            updateFilters: function(){
                this.$root.$emit('update-filters', this.filters);
            },
            loadMoreProducts: function(){
                this.$root.$emit('load-more-products');
            }
        },
        computed: {
            //filters computed into parts for Watch
            checkedCategories(){
                this.loadMoreProducts();
                return this.filters.checkedCategories;
            },
            orientationLandscape(){
                this.loadMoreProducts();
                return this.filters.orientationLandscape;
            },
            orientationPortrait(){
                this.loadMoreProducts();
                return this.filters.orientationPortrait;
            },
            sizeLarge(){
                this.loadMoreProducts();
                return this.filters.sizeLarge;
            },
            sizeMedium(){
                this.loadMoreProducts();
                return this.filters.sizeMedium;
            },
            sizeSmall(){
                this.loadMoreProducts();
                return this.filters.sizeSmall;
            },
            priceLow(){
                this.loadMoreProducts();
                return this.filters.priceLow;
            },
            priceHigh(){
                this.loadMoreProducts();
                return this.filters.priceHigh;
            },
            checkedDiscount(){
                this.loadMoreProducts();
                return this.filters.checkedDiscount;
            }
        },
        watch: {
            //watch for changes in filters (split up in parts, because converting to deepscan would take too long)
            checkedCategories() {
                this.updateFilters();
            },
            orientationLandscape() {
                this.updateFilters();
            },
            orientationPortrait() {
                this.updateFilters();
            },
            sizeLarge() {
                this.updateFilters();
            },
            sizeMedium() {
                this.updateFilters();
            },
            sizeSmall() {
                this.updateFilters();
            },
            priceLow() {
                this.updateFilters();
            },
            priceHigh() {
                this.updateFilters();
            },
            checkedDiscount() {
                this.updateFilters();
            }
            
        },
        created() {
            let self = this;

            // Get all products calling function in controller (Ajax call)
            axios({
                method: 'GET',
                url: 'home/categories',
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            }).then(function(response) {
                self.categories = response.data.categories;
            }).catch(function(response) {
            })
            this.$root.$on('fetch-filters', function() {
                this.updateFilters();
            }.bind(this));
        },
    }
</script>
