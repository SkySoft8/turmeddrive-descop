<template>
  <div>
    <form action="">
      <div class="search-item">
        <label>Тип организации</label>
        <select  v-model="types">
          <option v-for="type in filterList.types"
                  :key="type.id"
                  v-bind:value="type.id"
                  :class="type.id !=8 ? '' : 'd-none'"
          >{{type.title}}</option>
        </select>
      </div>
      <div class="search-item">
        <label>Cтрана</label>
        <select v-model="districts">
          <option v-for="district in filterList.districts" :value="district.id">{{district.title}}</option>
        </select>
      </div>
      <div class="search-item" >
        <label>Регион (область)</label>
        <select v-model="republics">
                <option v-for="republic in filterList.republics" :value="republic.id" :class="republic.district_id === districts   ? '' : 'd-none'">
                    <span >{{republic.title}}</span>
                </option>
        </select>
      </div>
      <div class="search-item">
        <label>Город</label>
        <select v-model="cities">
          <option v-for="city in filterList.cities" :value="city.id"
                  :class="districts === city.district_id && republics === city.republic_id   ? '' : 'd-none'"
          >{{city.title}}</option>
        </select>
      </div>
      <input type="submit" @click.prevent="getFilter" value="Найти">
    </form>
  </div>
</template>

<script>
import router from "../router";
import global from "../global";
export default {
  name: "UiFilter",
  setup(){
    const {state} = global;
    return {state};
  },
  data(){
    return {
      filterList: [],
      types: '',
      districts: '',
      republics: '',
      cities: '',
    }
  },
  methods:{
    getFilter() {
      const obj = {
        type:this.types,
        district: this.districts,
        republic: this.republics,
        city: this.cities
      }

      localStorage.setItem('person', JSON.stringify(obj))

      const raw = localStorage.getItem('person')
      const person = JSON.parse(raw)
      this.state.type = person.type
      if(person.type === 1)
        this.$router.push({name:'med'})
      else if (person.type === 2)
        this.$router.push({name:'spa'})
      else if (person.type === 3)
        this.$router.push({name:'cafe'})
      else if (person.type === 4)
        this.$router.push({name:'hotel'})
      else if (person.type === 5)
        this.$router.push({name:'sanatorium'})
      else if (person.type === 6)
          this.$router.push({name:'tur'})
      else if (person.type === 7)
          this.$router.push({name:'sport'})
    },
    getFilterList() {
      this.axios.get('/api/medicals/filters',)
          .then(res => {
            this.filterList = res.data
            console.log(res.data)
          })
          .catch(error => console.log(error))
    },
  },
  mounted() {
    this.getFilterList()
  },
}
</script>

<style scoped>

</style>
