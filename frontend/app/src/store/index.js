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
    getFoodItemsFromApi({ commit }) {
      return axios.get('http://127.0.0.1:8000/api/food/', {
        method: "GET"
      }).then((food)=> {
        commit('setFoodItems', food.data);
      }).catch((err)=> {
        console.warn(err)
      })
    }
  },
  modules: {
  }
})
