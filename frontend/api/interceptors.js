import axios from 'axios';

function onDownloadProgress (progressEvent) {

}

export default function interceptors () {

    // request interceptor
    axios.interceptors.request.use(function (config) {

        config.onDownloadProgress = onDownloadProgress;

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
