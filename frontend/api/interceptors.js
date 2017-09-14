import axios from 'axios';

export default function interceptors () {

    // request interceptor
    axios.interceptors.request.use(function (config) {

        return config;

    }, function (error) {

        return Promise.reject(error);

    });

    // response interceptor
    axios.interceptors.response.use(function (response) {

        return response;

    }, function (error) {

        return Promise.reject(error);

    });

}
