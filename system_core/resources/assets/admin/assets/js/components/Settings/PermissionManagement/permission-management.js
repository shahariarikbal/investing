import routes from './routes'
import mixin from './mixins'

import VueFlashMessage from 'vue-flash-message';
Vue.use(VueFlashMessage, {
    messageOptions: {
        timeout: 7000
    }
});
require('vue-flash-message/dist/vue-flash-message.min.css');
const PermissionManagement = {
    // The install method will be called with the Vue constructor as
    // the first argument, along with possible options
    install (Vue) {
        Vue.component('PermissionManagement', require('./components/Index').default)
        Vue.mixin(mixin)
        Vue.mixin({
            created () {
                if (typeof this.$options.router !== 'undefined') {
                    this.$options.router.addRoutes(routes)
                }
            }
        })
    }
}

// register plugin if it is used via cdn or directly as a script tag
if (typeof window !== 'undefined' && window.Vue) {
    Vue.use(PermissionManagement)
}