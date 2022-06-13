<template>
  <header-component/>
  <router-view/>
  <footer-component/>
</template>

<style>
</style>
<script>
import HeaderComponent from "@/components/HeaderComponent";
import FooterComponent from "@/components/FooterComponent";
import {mapActions} from "vuex";
export default {
  components: {FooterComponent, HeaderComponent},
  methods: {
    ...mapActions(['getFoodItemsFromApi', 'getFoodTypesFromApi']),
  },
  mounted() {
    Promise.all([
        this.getFoodItemsFromApi(),
        this.getFoodTypesFromApi()
    ])
  }
}
</script>