export default {
    data () {
        return {
            // myself: Laravel.auth
        }
    },
    methods: {
        loginDisplay () {
            EventBus.$emit('loginDisplay', true)
        },
        registerDisplay () {
            EventBus.$emit('registerDisplay', true)
        },
        forgotPasswordDisplay () {
            EventBus.$emit('forgotPasswordDisplay', true)
        },
        playSound (sound) {
            if (sound) {
                var audio = new Audio(sound)
                audio.play()
            }
        },
        saveStorage (name, data) {
            window.localStorage[name] = data
        },

        getStorage (name) {
            return window.localStorage[name]
        },

        removeStorage (name) {
            window.localStorage.removeItem(name)
        },
        saveSession (name, data) {
            var sdata = window.sessionStorage['investing-partner']

            if (sdata) {
                sdata = JSON.parse(sdata)
            } else {
                sdata = {}
            }

            if (typeof data === 'undefined') {
                return sdata[name]
            }

            sdata[name] = data
            window.sessionStorage['investing-partner'] = JSON.stringify(sdata)

            return sdata[name]
        },
        getSession (name) {
            return this.saveSession(name)
        },
        removeSession (name) {
            if (typeof name === 'undefined') {
                window.sessionStorage.removeItem('investing-partner')
            }
            this.saveSession(name, '')
        },
        // errorNotify (error) {
        //     switch (error.response.status) {
        //     case 422:
        //         EventBus.$emit('notification', { type: 'danger', message: 'Your given data is invalid.' })
        //         break
        //     case 419:
        //         EventBus.$emit('notification', { type: 'danger', message: 'Your session has expired.' })
        //         break
        //     case 401:
        //         EventBus.$emit('notification', { type: 'danger', message: 'Sorry you need to login first.' })
        //         break
        //     case 403:
        //         EventBus.$emit('notification', { type: 'danger', message: "Sorry you don't have permission." })
        //         break
        //     default:
        //         EventBus.$emit('notification', { type: 'danger', message: 'Something went wrong. Please try again.' })
        //     }
        // },
        // partialUpdate (uri, data, message) {
        //     return new Promise((resolve, reject) => {
        //         axios.patch(uri, data)
        //             .then(response => {
        //                 if (response.status === 204) {
        //                     EventBus.$emit('notification', { type: 'success', message: message })
        //                     resolve(response)
        //                 }
        //             })
        //             .catch(error => {
        //                 this.errorNotify(error)
        //                 reject(error)
        //             })
        //     })
        // },
        // getUrlParam (key) {
        //     var currentURL = window.location.href
        //     var urlObject = currentURL.split('?')
        //     if (urlObject.length > 1) {
        //         if (typeof key === 'undefined') {
        //             return urlObject[1]
        //         }
        //         urlObject[1] = '&' + urlObject[1]
        //         let start = urlObject[1].search(new RegExp(`&${key}=`))
        //         if (start === -1) {
        //             return
        //         }
        //         let end = urlObject[1].indexOf('&', start + 1)
        //         if (end === -1) {
        //             end = undefined
        //         }
        //         var value = urlObject[1].slice(start, end).split('=')[1]
        //         return value && decodeURIComponent(value)
        //     }
        // },
        // generateUrlParam (param, value, urlObject) {
        //     urlObject = urlObject || ''
        //     urlObject = urlObject.indexOf('?') === 0 ? urlObject.slice(1) : urlObject
        //     var newQueryString = ''
        //     value = encodeURIComponent(value)

        //     if (urlObject.length > 1) {
        //         var queries = urlObject.split('&')

        //         var updatedExistingParam = false
        //         for (let i = 0; i < queries.length; i++) {
        //             var queryItem = queries[i].split('=')

        //             if (queryItem.length > 1) {
        //                 if (queryItem[0] === param) {
        //                     newQueryString += queryItem[0] + '=' + value + '&'
        //                     updatedExistingParam = true
        //                 } else if (queryItem[1]) {
        //                     newQueryString += queryItem[0] + '=' + queryItem[1] + '&'
        //                 }
        //             }
        //         }
        //         if (!updatedExistingParam) {
        //             newQueryString += param + '=' + value + '&'
        //         }
        //     } else {
        //         newQueryString += param + '=' + value + '&'
        //     }
        //     return `?${newQueryString.slice(0, -1)}`
        // },
        // changeUrlParam (param, value) {
        //     var currentURL = window.location.href
        //     var urlObject = currentURL.split('?')
        //     var newQueryString = this.generateUrlParam(param, value, urlObject[1])
        //     window.history.replaceState('', '', urlObject[0] + newQueryString)
        // },
        // removeUrlParam (key) {
        //     if (typeof key === 'undefined') return
        //     var currentURL = window.location.href
        //     var urlObject = currentURL.split('?')

        //     if (urlObject.length > 1) {
        //         let start = urlObject[1].indexOf(`${key}=`)
        //         if (start === -1) {
        //             return
        //         }
        //         let end = urlObject[1].indexOf('&', start)
        //         if (end === -1) {
        //             end = undefined
        //             start = start - 1
        //         } else {
        //             end = end + 1
        //         }
        //         urlObject[1] = urlObject[1].replace(urlObject[1].slice(start, end), '')
        //     }

        //     window.history.replaceState('', '', urlObject.join('?'))
        // },
        // momentDate (date) {
        //     return moment.utc(date).format('MMM DD YYYY')
        // },
        // fromNow (date) {
        //     return moment.utc(date).fromNow()
        // }
        resolve(path, obj=self, separator='.') {
            var properties = Array.isArray(path) ? path : path.split(separator)
            return properties.reduce((prev, curr) => prev && prev[curr], obj)
        },
        getUrlParam (key) {
            var currentURL = window.location.href
            var urlObject = currentURL.split('?')
            if (urlObject.length > 1) {
                if (typeof key === 'undefined') {
                    return urlObject[1]
                }
                urlObject[1] = '&' + urlObject[1]
                let start = urlObject[1].search(new RegExp(`&${key}=`))
                if (start === -1) {
                    return
                }
                let end = urlObject[1].indexOf('&', start + 1)
                if (end === -1) {
                    end = undefined
                }
                var value = urlObject[1].slice(start, end).split('=')[1]
                return value && decodeURIComponent(value)
            }
        },
        generateUrlParam (param, value, urlObject) {
            // console.log(param, value, urlObject);
            urlObject = urlObject || ''
            urlObject = urlObject.indexOf('?') === 0 ? urlObject.slice(1) : urlObject
            var newQueryString = ''
            value = encodeURIComponent(value)

            if (urlObject.length > 1) {
                var queries = urlObject.split('&')

                var updatedExistingParam = false
                for (let i = 0; i < queries.length; i++) {
                    var queryItem = queries[i].split('=')

                    if (queryItem.length > 1) {
                        if (queryItem[0] === param) {
                            newQueryString += queryItem[0] + '=' + value + '&'
                            updatedExistingParam = true
                        } else if (queryItem[1]) {
                            newQueryString += queryItem[0] + '=' + queryItem[1] + '&'
                        }
                    }
                }
                if (!updatedExistingParam) {
                    newQueryString += param + '=' + value + '&'
                }
            } else {
                newQueryString += param + '=' + value + '&'
            }
            return `?${newQueryString.slice(0, -1)}`
        },
        changeUrlParam (param, value) {
            var currentURL = window.location.href
            var urlObject = currentURL.split('?')
            var newQueryString = this.generateUrlParam(param, value, urlObject[1])
            window.history.replaceState('', '', urlObject[0] + newQueryString)
        },
        removeUrlParam (key) {
            if (typeof key === 'undefined') return
            var currentURL = window.location.href
            var urlObject = currentURL.split('?')

            if (urlObject.length > 1) {
                let start = urlObject[1].indexOf(`${key}=`)
                if (start === -1) {
                    return
                }
                let end = urlObject[1].indexOf('&', start)
      
                if (end === -1) {
                    end = urlObject[1].length
                    start = start
                } else {
                    end = end + 1
                }

                urlObject[1] = urlObject[1].replace(urlObject[1].slice(start, end), '')
            }

            window.history.replaceState('', '', urlObject[1].length > 1 ? urlObject.join('?') : urlObject[0])
        }
    }
}
