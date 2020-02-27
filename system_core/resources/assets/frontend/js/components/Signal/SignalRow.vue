<template>
    <div>
        <div v-if="signalRows.length > 0 ">
            <div v-for="(row, key) in signalRows" :key="key">
                <div class="row fixed-gap15">
                    <div v-for="signal in row"  class="col-md-6 gap-padding-fix" :key="signal.id">
                        <signal :signal="signal" v-bind:key="signal.id"></signal>
                    </div>
                </div>
                <div class="row" v-if="typeof(advertisements[key]) !== 'undefined'">
                    <div class="col-md-12 text-center mt-2 mb-2">
                        <a :href="advertisements[key].target" target="_blank">
                            <img :src="advertisements[key].source" :alt="advertisements[key].name" class="img-fluid">
                        </a>
                    </div>
                </div>  
            </div>
            <paginate v-if="pageCount > 1"
                :page-count="pageCount"
                :click-handler="getCurrentPage"
                :prev-text="'Prev'"
                :prev-class="'page-item'"
                :prev-link-class="'page-link'"
                :next-text="'Next'"
                :next-class="'page-item'"
                :next-link-class="'page-link'"
                :container-class="'pagination-x'"
                :page-class="'page-item'"
                :page-link-class="'page-link'">
            </paginate>
       </div>
            <div v-else class="alert alert-warning" role="alert">
                Sorry! Currently there is no active signal in this section. Please be active, signal will be updated shortly.
            </div>
            <div v-if="todaysSignalRows.length > 0">
                <h3 style="font-weight: 600;color: #3a3838;font-family: 'PT Sans', sans-serif;font-size: 20pt;text-transform:uppercase">
                    <span style="border-bottom: 3px solid #e8a403;">Todays Signal</span>
                </h3>
                <div v-for="(row, key) in todaysSignalRows" :key="key">
                    <div class="row fixed-gap15">
                        <div v-for="signal in row" class="col-md-6 gap-padding-fix" v-bind:key="signal.id">
                            <signal :signal="signal" :timezone="timezone" v-bind:key="signal.id" />
                        </div>
                    </div>
                    <div class="row fixed-gap15" v-if="typeof(advertisements[key]) !== 'undefined'">
                    <div class="col-md-12 text-center no-sm-p">
                        <a :href="advertisements[key].target" target="_blank">
                            <img :src="advertisements[key].source" :alt="advertisements[key].name" class="sig-ad">
                        </a>
                    </div>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
    import signal from './Signal.vue'
    export default {
       props: ['signals', 'advertisements', 'timezone'],
       components : { signal },
        data() {
             return {
                signalRows: '',
                signalPages: null,
                currentPage: 0,
                pageCount: 1,
                todaysSignalRows: []
             }       
        },

        mounted () {
            if(this.$vnode.key === 'active') {
                axios.get('/forex-signal/todays-signal')
                .then(response => {
                    this.todaysSignalRows = _.chunk(response.data, 2)
                })
                .catch(error => {
                    console.log(error)
                })
            }
        },

        watch: {
            signals(value) {
                // this.signalRows = _.chunk(this.signals, 2)
                let self = this
                this.signalPages = _.chunk(this.signals, 8)
                this.pageCount = this.signalPages.length
                // console.log(this.pageCount, this.currentPage + 1)
                if(this.currentPage + 1 != 1) {
                this.currentPage = this.pageCount < (this.currentPage + 1) ? this.currentPage - 1 : this.currentPage
                }
                
                this.signalRows = _.chunk(this.signalPages[self.currentPage], 2)
            },
            currentPage(page) {
                this.signalRows = _.chunk(this.signalPages[page], 2)
            }
        },
        methods: {
            getCurrentPage(page) {
                this.currentPage = page - 1
            }
        },
        created: function() {
            let self = this
            this.signalPages = _.chunk(this.signals, 8)
            this.pageCount = this.signalPages.length
            this.signalRows = _.chunk(this.signalPages[self.currentPage], 2)
		}
    }
</script>

<style type="scss" scoped>
    ul.pagination-x {
        list-style: none;
        display: flex;
        width: auto;
        justify-content: center;
    }
</style>