<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    <p>Orientation</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterLandscape" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                        Landscape
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterPortrait" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        Portrait
                        </label>
                    </div>

                    <p>Size</p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterLarge" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                        Large
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterMedium" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        Medium
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterSmall" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                        Small
                        </label>
                    </div>

                    <p>Price</p>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Min:</span>
                        <input type="text" class="form-control" aria-label="Minimum price" value=0 id="filterMinPrice">
                        <span class="input-group-text">€</span>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Max:</span>
                        <input type="text" class="form-control" aria-label="Maximum price" id="filterMaxPrice">
                        <span class="input-group-text">€</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filterPortrait">
                        <label class="form-check-label" for="flexCheckChecked">
                        Discount only
                        </label>
                    </div>
                    
                    <p>Category</p>
                    <div v-for="category in categories" v-bind:key="category.id">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="filterCategoryLorem" checked>
                            <label class="form-check-label" for="flexCheckDefault">
                            {{ category.name }}
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('ProductFilters Component mounted.')
        },
        data: function() {
            return {
                categories: [],
            };
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
    },
    }
</script>
