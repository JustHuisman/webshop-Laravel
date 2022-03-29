<template>
    <div>
        <img class="navCartImg" src="/images/icons/cart.svg" @click="showCart()" width="32" height="32">
        <span class="cartAmount badge bg-primary" v-if="(cartAmount>0)">{{cartAmount}}</span>
    </div>
</template>

<script>
    export default {
        
        data: function () {
            return {
                cartAmount: 0,
            };
        },
        methods: {
            showCart() {
                this.$root.$emit('show-cart');
            },
        },
        created() {
            this.$root.$on('update-total-items', function(totalItems) {

                this.cartAmount = totalItems;

            }.bind(this));
        }
    }
</script>