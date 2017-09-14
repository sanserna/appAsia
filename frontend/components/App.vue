<template>
  <main>
    <div class="container">
      <div class="row">
        <div class="page-header">
          <h1>Itinerario Sudeste Asiatico <small><em>Diciembre 2017 - Enero 2018</em></small></h1>
        </div>
      </div>

      <country-table class="row" v-for="country in countries"
        :id="country.id"
        :name="country.name"
        :position="country.position"
        :cities="country.cities"
        :key="country.id">
      </country-table>
    </div>
  </main>
</template>



<script>
import CountryTable from './CountryTable.vue';
import {mapState, mapActions} from 'vuex';

export default {

    mounted () {

        this.getCountries();

        $(".alert").alert('close')

    },

    data () {

        return {}

    },

    components: {CountryTable},

    computed: {

        ...mapState(['countries'])

    },

    methods: {

        ...mapActions(['getCountries'])

    }

}
</script>
