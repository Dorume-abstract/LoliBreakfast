<template>
<ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li v-for="item in types" :key="item.type_id" :id="item.type_id">{{item.name}}</li>
      </ul>
</template>

<script>
export default {
  name: "FoodTypeComponent",
  data() {
    return {
    }
  },
  props: [
      'types'
  ]

}
</script>

<style scoped>

</style>