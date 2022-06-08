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
export default {
  components: {FooterComponent, HeaderComponent}
}
</script>