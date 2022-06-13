<template>
<section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Book A Table
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form @submit.prevent="buttonClick">
              <div>
                <input required v-model="userName" type="text" class="form-control" placeholder="Your Name" />
              </div>
              <div>
                <input required v-model="userNumber" type="text" class="form-control" placeholder="Phone Number" />
              </div>
              <div>
                <input required v-model="email" type="email" class="form-control" placeholder="Your Email" />
              </div>
              <div>
                <select required v-model="peopleNumber" class="form-control nice-select wide">
                  <option value="" disabled selected>
                    How many persons?
                  </option>
                  <option value="2">
                    2
                  </option>
                  <option value="3">
                    3
                  </option>
                  <option value="4">
                    4
                  </option>
                  <option value="5">
                    5
                  </option>
                </select>
              </div>
              <div>
                <input required v-model="date" type="date" class="form-control">
              </div>
              <div class="btn_box">
                <button type="submit">
                  Book Now
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <map-component/>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import MapComponent from "@/components/MapComponent";
import { useToast } from "vue-toastification"

export default {
  name: "BookTableComponent",
  components: {
    MapComponent
  },
  data() {
    return {
      userName: '',
      userNumber: '',
      email: '',
      peopleNumber: '',
      date: ''
    }
  },
  methods: {
    refresh() {
      this.userName = '';
      this.userNumber = '';
      this.email = '';
      this.peopleNumber = '';
      this.date = '';
    },
    buttonClick() {
      let data = {userName: this.userName, userNumber: this.userNumber, email: this.email, peopleNumber: this.peopleNumber, date: this.date};
      axios.post('http://127.0.0.1:8000/api/table/', data).then(()=>{
        this.refresh();
        const toast = useToast();
        toast.success("Table successfully booked", {
          position: "top-center",
          timeout: 2000
        })
      }).catch((err)=> {
        console.log(err)
        const toast = useToast();
        toast.error("Something went wrong", {
          position: "top-center",
          timeout: 2000
        })
      })
    }
  }
}
</script>

<style scoped>

</style>