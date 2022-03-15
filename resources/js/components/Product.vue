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
                checkedCategories: []
            };
        },
        computed: {
            image(){
                return '/images/posters/portrait/' + this.product.id + '.jpg';
            },
            isVisible(){
                let isTrue = this.checkIfVisible(this.product);
                console.log("is visible? " + isTrue);
                return isTrue;
            }
        },
        methods: {
            showProduct() {
                this.$root.$emit('show-product', this.product);
            },
            checkIfVisible(_product){
                let self = this;
                let isVisible = false;
                //check if the product exists
                if(_product){
                    //if no categories are checked, show everything
                    if(self.checkedCategories.length === 0){
                        return true;
                    //check if product categories exists in the object
                    } else if('product_categories' in _product){
                        _product.product_categories.forEach(function (cat) {
                            console.log(Object.values(self.checkedCategories).includes(cat.category_id));
                            if(Object.values(self.checkedCategories).includes(cat.category_id)){
                               isVisible = true;
                            }
                        })
                    } else {
                        isVisible = false;
                    }
                } else {
                    isVisible = false;
                }
                return isVisible;
            }
        },
        created() {
            this.$root.$on('update-categories', function(checkedCategories) {

                this.checkedCategories = checkedCategories;
                this.checkIfVisible(this.products);
            }.bind(this));
        }
    }
</script>