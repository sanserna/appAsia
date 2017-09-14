// core imports
import Vue from 'vue';
import VueRouter from 'vue-router';
import {sync} from 'vuex-router-sync';

// routes
import {routes} from './routes/routes';

// store
import {store} from './store/store';

// filters
import './filters/filters';

// main app
import App from './components/App.vue';

Vue.use(VueRouter);

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
