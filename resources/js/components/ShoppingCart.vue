<template>
    <div>
        <div class="cart p-3 shadow">
            <div class="cartCloseButton" @click="closeCart()" style="cursor: pointer;">
                <p>&#10005;</p>
            </div>
            <div class="row mb-3" v-for="(item, index) in cart.items" :key="index">
                <div class="col-md-4">
                    <img :src="'/images/posters/' + (item.orientation).toLowerCase() + '/' + item.id + '.jpg'" width="100%">
                </div>
                <div class="col-md-3">{{ item.name + " " + item.orientation + " " + item.size }}</div>
                <div class="col-md-1">{{ item.amount }}</div>
                <div class="col-md-2">&euro;{{ item.price }}</div>
                <div class="col-md-2">&euro;{{ item.totalPrice }}</div>
            </div>

            <div class="row mt-3">
                <div class="col-md-2"></div>
                <div class="col-md-5">Total</div>
                <div class="col-md-1">{{ cart.totalItems }}</div>
                <div class="col-md-2"></div>
                <div class="col-md-2">&euro;{{ cart.totalPrice }}</div>
                <div class="totalDiscount" v-show="cart.totalDiscount>0">You saved &euro;{{ cart.totalDiscount }}</div>
            </div>
        </div>
        <div class="cartBackground" @click="closeCart()"></div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                cart: window.localStorage.getItem('cart') !== null ? JSON.parse(window.localStorage.getItem('cart')) : {},
            }
        },

        props: {
            
        },

        methods: {
            closeCart() {
                $('.cartBackground').fadeOut(); 
                $('.cart').fadeOut();
            },

            showCart() {
                $('.cartBackground').fadeIn();
                $('.cart').fadeIn({
                });
            },
        },
        created() {
            this.$root.$on('show-cart', function() {
                this.showCart();
            }.bind(this));
            
        }
    }
</script>