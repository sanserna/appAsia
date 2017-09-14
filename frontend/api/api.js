import axios from 'axios';
import interceptors from './interceptors.js';

// add interceptors
interceptors();

const API_BASE_URL = 'http://api.dev:8080/api';

// COUNTRY API -----------------------------------------------------------------

export const country = {

    GET: function (id) {

        return axios.get(id || '', {
            baseURL: API_BASE_URL + '/countries',
            responseType: 'json'
        });

    }

};

// CITY API --------------------------------------------------------------------

export const city = {

    GET: function (id) {

        return axios.create({
            url: id || '',
            baseURL: API_BASE_URL + '/cities',
            method: 'get',
            responseType: 'json'
        });

    }

};
