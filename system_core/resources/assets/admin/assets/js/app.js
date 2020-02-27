/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('modal-new-package', require('./components/Packages/AddNewPackage.vue').default);
Vue.component('package-edit', require('./components/Packages/Edit.vue').default);
Vue.component('package-edit-button', require('./components/Packages/Button/Edit.vue').default);

Vue.component('PaymentProcessor', require('@p/PaymentProcessor.vue').default)
// Vue.component('faq-list', require('./components/Faq/Insert.vue').default);
// Vue.component('faq-edit-button', require('./components/Faq/Buttons/Edit.vue').default);
// Vue.component('faq-edit', require('./components/Faq/Edit.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var Paginate = require('vuejs-paginate')
Vue.component('paginate', Paginate)
Vue.component("BrokerReviews", require('./components/brokers/reviews/index.vue').default)

// vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)
const router = new VueRouter({
    mode: 'history',
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            if (!to.meta.scrollTop) return
            return { x: 0, y: 0 }
        }
    }
})

import VueCurrencyFilter from 'vue-currency-filter'
Vue.use(VueCurrencyFilter, {
    symbol : '$',
    thousandsSeparator: ',',
    fractionCount: 2,
    fractionSeparator: '.',
    symbolPosition: 'front',
    symbolSpacing: true
})

Vue.use(require('vue-moment'));

window.EventBus = new Vue();

Vue.prototype.InvestingPartner = window.InvestingPartner;

const app = new Vue({
    el: '#content',
    router,
});
