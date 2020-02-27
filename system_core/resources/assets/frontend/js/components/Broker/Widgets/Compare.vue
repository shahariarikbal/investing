<template>
    <div>
        <transition name="bounce">
            <div class="widget-container" v-if="brokersToBeCompared.length > 0">
                <a class="switch btn btn-sm" v-if="!displayCompareContent" @click="displayCompareContent = !displayCompareContent">Comparison ({{ numberOfBrokerInCompareWidget }})</a>
                <div class="widget-content" v-else>
                   <div class="widget-content-header">
                        <div>
                            <h3 class="widget-content-title">Compare Broker</h3>
                        </div>
                        <div>
                            <a class="widget-content-close pointer" @click="displayCompareContent = !displayCompareContent">&times;</a>
                       </div>
                    </div>
                    <div class="widget-content-body">
                        <div class="table-responsive">
                            <table class="table-bordered table-sm">
                                <tbody>
                                    <div>
                                        <span style="display:block;">
                                            <tr v-for="broker in brokersToBeCompared" :key="broker.slug" draggable="true">
                                                <td>
                                                    <img :src="`${InvestingPartner.app_url}/broker/logo/125x56-${broker.logo}`" :alt="`logo of ${broker.name}`">
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-around align-items-center">
                                                        <span class="ml-1">{{ broker.name }}</span>
                                                        <span><a class="mr-1 ml-1 pointer" @click="clear(broker.slug)">&times;</a></span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </span>
                                    </div>
                                </tbody>
                            </table>      
                        </div>
                    </div>
                    <div class="widget-content-footer">
                        <a 
                            class="btn btn-sm btn-info btn-compare" 
                            :href="compareEndPoint"
                            v-if="brokersToBeCompared.length > 1">Compare</a>
                        <a class="btn btn-sm btn-danger btn-clear" @click="clearAll">Clear</a>
                    </div>
                    
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            numberOfBrokerInCompareWidget: 0,
            displayCompareContent: false,
            brokersToBeCompared: []
        }
    },
    mounted() {
        this.init()

        EventBus.$on('updateCompare', () => {
            this.init()
        })

        EventBus.$on('clearOneCompare', (slug) => {
            this.clear(slug)
        })
    },

    computed: {
        compareEndPoint () {
            let brokerSlugs = this.brokersToBeCompared.map(broker => {
                return broker.slug
            })

            return InvestingPartner.app_url + '/forex-broker/compare?brokers=' + brokerSlugs.join(',')
        }
    },

    methods: {
        init () {
            var brokersToBeComparedInCookie = document.cookie.split(';').filter((item) => {
                if (item.trim().startsWith('broker')) {
                    return true
                }
            })

            this.numberOfBrokerInCompareWidget = brokersToBeComparedInCookie.length

            brokersToBeComparedInCookie = brokersToBeComparedInCookie.map(item => {
                return item.trim().split('=')[1]
            })

            axios.get('/forex-brokers', {params: {'brokers': brokersToBeComparedInCookie.join(',') }})
                .then(response => {
                    if (response.status === 200) {
                        console.log(response.data)
                        this.brokersToBeCompared = response.data
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        },
        clear (slug) {

            var removableIndex = null
            document.cookie.split(';').filter((item) => {
                if (item.trim().endsWith(slug)) {
                    return true
                }
            }).map((item) => {
                removableIndex = parseInt(item.split('[')[1])
            })
            document.cookie = "broker[" + removableIndex + "]=" + "; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
            this.init()
            EventBus.$emit('updateCompare');
            EventBus.$emit('removeFromCompareTable', slug)
        },
        clearAll () {
            let brokerToBeCleared = document.cookie.split(';').filter((item) => {
                if (item.trim().startsWith('broker')) {
                    return true
                }
            }).map((item) => {
                document.cookie = item.split('=')[0] + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
            })

            this.init()
            EventBus.$emit('updateCompare');
            
            EventBus.$emit('removeFromCompareTable')
        }
    }
}
</script>

<style scoped>

.widget-container {
width: inherit;
position: fixed;
left: 50%;
bottom: 0;
z-index: 1;
transform: translate(0, 0);
}
.widget-container .switch {
  
  background: var(--gray-dark);
    padding: 10px 40px;
    box-shadow: 0px 1px 7px 0px rgba(170, 170, 170, 0.95);
    color: #fff;
    font-weight: 400;
    font-size: 14px;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.widget-container .switch:hover {
  color: #fff;
  text-decoration: underline;
}
.widget-container .widget-content {
  position: relative;
  background: white;
  padding: 0 10px;
  box-shadow: 0px 1px 7px 0px rgba(170, 170, 170, 0.95);
}
.widget-container .widget-content .widget-content-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.widget-container .widget-content .widget-content-header .widget-content-title {
  margin: 0;
  font-weight: 400;
  padding: 1rem 0;
  font-size: 1rem;
}
.widget-container .widget-content .widget-content-body table tbody tr {
  background-color: #fff;
}
.widget-container .widget-content .widget-content-body table tbody tr td {
  /*border: 1px solid #dddd;
  padding: 0;
  vertical-align: middle;*/
  color:#343a40;
  
}
.widget-container .widget-content .widget-content-body table tbody tr td img {
  width: 100px;
  height: 70px;
  padding: 0.5rem;
}
.widget-container .widget-content .widget-content-footer {
  display: flex;
  justify-content: center;
  padding: 0.5rem 0;
}
.widget-container .widget-content .widget-content-footer a:hover {
  color: white;
}
.btn-compare {
  background: #138496;
  color: white;
  margin: 0 2px;
}
.btn-clear {
  background: #c82333;
  color: white !important;
  margin: 0 2px;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity 0s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
.pointer {
    cursor:pointer;
}
.bounce-enter-active {
  animation: bounce-in .5s;
}
.bounce-leave-active {
  animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
  0% {
    transform: scale(0);
  }
  50% {
    transform: scale(1.5);
  }
  100% {
    transform: scale(1);
  }
}

</style>
