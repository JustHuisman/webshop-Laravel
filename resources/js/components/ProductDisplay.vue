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
                    <h1>{{ this.productTitle }}</h1>
                    <div>
                        <button class="orientationButton" type="button" v-for="(orientation, index) in orientations"
                            :key="index" @click='updateOrientation(index)'>
                            {{ orientation }}
                        </button>
                    </div>
                    <div>
                        <button class="sizeButtonLandscape" type="button" v-show="selectedOrientation == 0" v-for="(size, index) in sizes" :key="index"
                            @click='updateSize(index)'>
                            {{ size }}
                        </button>
                        <button class="sizeButtonPortrait" type="button" v-show="selectedOrientation == 1" v-for="(size, index) in sizes" :key="index+3"
                            @click='updateSize(index)'>
                            {{ size }}
                        </button>
                    </div>
                    <div class="price">Price:</div>
                    <div v-show="originalPrice!== 0" class="price"
                        style="text-decoration: line-through; color: gray;">
                        &#36;{{ originalPrice }},-</div>
                    <div class="price">&#36;{{ this.price }},-</div>
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
                availableOrientations: [],
                selectedSize: 0,
                sizes: ["Large", "Medium", "Small"],
                availableSizesLandscape: [],
                availableSizesPortrait: [],
                orientationButtons: [],
                sizeButtonsLandscape: [],
                sizeButtonsPortrait: [],
                productDiscount: 1,
            }
        },
        computed: {
            price(){
                let price = 0;
                if(this.selectedOrientation == 0){
                    if(this.sizeButtonsLandscape.length > 0){
                        if(this.sizeButtonsLandscape[this.selectedSize].disabled == false){
                            price = this.getPrice();
                        }
                    }
                } else if(this.selectedOrientation == 1){
                    if(this.sizeButtonsPortrait.length > 0){
                        if(this.sizeButtonsPortrait[this.selectedSize].disabled == false){
                            price = this.getPrice();
                        }
                    }
                }
                return price;
            },
            discount(){
                return 0;
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
                return this.poster.name;
            },
        },
        methods: {
            showProduct: function() {
                $('.product').fadeIn();
                $('.productBackground').fadeIn();
                this.getVariationButtons();
                this.$forceUpdate();
                this.setAvailableVariations();
                this.updateOrientationButtons();
                this.updateSizeButtons();
                
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
                for(let i = 0; i < this.orientationButtons.length; i++) {
                    this.orientationButtons[i].classList.remove("selected");
                }
                this.orientationButtons[this.selectedOrientation].classList.add("selected");
            },
            updateSize: function(index) {
                this.selectedSize = index;
                this.updateSizeButtons();
            },
            //loop through size buttons and set the current to 'selected'
            updateSizeButtons: function() {
                for(let i = 0; i < this.sizeButtonsLandscape.length; i++) {
                    this.sizeButtonsLandscape[i].classList.remove("selected");
                }
                for(let i = 0; i < this.sizeButtonsPortrait.length; i++) {
                    this.sizeButtonsPortrait[i].classList.remove("selected");
                }
                this.sizeButtonsLandscape[this.selectedSize].classList.add("selected");
                this.sizeButtonsPortrait[this.selectedSize].classList.add("selected");
            },
            setAvailableVariations: function(){
                if('product_variations' in this.poster){
                    self = this;
                    self.availableOrientations = [];
                    self.availableSizes = [];
                    self.poster.product_variations.forEach(function (variations) {
                        if(variations.orientation_id == 1){
                            self.availableOrientations.push("Landscape");

                            if(variations.size_id == 1){
                                self.availableSizesLandscape.push("Large");
                            } else if(variations.size_id == 2){
                                self.availableSizesLandscape.push("Medium");
                            } else if(variations.size_id == 3){
                                self.availableSizesLandscape.push("Small"); 
                            }
                        }
                        if(variations.orientation_id == 2){
                            self.availableOrientations.push("Portrait");

                            if(variations.size_id == 1){
                                self.availableSizesPortrait.push("Large");
                            } else if(variations.size_id == 2){
                                self.availableSizesPortrait.push("Medium");
                            } else if(variations.size_id == 3){
                                self.availableSizesPortrait.push("Small"); 
                            }
                        }
                    })
                    //return unique entries in arrays
                    self.availableOrientations = [...new Set(self.availableOrientations)];
                    self.availableSizesLandscape = [...new Set(self.availableSizesLandscape)];
                    self.availableSizesPortrait = [...new Set(self.availableSizesPortrait)];

                    
                    if(!self.availableOrientations.includes("Landscape")){
                        this.orientationButtons[0].disabled = true;
                    }
                    if(!self.availableOrientations.includes("Portrait")){
                        this.orientationButtons[1].disabled = true;
                    }
                    if(self.selectedOrientation == 0){
                        if(!self.availableSizesLandscape.includes("Large")){
                            this.sizeButtonsLandscape[0].disabled = true;
                        }
                        if(!self.availableSizesLandscape.includes("Medium")){
                            this.sizeButtonsLandscape[1].disabled = true;
                        }
                        if(!self.availableSizesLandscape.includes("Small")){
                            this.sizeButtonsLandscape[2].disabled = true;
                        }
                    } else if(self.selectedOrientation == 1){
                        if(!self.availableSizesPortrait.includes("Large")){
                            this.sizeButtonsPortrait[0].disabled = true;
                        }
                        if(!self.availableSizesPortrait.includes("Medium")){
                            this.sizeButtonsPortrait[1].disabled = true;
                        }
                        if(!self.availableSizesPortrait.includes("Small")){
                            this.sizeButtonsPortrait[2].disabled = true;
                        }
                    }
                }
            },
            getPrice: function(){
                let price = 0;
                if('product_variations' in this.poster){
                    self = this;
                    self.availableOrientations = [];
                    self.availableSizes = [];
                    self.poster.product_variations.forEach(function (variations) {
                        if(variations.orientation_id == (self.selectedOrientation + 1) && variations.size_id == (self.selectedSize +1)){
                            price = variations.size.price;
                        }
                    })
                }   
                return price;
            },
            getVariationButtons: function(){
                this.orientationButtons = document.querySelectorAll(".orientationButton");
                this.sizeButtonsLandscape = document.querySelectorAll(".sizeButtonLandscape");
                this.sizeButtonsPortrait = document.querySelectorAll(".sizeButtonPortrait");
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