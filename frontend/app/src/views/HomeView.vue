<template>
    <div class="hero_area">
        <div class="bg-box">
            <img src="images/hero-bg.jpg" alt="">
        </div>
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            High-Quality Food
                                        </h1>
                                        <p>
                                            Quality is the basis of everything. 
                                            We combine the freshest ingredients with the most experienced chefs 
                                            and get a quality you have never seen before.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Fast
                                        </h1>
                                        <p>
                                            Nothing is more annoying than waiting! 
                                            We, as your faithful ally, will save you from this horror!
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Order Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Wine Marlborough Sun Sauvignon Blanc
                                        </h1>
                                        <p>
                                            Excellent dry white wine from the grape variety Sauvignon Blanc
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Order Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <ol class="carousel-indicators">
                        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                        <li data-target="#customCarousel1" data-slide-to="1"></li>
                        <li data-target="#customCarousel1" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>

        </section>
        <!-- end slider section -->
    </div>

    <!-- offer section -->

    <section class="offer_section layout_padding-bottom">
        <div class="offer_container">
            <div class="container ">
                <div class="row">
                    <template v-for="item in foodItems" :key="item.id">
                      <template v-if="item.topDiscount">
                        <top-discount-food-component :item="item"/>
                      </template>
                    </template>
                </div>
            </div>
        </div>
    </section>

    <!-- end offer section -->

    <!-- food section -->

    <section class="food_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Our Menu
                </h2>
            </div>

            <food-type-component @clicked="onClickFoodType" :types="foodTypes" />

            <div class="filters-content">
                <div class="row grid">
                    <food-item-component v-for="item in foodItems.slice(0, 39)" :key="item.id" :item="item">
                    </food-item-component>
                </div>
            </div>
            <div class="btn-box">
                <router-link to="/menu">
                    View More
                </router-link>
            </div>
        </div>
    </section>

    <!-- end food section -->

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container  ">

            <div class="row">
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="images/about-img.png" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>
                                We are the Ally restaurant
                            </h2>
                        </div>
                        <p>
                            Hello! We are Ally restaurant because we are your best ally on the battlefield called
                            Kitchen!
                            We have the best dishes and prices in this field and you, my faithful friend, should choose
                            the best side!
                        </p>
                        <router-link to="/about">
                            Read More
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- book section -->
    <book-table-component />
    <!-- end book section -->

    <!-- client section -->

    <section class="client_section layout_padding-bottom">
        <carousel :items-to-show="1" :wrapAround="true">
            <slide :key="slide">
                <div class="item">
                    <div class="box">
                        <div class="detail-box">
                            <p>
                                The best restaurant ever!!
                            </p>
                            <h6>
                                Moana Michell
                            </h6>
                        </div>
                        <div class="img-box">
                            <img src="images/client1.jpg" alt="" class="box-img">
                        </div>
                    </div>
                </div>
            </slide>

            <slide :key="slide">
                <div class="item">
                    <div class="box">
                        <div class="detail-box">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                            </p>
                            <h6>
                                Moana Michell
                            </h6>
                            <p>
                                magna aliqua
                            </p>
                        </div>
                        <div class="img-box">
                            <img src="images/client1.jpg" alt="" class="box-img">
                        </div>
                    </div>
                </div>
            </slide>
            <slide :key="slide">
                <div class="item">
                    <div class="box">
                        <div class="detail-box">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                            </p>
                            <h6>
                                Moana Michell
                            </h6>
                            <p>
                                magna aliqua
                            </p>
                        </div>
                        <div class="img-box">
                            <img src="images/client1.jpg" alt="" class="box-img">
                        </div>
                    </div>
                </div>
            </slide>

            <template #addons>
                <navigation />
                <pagination />
            </template>
        </carousel>
    </section>

    <!-- end client section -->
</template>

<script>
import { mapActions } from "vuex";
import { mapGetters } from 'vuex'
import FoodItemComponent from "@/components/FoodItemComponent";
import FoodTypeComponent from "@/components/FoodTypeComponent";
import BookTableComponent from "@/components/BookTableComponent";
import TopDiscountFoodComponent from "@/components/TopDiscountFoodComponent";
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';


export default {
    name: "HomeView",
    components: {
        BookTableComponent, TopDiscountFoodComponent, FoodTypeComponent, FoodItemComponent, Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    data() {
        return {
            foodItems: [],
            foodTypes: []
        }
    },
    methods: {
        ...mapActions(['getFoodItemsFromApi', 'getFoodTypesFromApi']),
        ...mapGetters(['getFoodItems']),
        onClickFoodType(id) {
            if (id == -1) {
                this.foodItems = this.getFoodItems();
                return;
            }

            this.foodItems = this.getFoodItems().filter(item => {
                return item.type_id == id;
            })
        }
    },
    mounted() {
        Promise.all([
            this.getFoodItemsFromApi(),
            this.getFoodTypesFromApi()
        ]).then((data) => {
            this.foodItems = data[0];
            this.foodTypes = data[1];
        })
    }
}

</script>

<style scoped>
.client_section{
    margin: 20px;
}
</style>