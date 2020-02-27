/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('AuthenticationModal', require('./components/Member/Auth/AuthenticationModal.vue').default);
Vue.component('AuthUnauthStateButton', require('./components/Member/Auth/AuthUnauthStateButton.vue').default);
Vue.component('Login', require('./components/Member/Auth/Login.vue').default);
Vue.component('Register', require('./components/Member/Auth/Register.vue').default);
Vue.component('Like', require('./components/Interaction/Like.vue').default);
Vue.component('recent-close-trades', require('./components/RecentCloseTrades.vue').default);
Vue.component('signals', require('./components/Signal/Signals.vue').default);
Vue.component('timezone', require('./components/Signal/Timezone/Settings').default);
Vue.component('Now', require('./components/Signal/Timezone/Now').default);
Vue.component('Subscription', require('./components/Subscription/Subscription.vue').default);
Vue.component('Brokers', require('./components/Broker/Brokers.vue').default);
Vue.component('RateBroker', require('./components/Broker/RateBroker.vue').default);
Vue.component('RateOverview', require('./components/Broker/RatingOverview.vue').default);
Vue.component('broker-compare', require('./components/Broker/BrokerCompare.vue').default);

// Vue.component('Dashboard', require('./components/Member/Dashboard/Index.vue').default);

//pagination
var Paginate = require('vuejs-paginate')
Vue.component('paginate', Paginate)
// mixins
import Mixin from './Mixins'
Vue.mixin(Mixin)

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
    symbol: '$',
    thousandsSeparator: ',',
    fractionCount: 2,
    fractionSeparator: '.',
    symbolPosition: 'front',
    symbolSpacing: true
})

// global event bus
window.EventBus = new Vue();

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.prototype.InvestingPartner = window.InvestingPartner;

if (document.getElementById("navigation")) {
    new Vue({
        el: '#navigation'
    })
}

if (document.getElementById("recent-closed-trade")) {
    new Vue({
        el: '#recent-closed-trade'
    })
}

import VueFlashMessage from 'vue-flash-message';
Vue.use(VueFlashMessage, {
    messageOptions: {
        timeout: 10000
    }
});

require('vue-flash-message/dist/vue-flash-message.min.css');

const app = new Vue({
    el: '#app',
    router,
    data() {
        return {
            auth_token: localStorage.getItem('auth_token') || null,
            auth: InvestingPartner.auth,
            forceLogoutCalledStatus: false
        }
    },
    created() {
        if (localStorage.getItem("timeformat") === null) {
            localStorage.setItem("timeformat", 24)
        }

        if (localStorage.getItem("timezone") === null) {
            localStorage.setItem("timezone", 'UTC')
        }

        if (this.auth_token) {
            window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.auth_token
        }

        EventBus.$on('authenticated', payload => this.auth = payload)

        EventBus.$on('update-auth-token', token => {
            this.auth_token = token
            if (this.auth_token) {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.auth_token
            }
        })
        // if (this.auth_token !== null) {
        //     this.authCheck()
        // }
        EventBus.$on('logout', () => {
            localStorage.removeItem('auth_token')
            this.auth_token = null
            this.auth = null
            // alert('you are successfully logged out')
        })

        if (this.forceLogoutCalledStatus === false) {
            EventBus.$on('force-logout', () => {
                this.forceLogoutCalledStatus = true
                this.flash('Session expired! Redirecting to login page', 'error')
                _.delay(this.logout(), 3000)
            })
        }


        axios.interceptors.response.use(null, function (error) {
            if (error.response.status === 401) {
                // EventBus.$emit('logout')
                // EventBus.$emit('loginDisplay', true)
                EventBus.$emit('force-logout')
                // EventBus.$emit('show-not-dissable-login-modal')
                // localStorage.removeItem('auth_token');
                // store.dispatch(sessionOutSuccess(err.message));
            }
            return Promise.reject(error);
        });
    },
    watch: {
        auth_token(value) {
            if (value != null) {
                window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + this.auth_token
                //    this.authCheck()
            }
        }
    },
    methods: {
        logout() {
            axios.post(`${InvestingPartner.app_url}/member/logout`)
                .then(response => {
                    if (response.status === 200) {
                        EventBus.$emit('logout')
                        // if (!this.forceLogoutCalledStatus) {
                            location.reload()
                        // } else {
                        //     EventBus.$emit('loginDisplay', true)
                        // }
                        
                    }
                })
                .catch(error => {
                    EventBus.$emit('loginDisplay', true)
                    // location.reload()
                    console.log(error)
                })
        }

        // authCheck () {
        //     axios.post(InvestingPartner.app_url + '/api/member/auth/check')
        //         .then(response => {
        //             if (typeof response.data === 'string') {
        //                 alert('Your existing session has expired! Please login again')
        //                 localStorage.removeItem('auth_token')
        //             }
        //             if (typeof response.data === 'object') {
        //                 // InvestingPartner.auth = response.data
        //                 this.auth = response.data
        //                 EventBus.$emit('avater-fetched', this.auth.avater)
        //             }
        //         })
        //         .catch(error => {
        //             console.log(error)
        //         })
        // }
    }
});

if (InvestingPartner.auth) {
    console.log(`%c${InvestingPartner.auth.full_name},\n You shouldn\'t belong here...`, 'color: white; background: red; font-size: 20px')
}

console.log('%c Investing Partner ', 'font-size:110px; padding-left: 110px; color: red; background: white url(https://www.investingpartner.net/assets/images/logo.png) no-repeat;');
console.log('%c Warning! %c If you are not developer, this may be dangerous for you account.', 'background: yellow; color: black; font-size: 24px; font-weight: bold;', 'background: red; color: white; font-size: 24px;')