/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import Vuelidate from 'vuelidate'

Vue.use(VueRouter);
Vue.use(Vuelidate);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import { store } from './store';
import { routes } from './routes';

const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
    if (store.state.step >= to.meta.step) {
        return next();
    }

    return next('/');
});

const app = new Vue({
    el: '#packageApp',
    router,

    data: {
        state: store.state
    },

    methods: {
        nextStep()
        {
            store.increaseStep();

            this.advanceRoute();
        },

        previousStep()
        {
            store.decreaseStep();

            this.advanceRoute();
        },

        advanceRoute()
        {
            let route = routes.filter(route => {
                return route.meta.step === this.state.step;
            }).pop();

            this.$router.push(route.path);
        }
    },

    mounted()
    {
        this.advanceRoute();
    }
});
