// core imports
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import VueRouter from 'vue-router';
import {sync} from 'vuex-router-sync';

// bootstrap styles imports
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

// load styles
import './styles/main.scss';

// vue-awesome
import 'vue-awesome/icons';
import Icon from 'vue-awesome/components/Icon.vue';

// routes
import {routes} from './routes/routes';

// store
import {store} from './store/store';

// filters
import './filters/filters';

// main app
import App from './components/App.vue';

Vue.use(VueRouter);
Vue.use(BootstrapVue);

Vue.component('icon', Icon);

const router = new VueRouter({
    routes
});

sync(store, router);

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
