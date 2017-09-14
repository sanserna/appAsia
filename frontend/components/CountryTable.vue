<template>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>{{ name }}</h4>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th class="text-center">#</th>
            <th>Ciudad</th>
            <th>Fecha de llegada</th>
            <th>Fecha de salida</th>
            <th class="text-center">Nº de noches</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
            <th class="text-center">Detalles</th>
          </tr>
        </thead>

        <tbody>
          <country-table-city-row v-for="city in cities"
            :city="city"
            :key="city.id">
          </country-table-city-row>
        </tbody>
      </table>
    </div>
  </div>
</template>



<script>
import CountryTableCityRow from './CountryTableCityRow.vue';

export default {

    props: {
        id: Number,
        position: Number,
        name: String,
        cities: Array
    },

    components: {CountryTableCityRow}

}

</script>

