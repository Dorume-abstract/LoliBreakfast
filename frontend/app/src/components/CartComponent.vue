<template>
    <transition name="modal">
        <div class="container" style="position: absolute; z-index: 1000; left: 20.1%">
            <div class="shopping-cart">
                <div class="shopping-cart-header">
                    <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{ cart.length }}</span>
                    <div class="shopping-cart-total">
                        <span class="lighter-text">Total:</span>
                        <span class="main-color-text">${{ genPrice }}</span>
                    </div>
                </div>
                <!--end shopping-cart-header -->

                <ul class="shopping-cart-items">
                    <cart-item-component v-for="item in cart" :key="item.id" :item="item" ref="cart-item"
                        @recprice="calculatePrice" @remove="removeItem" />
                    <form action="">
                        <div v-if="user_info">
                            <input placeholder="Enter name" required class="inp" v-model="name" type="text">
                            <input placeholder="Enter phone" required class="inp" v-model="phone" @input="acceptNumber"
                                type="text">
                            <input placeholder="Enter address" required class="inp" v-model="address" type="text">
                        </div>
                    </form>
                </ul>
                <a v-if="!user_info" @click="changeUserInfo" style="color: whitesmoke; cursor: pointer"
                    class="button">Enter Credentials</a>
                <a v-if="user_info" @click="makeOrder" style="color: whitesmoke; cursor: pointer" class="button">Make
                    Order</a>
            </div>
            <!--end shopping-cart -->
        </div>
        <!--end container -->
    </transition>
</template>

<script>
import { mapGetters, mapMutations } from "vuex";
import CartItemComponent from "@/components/CartItemComponent";
import { useToast } from "vue-toastification";
import axios from "axios";

export default {
    name: "CartComponent",
    components: { CartItemComponent },

    data() {
        return {
            cart: this.getCart(),
            genPrice: null,
            user_info: false,
            name: null,
            phone: null,
            address: null,
        }
    },
    methods: {
        ...mapGetters(['getCart']),
        ...mapMutations(['removeCartItem', 'clearCartItems']),
        makeOrder() {
            let items = this.$refs["cart-item"];
            const toast = useToast();
            if (!this.cart.length) {
                toast.warning("Fill cart firstly", {
                    position: "top-center",
                    timeout: 2000
                })
                return;
            }
            let order = { name: this.name, phone: this.phone, address: this.address, orderItems: [] };
            items.forEach(item => {
                order.orderItems.push({ foodId: item.item.id, quantity: item.quantity })
            })
            
            axios.post('http://127.0.0.1:8000/api/order/', order).then(() => {
                toast.success("Order successfully made", {
                    position: "top-center",
                    timeout: 2000
                })
                this.clearCartItems();
                this.$emit('close');
            }).catch(err => {
                console.log(err)
                toast.error("Something went wrong", {
                    position: "top-center",
                    timeout: 2000
                })
            })
        },
        acceptNumber() {
            let x = this.phone.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
            this.phone = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
        },
        changeUserInfo() {
            const toast = useToast();
            if (!this.cart.length) {
                toast.warning("Fill cart firstly", {
                    position: "top-center",
                    timeout: 2000
                })
                return;
            }
            this.user_info = !this.user_info;
        },
        removeItem(id) {
            this.removeCartItem(id);
            setTimeout(this.calculatePrice, 0);
            const toast = useToast();
            toast.success('Item successfully removed from card!', {
                timeout: 2000
            })
        },
        calculatePrice() {
            let items = this.$refs["cart-item"];
            let price = 0;
            items.forEach(item => {
                price += item.cartItem.price;
            })
            this.genPrice = parseFloat(price.toFixed(2));
        }
    },
    mounted() {
        this.cart = this.getCart();
        if (this.cart.length) this.calculatePrice();

    }
}
</script>

<style scoped>
@import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css);

*,
*:before,
*:after {
    box-sizing: border-box;
}

.inp {
    margin-top: 5px;
}

body {
    font: 14px/22px "Lato", Arial, sans-serif;
    background: #6394F8;
}

.lighter-text {
    color: #ABB0BE;
}

.main-color-text {
    color: #6394F8;
}

nav {
    padding: 20px 0 40px 0;
    background: #F8F8F8;
    font-size: 16px;
}

nav .navbar-left {
    float: left;
}

nav .navbar-right {
    float: right;
}

nav ul li {
    display: inline;
    padding-left: 20px;
}

nav ul li a {
    color: #777777;
    text-decoration: none;
}

nav ul li a:hover {
    color: black;
}

.container {
    margin: auto;
    width: 80%;
}

.badge {
    background-color: #6394F8;
    border-radius: 10px;
    color: white;
    display: inline-block;
    font-size: 12px;
    line-height: 1;
    padding: 3px 7px;
    text-align: center;
    vertical-align: middle;
    white-space: nowrap;
}

.shopping-cart {
    margin: 20px 0;
    float: right;
    background: #3e3e3e;
    width: 390px;
    position: relative;
    border-radius: 3px;
    padding: 20px;
}

.shopping-cart .shopping-cart-header {
    border-bottom: 1px solid #E8E8E8;
    padding-bottom: 15px;
}

.shopping-cart .shopping-cart-header .shopping-cart-total {
    float: right;
}

.shopping-cart .shopping-cart-items {
    padding-top: 20px;
    list-style-type: none;
}

.shopping-cart .shopping-cart-items li {
    margin-bottom: 18px;
}

.shopping-cart .shopping-cart-items img {
    float: left;
    margin-right: 12px;
}


.shopping-cart:after {
    bottom: 100%;
    left: 89%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: white;
    border-width: 8px;
    margin-left: -8px;
}

.cart-icon {
    color: #515783;
    font-size: 24px;
    margin-right: 7px;
    float: left;
}

.button {
    background: #6394F8;
    color: white;
    text-align: center;
    padding: 12px;
    text-decoration: none;
    display: block;
    border-radius: 3px;
    font-size: 16px;
    margin: 25px 0 15px 0;
}

.button:hover {
    background: #729ef9;
}
</style>