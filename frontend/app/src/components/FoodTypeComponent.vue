<template>
<ul class="filters_menu">
        <li @click="onClickButton" class="active" data-filter="*" id="-1">All</li>
        <li @click="onClickButton" v-for="item in types" :key="item.id" :id="item.id">{{item.name}}</li>
      </ul>
</template>

<script>
export default {
  name: "FoodTypeComponent",
  data() {
    return {
    }
  },
  methods: {
    onClickButton(event) {
      this.$emit('clicked', event.target.id);
    }
  },
  props: [
      'types'
  ]

}
</script>

<style scoped>

</style>