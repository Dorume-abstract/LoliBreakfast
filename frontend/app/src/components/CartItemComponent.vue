<template>
  <li class="clearfix non-select">
    <img :src="item.imgUrl" width="70" height="70" alt="item1" />
    <span class="item-name">{{cartItem.name}}</span>
    <div class="item-price">${{cartItem.price}}</div>
    <span class="item-quantity">Quantity: {{quantity}}</span>
    <span class="curs" @click="decreaseQuantity" >&lt;</span>
    <span class="curs" @click="increaseQuantity" style="margin-left: 5px">&gt;</span>

  </li>
</template>

<script>
export default {
  name: "CartItem",
  props: [
      'item'
  ],
  data() {
    return {
      cartItem: Object.assign({}, this.item),
      quantity: 1,
      basePrice: this.item.price,
    }
  },
  methods: {
    increasePrice() {
      this.cartItem.price += this.basePrice;
    },
    decreasePrice() {
      this.cartItem.price -= this.basePrice;
    },
    increaseQuantity() {
      this.quantity ++;
      this.increasePrice();
      this.$emit('recprice');
    },
    decreaseQuantity() {
      if (!this.validateQuantity()) {
        return
      }
      this.quantity --;
      this.decreasePrice();
      this.$emit('recprice');
    },
    validateQuantity() {
      return this.quantity - 1 !== 0;
    }
  }
}
</script>

<style scoped>
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

.curs {
  cursor: pointer;
}

.non-select {
  user-select: none;
}

.item-name {
  display: block;
  padding-top: 10px;
  font-size: 16px;
}

.item-price {
  color: #6394F8;
  margin-right: 8px;
}

.item-quantity {
  color: #ABB0BE;
}
</style>