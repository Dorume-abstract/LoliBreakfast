<template>
    <ul class="filters_menu">
        <li @click="onClickButton" class="active" data-filter="*" id="-1">All</li>
        <li @click="onClickButton" class="" v-for="item in types" :key="item.id" :id="item.id">{{ item.name }}</li>
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
            this.removeActive();
            event.target.classList.add('active');
            this.$emit('clicked', event.target.id);
        },
        removeActive() {
            Array.from(document.querySelector('.filters_menu').getElementsByTagName('li')).forEach(item => {
                item.classList.remove('active')
            })
        }
    },
    props: [
        'types'
    ]

}
</script>

<style scoped>
</style>