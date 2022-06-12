import { createStore } from 'vuex'
import axios from 'axios'

export default createStore({
  state: {
    foodItems: [],
    foodTypes: []
  },
  getters: {
    getFoodItems(state) {
      return state.foodItems;
    },
    getFoodTypes(state) {
      return state.foodTypes;
    }
  },
  mutations: {
    setFoodItems(state, newItems) {
      state.foodItems = newItems;
    },
    setFoodTypes(state, newTypes) {
      state.foodTypes = newTypes;
    }
  },
  actions: {
    getFoodItemsFromApi({ commit }) {
      return axios.get('http://127.0.0.1:8000/api/food/', {
        method: "GET"
      }).then((food)=> {
        commit('setFoodItems', food.data);
        return food.data;
      }).catch((err)=> {
        console.warn(err)
      })
    },
    getFoodTypesFromApi({ commit }) {
      return axios.get('http://127.0.0.1:8000/api/type', {
        method: "GET"
      }).then(type=>{
        commit('setFoodTypes', type.data);
        console.log(type.data);
        return type.data;
      }).catch((err)=> {
        console.warn(err);
      })
    }
  },
  modules: {
  }
})
