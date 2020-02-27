// This exports the plugin object.
import routes from './routes'
// import Vue2Editor from "vue2-editor";

// Vue.use(Vue2Editor);

import VueFlashMessage from 'vue-flash-message';
Vue.use(VueFlashMessage, {
    messageOptions: {
        timeout: 700000
    }
});
require('vue-flash-message/dist/vue-flash-message.min.css');

const Withdraw = {
    // The install method will be called with the Vue constructor as
    // the first argument, along with possible options
    install (Vue) {
        Vue.component('Withdraw', require('./components/Index').default)
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
    Vue.use(Withdraw)
}
