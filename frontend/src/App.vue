<template>
  <div>
    <label for="searchCategory">Pilih Kategori:</label>
    <select v-model="selectedCategory" id="searchCategory" name="searchCategory">
      <option value="Ophthalmologist">Ophthalmologist</option>
      <option value="Physician">Physician</option>
      <option value="Pediatrician">Pediatrician</option>
    </select>
    <button type="submit" @click="getDoctor()">Search</button>
    <div v-if="doctorData" class="mt-md">
      <div class="row mb-2">
        <div class="col-md-12">
          <div class="table-responsive-lg">
            <table class="table table-bordered m-0">
              <thead class="bg-primary-400">
                <tr>
                  <th v-for="item in header" :key="item" :class="item === 'Action' ? 'text-center' : ''">{{ item }}</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="item in doctorData" :key="item.id" >
                  <td nowrap>{{ item.name}}</td>
                  <td nowrap>{{ item.time }}</td>
                  <td nowrap>{{ item.hospital }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <p>Loading Doctor Data...</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import HelloWorld from './components/HelloWorld.vue';

export default {
  name: 'App',
  components: {
    HelloWorld
  },
  data() {
    return {
      welcomeMsg: 'Welcome to Your Vue.js App',
      doctorData: null,
      selectedCategory: '',
      header:[
        "Name",
        "Time",
        "Hospital"
      ],
    };
  },
  created() {
    this.getDoctor('Ophtamologist');
  },
  methods: {
    async getDoctor() {
      try {
        const requestBody = {
          doctorType: this.selectedCategory
        };
        const API_GRANDOAK = 'http://app.localhost/grandoak/getdoctor/'
        const API_PINEVALLEY = 'http://app.localhost/pinevalley/getdoctor'
        const response1 =  axios.get(API_GRANDOAK+this.selectedCategory, { headers: { 'Authorization': 'Basic dGVzdDp0ZXN0'}});
        const response2 = axios.post(API_PINEVALLEY, requestBody, { headers: { 'Authorization': 'Basic dGVzdDp0ZXN0'}})

        const [res1, res2] = await Promise.all([response1, response2]);

        const combinedDoctors = res1.data.doctors.doctor.concat(res2.data.doctors.doctor);
        
        // You can handle the received data here
        this.doctorData = combinedDoctors;
      } catch (error) {
          console.error('Error fetching doctor data:', error);
      }
    }
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
