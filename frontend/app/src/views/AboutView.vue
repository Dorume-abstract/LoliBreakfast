<template>
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
              Hello! We are Ally restaurant because we are your best ally on the battlefield called Kitchen! 
              We have the best dishes and prices in this field and you, my faithful friend, should choose the best side!
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
</template>

<script>
import HeaderComponentVue from '@/components/HeaderComponent.vue'

export default {
  name: "AboutView",
  components: HeaderComponentVue
}
</script>

<style scoped>

</style>