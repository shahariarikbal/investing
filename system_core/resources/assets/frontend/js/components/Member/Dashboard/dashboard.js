// This exports the plugin object.
import routes from './routes'
import mixin from './mixins'
// import Vue2Editor from "vue2-editor";



Vue.use(require('vue-moment'));

import Popover from 'vue-js-popover'
Vue.use(Popover)

const Dashboard = {
    // The install method will be called with the Vue constructor as
    // the first argument, along with possible options
    install (Vue) {
        Vue.component('CurrencyDisplay', require('@p/CurrencyDisplay.vue').default)
        Vue.component('PaymentProcessor', require('@p/PaymentProcessor.vue').default)
        Vue.component('Dashboard', require('./components/App').default)
        Vue.mixin(mixin)
        Vue.mixin({
            created () {
                if (typeof this.$options.router !== 'undefined') {
                    this.$options.router.addRoutes(routes)
                }
            }
        })
        // Vue.$options.router.addRoutes(routes)
    }
}

// register plugin if it is used via cdn or directly as a script tag
if (typeof window !== 'undefined' && window.Vue) {
    Vue.use(Dashboard)
}
