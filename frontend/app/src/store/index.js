import { createStore } from 'vuex'
import axios from 'axios'

export default createStore({
  state: {
    foodItems: [],
    foodTypes: [],
    cart: []
  },
  getters: {
    getFoodItems(state) {
      return state.foodItems;
    },
    getFoodTypes(state) {
      return state.foodTypes;
    },
    getCart(state) {
      return state.cart;
    }
  },
  mutations: {
    setFoodItems(state, newItems) {
      state.foodItems = newItems;
    },
    setFoodTypes(state, newTypes) {
      state.foodTypes = newTypes;
    },
    setCartItem(state, item) {
      state.cart.push(item);
    },
    removeCartItem(state, id) {
      const index = state.cart.findIndex(obj=>obj.id === id)
      state.cart.splice(index, 1)
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
        return type.data;
      }).catch((err)=> {
        console.warn(err);
      })
    }
  },
  modules: {
  }
})
