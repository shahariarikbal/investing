export default {
    data () {
        return {
            isLogin: location.pathname === '/login',
            isRegister: location.pathname === '/register'
        }
    },
    methods: {

        parseJWT (token) {
            var base64Url = token.split('.')[1]
            var base64 = base64Url.replace('-', '+').replace('_', '/')
            return JSON.parse(window.atob(base64))
        },

        saveToken (token, name) {
            name = name || 'auth_token'
            localStorage.setItem(name, token)
        },

        getToken (name) {
            name = name || 'auth_token'
            return window.localStorage[name]
        },

        removeToken (name) {
            name = name || 'auth_token'
            window.localStorage.removeItem(name)
        },
        login (params) {
            let remember = params.remember ? params.remember : false
            let data = {
                'email': params.email,
                'password': params.password,
                'remember': remember
            }
            return new Promise((resolve, reject) => {
                axios.post('/login', data)
                    .then((res) => {
                        if (res.data.token) {
                            this.saveToken(res.data.token)
                        }
                        resolve(res.data)
                    })
                    .catch((err) => {
                        this.loading = false
                        this.$setLaravelErrors(err.response.data)
                        reject(err.response.data)
                    })
            })
        },
        register (params) {
            return new Promise((resolve, reject) => {
                axios.post('/register', params)
                    .then((res) => {
                        if (res.data.token) {
                            this.saveToken(res.data.token)
                        }
                        resolve(res.data)
                    })
                    .catch((err) => {
                        this.$setLaravelErrors(err.response.data)
                        reject(err.response.data)
                    })
            })
        },
        logout () {
            return new Promise((resolve, reject) => {
                axios.post('/logout')
                    .then((res) => {
                        this.removeToken()
                        location.replace('/')
                        resolve(res.data)
                    })
                    .catch((err) => {
                        reject(err.response.data)
                    })
            })
        }
    }
}
