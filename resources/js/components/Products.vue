<template>
    <div class="row">
        <div class="col-md-4 pt-3" v-for="product in products" v-bind:key="product.id">
            <div class="card">
                <img :src="'/images/posters/landscape/' + product.id + '.jpg'" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ product.name }}</h5>
                    <input type="button" class="btn btn-primary" :disabled="product.stock === 0" @click="addToCart(product)" value="Order">
                </div>
            </div>
        </div>
        <infinite-loading @distance="1" @infinite="handleLoadMore"></infinite-loading>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Products Component mounted.')
        },
        data: function () {
            return {
                // products: [
                //     {
                //         id: 1,
                //         title: "test"
                //     },
                //     {
                //         id: 2,
                //         title: "test"
                //     },
                // ],
                product: [],
                page: 1,
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
                        $.each(res.data, (key, value) => {
                            this.Products.push(value);
                        });
                        $state.loaded();
                    });
                this.page = this.page + 1;
            },
            addToCart(product) {
                this.$root.$emit('add-to-cart', product);
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
        }
    }
</script>
