import { createStore } from 'vuex'
import axios from 'axios'

export default createStore({
  state: {
    foodItems: []
  },
  getters: {
    getFoodItems(state) {
      return state.foodItems;
    }
  },
  mutations: {
    setFoodItems(state, newItems) {
      state.foodItems = newItems;
      console.log(state.foodItems);
    }
  },
  actions: {
    getFoodItemsFromApi({commit}) {
      return axios.get('http//localhost:8000/api/food/', {
        method: "GET"
      }).then((foods)=> {
        commit('setFoodItems', foods);
      }).catch((err)=> {
        console.warn(err)
      })
    }
  },
  modules: {
  }
})
