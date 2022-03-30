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
                        <div v-if="discount > 0" class="sale">{{discount}}&#37;</div>
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
                    <div v-if="price!==0" class="price">Price:</div>
                    <div v-show="originalPrice!== 0" class="price"
                        style="text-decoration: line-through; color: gray;">
                        &euro;{{ originalPrice }}</div>
                    <div v-if="price!==0" class="price">&euro;{{ this.price }}</div>
                    <div v-else class="price">Out of stock</div>
                    <button class="addToCart" v-on:click="addToCart(poster, orientations[selectedOrientation], sizes[selectedSize], price, discount, originalPrice)">Add to Cart
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
                addToCartButton: null,
            }
        },
        computed: {
            price(){
                let price = 0;
                if(this.selectedOrientation == 0){
                    if(this.sizeButtonsLandscape.length > 0){
                        if(this.sizeButtonsLandscape[this.selectedSize].disabled == false){
                            price = this.getPrice("discounted");
                        }
                    }
                } else if(this.selectedOrientation == 1){
                    if(this.sizeButtonsPortrait.length > 0){
                        if(this.sizeButtonsPortrait[this.selectedSize].disabled == false){
                            price = this.getPrice("discounted");
                        }
                    }
                }
                return price;
            },
            discount(){
                self = this;
                return parseFloat(self.poster.discount_percentage);
            },
            originalPrice(){
                let price = 0;
                if(this.selectedOrientation == 0){
                    if(this.sizeButtonsLandscape.length > 0){
                        if(this.sizeButtonsLandscape[this.selectedSize].disabled == false){
                            price = this.getPrice("original");
                        }
                    }
                } else if(this.selectedOrientation == 1){
                    if(this.sizeButtonsPortrait.length > 0){
                        if(this.sizeButtonsPortrait[this.selectedSize].disabled == false){
                            price = this.getPrice("original");
                        }
                    }
                }
                return price;
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
                this.updateAddToCartButton();
                
            },
            hideProduct: function() {
                $('.product').fadeOut();
                $('.productBackground').fadeOut();
            },
            updateAddToCartButton: function() {
                this.addToCartButton.disabled = false;
                if(this.selectedOrientation == 0){
                    if(this.sizeButtonsLandscape.length > 0){
                        if(this.sizeButtonsLandscape[this.selectedSize].disabled == true){
                            this.addToCartButton.disabled = true;
                        }
                    }
                } else if(this.selectedOrientation == 1){
                    if(this.sizeButtonsPortrait.length > 0){
                        if(this.sizeButtonsPortrait[this.selectedSize].disabled == true){
                            this.addToCartButton.disabled = true;
                        }
                    }
                }
            },
            updateOrientation: function(index) {
                this.selectedOrientation = index;
                this.updateOrientationButtons();
                this.updateAddToCartButton();
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
                this.updateAddToCartButton();
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
                self = this;
                if('variations' in self.poster){
                    
                    self.availableOrientations = [];
                    self.availableSizesLandscape = [];
                    self.availableSizesPortrait = [];
                    self.poster.variations.forEach(function (variations) {
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
                        else if(variations.orientation_id == 2){
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

                    //reset
                    self.orientationButtons[0].disabled = false;
                    self.orientationButtons[1].disabled = false;
                    self.sizeButtonsLandscape[0].disabled = false;
                    self.sizeButtonsLandscape[1].disabled = false;
                    self.sizeButtonsLandscape[2].disabled = false;
                    self.sizeButtonsPortrait[0].disabled = false;
                    self.sizeButtonsPortrait[1].disabled = false;
                    self.sizeButtonsPortrait[2].disabled = false;

                    if(!self.availableOrientations.includes("Landscape")){
                        self.orientationButtons[0].disabled = true;
                    }
                    if(!self.availableOrientations.includes("Portrait")){
                        self.orientationButtons[1].disabled = true;
                    }
                    if(!self.availableSizesLandscape.includes("Large")){
                        self.sizeButtonsLandscape[0].disabled = true;
                    }
                    if(!self.availableSizesLandscape.includes("Medium")){
                        self.sizeButtonsLandscape[1].disabled = true;
                    }
                    if(!self.availableSizesLandscape.includes("Small")){
                        self.sizeButtonsLandscape[2].disabled = true;
                    }
                    if(!self.availableSizesPortrait.includes("Large")){
                        self.sizeButtonsPortrait[0].disabled = true;
                    }
                    if(!self.availableSizesPortrait.includes("Medium")){
                        self.sizeButtonsPortrait[1].disabled = true;
                    }
                    if(!self.availableSizesPortrait.includes("Small")){
                        self.sizeButtonsPortrait[2].disabled = true;
                    }
                }
            },
            getPrice: function(method){
                let price = 0;
                if('variations' in this.poster){
                    self = this;
                    self.availableOrientations = [];
                    self.availableSizes = [];
                    self.poster.variations.forEach(function (variations) {
                        if(variations.orientation_id == (self.selectedOrientation + 1) && variations.size_id == (self.selectedSize +1)){
                            let priceTemp = parseFloat(variations.size.price);
                            let discount = parseFloat(self.poster.discount_percentage);
                            if(method === "discounted"){
                                price = (priceTemp - (priceTemp / 100 * discount)).toFixed(2);
                            } else if(method === "original"){
                                price = (priceTemp).toFixed(2);
                            }
                        }
                    })
                }   
                return price;
            },
            getVariationButtons: function(){
                this.orientationButtons = document.querySelectorAll(".orientationButton");
                this.sizeButtonsLandscape = document.querySelectorAll(".sizeButtonLandscape");
                this.sizeButtonsPortrait = document.querySelectorAll(".sizeButtonPortrait");
                this.addToCartButton = document.querySelector(".addToCart");
            },
            //emit to the event bus (app.js) which item was added, the event bus is visible to all components
            addToCart: function(poster, orientation, size, price, discount, originalPrice) {
                this.$root.$emit('add-to-cart', poster, orientation, size, price, discount, originalPrice);
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