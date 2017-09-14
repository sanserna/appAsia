import Vue from 'vue';
import moment from 'moment';

import * as config from '../config.js';

export default (function () {

    Vue.filter('date', value => {

        return moment(value, config.INPUT_DATE_FORMAT).format(config.OUTPUT_DATE_FORMAT);

    });

}());
