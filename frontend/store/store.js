/* globals JSON3, localStorage */

import Vue from 'vue';
import Vuex from 'vuex';

import {country as countryApi, city as cityApi} from '../api/api';

Vue.use(Vuex);

export const store = new Vuex.Store({

    state: {

        countries: []

    },

    getters: {},

    mutations: {

        setCountries (state, countries) {

            state.countries = countries;

        }

    },

    actions: {

        getCountries ({commit}) {

            countryApi.GET().then(response => {

                commit('setCountries', response.data);

            });

        }

    }

});
