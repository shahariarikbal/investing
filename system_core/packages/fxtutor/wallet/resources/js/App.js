// This exports the plugin object.
import routes from './routes'
const Finance = {
    // The install method will be called with the Vue constructor as
    // the first argument, along with possible options
    install (Vue) {
        Vue.component('payments', require('./components/app').default)
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
    Vue.use(Finance)
}
