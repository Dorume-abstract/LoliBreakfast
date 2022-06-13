<template>
<div class="sub_page">
 <div class="hero_area">

  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <food-type-component :types="foodTypes"/>

      <div class="filters-content">
        <div class="row grid">
          <food-item-component v-for="item in foodItems" :key="item.id" :item="item"></food-item-component>
        </div>
      </div>
    </div>
  </section>

  <!-- end food section -->
   </div>
</div>
</template>
<script>
import FoodTypeComponent from "@/components/FoodTypeComponent";
import FoodItemComponent from "@/components/FoodItemComponent";
import {mapActions, mapGetters} from 'vuex'
export default {
  name: "MenuView",
  components: {FoodTypeComponent, FoodItemComponent},

  data() {
    return {
      foodItems: [],
      foodTypes: []
    }
  },
  methods: {
    ...mapGetters(['getFoodItems', 'getFoodTypes']),
    ...mapActions(['getFoodItemsFromApi', 'getFoodTypesFromApi']),
  },
  mounted() {
    Promise.all([
        this.getFoodItemsFromApi(),
        this.getFoodTypesFromApi()
    ]).then((data)=>{
      this.foodItems = data[0];
      this.foodTypes = data[1];
    })
  }
}
</script>

<style scoped>

</style>