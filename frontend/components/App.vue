<template>
  <main>
    <b-container fluid>
      <b-row>
        <b-col>
          <b-navbar type="dark" variant="dark">
            <b-navbar-brand>Itinerario Sudeste Asiatico</b-navbar-brand>
          </b-navbar>
        </b-col>
      </b-row>

      <br>

      <b-row>
        <b-col>
          <b-list-group v-for="country in countries" :key="country.id">
            <b-list-group-item>{{ country.name }}</b-list-group-item>
            <b-list-group-item>
              <b-table
                striped
                hover
                bordered
                inverse
                :items="country.cities"
                :fields="tableFields">
                  <template slot="arrival_date" scope="data">
                    {{ data.item.arrival_date | date }}
                  </template>
                  <template slot="departure_date" scope="data">
                    {{ data.item.departure_date | date }}
                  </template>
                  <template slot="total_noches" scope="data">
                    {{ totalNights(data.item) }}
                  </template>
              </b-table>
            </b-list-group-item>
            <br>
          </b-list-group>
        </b-col>
      </b-row>
    </b-container>
  </main>
</template>

<script>
import moment from 'moment';
import * as config from '../config.js';
import {mapState, mapActions} from 'vuex';

const tableFields = {
  internal_position: {
    label: '#',
    class: ['text-center']
  },
  name: {
    label: 'Nombre'
  },
  arrival_date: {
    label: 'Fecha de Llegada'
  },
  departure_date: {
    label: 'Fecha de salida'
  },
  total_noches: {
    label: 'Nº de Noches',
    class: ['text-center']
  }
}

export default {

    mounted () {

        this.getCountries();

    },

    data () {

        return {
          tableFields: tableFields
        };

    },

    computed: {

        ...mapState(['countries'])

    },

    methods: {

        ...mapActions(['getCountries']),

        totalNights (city) {

          let arrivalDate = moment(city.arrival_date, config.INPUT_DATE_FORMAT),
              departureDate = moment(city.departure_date, config.INPUT_DATE_FORMAT);

          return departureDate.diff(arrivalDate, 'days');

        }

    }

}
</script>

