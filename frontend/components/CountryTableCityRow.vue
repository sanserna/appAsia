<template>
  <tr>
    <td class="text-center align-middle">{{ city.internal_position }}</td>
    <td>{{ city.name }}</td>
    <td class="text-capitalize">{{ city.arrival_date | date}}</td>
    <td class="text-capitalize">{{ city.departure_date | date }}</td>
    <td class="text-center">{{ totalNights }}</td>
    <td class="text-center">
      <a class="btn btn-primary btn-xs" data-title="Editar" href=""><span class="glyphicon glyphicon-pencil"></span></a>
    </td>
    <td class="text-center">
      <a class="btn btn-danger btn-xs" data-title="Eliminar" href=""><span class="glyphicon glyphicon-trash"></span></a>
    </td>
    <td class="text-center">
      <button class="btn btn-info btn-xs" data-title="Detalle" collapse="">
        <span class="glyphicon glyphicon-eye-open"></span>
      </button>
    </td>
  </tr>
</template>

<script>
import moment from 'moment';
import * as config from '../config.js';

export default {

    props: {
        city: Object
    },

    data () {

        return {}

    },

    computed: {

      totalNights () {

        let arrivalDate = moment(this.city.arrival_date, config.INPUT_DATE_FORMAT),
            departureDate = moment(this.city.departure_date, config.INPUT_DATE_FORMAT);

        return departureDate.diff(arrivalDate, 'days');

      }

    }

}

</script>

