<template>
    <div>
        <div class="panel panel-light panel-flat sig-tabs">
            <!-- Nav tabs -->
            <ul class="custum-nav-indicator nav nav-tabs nav-tabs-transparent indicator-primary nav-tabs-full nav-tabs-4 "
                role="tablist">
                <li :id="`lebel_${type}`" :class="{'nav-item active': (type == 'active'), 'nav-item': (type != 'active') }" role="presentation" v-for="(signal, type) in signalData" v-bind:key="type">
                    <SignalLabel :type="type" :newSignalCount="newTypedSignalCount(type)" v-on:active="active"></SignalLabel>
                </li>
            </ul>
        </div>
        <signalRow 
            :class="{'tab-content show': (type == 'active'), 'tab-content': (type != 'active') }" 
            v-for="(signal, type) in signalData" 
            :id="type" 
            :key="type" 
            :signals="signal" 
            :advertisements="advertisements"
            :timezone="timezone"></signalRow>
    </div>
</template>

<script>
    //import Components
    //import now from '../Timezone/Now.vue'
    import SignalRow from './SignalRow.vue'
    import SignalLabel from './SignalLabel'
    export default {
        props: [ 'signals', 'premium' ],
        components : { SignalRow, SignalLabel },
        data() {
            return {
                signalData: this.signals,
                newSignalCount: 0,
                newFilledCount: 0,
                newExpireCount: 0,
                newCancelCount: 0,
                advertisements: [
                    {
                        name: 'one',
                        target: 'http://www.fxsvps.com/',
                        source: '/addimage/1548832027.gif'
                    },
                    {
                        name: 'two',
                        target: 'https://www.exness.com/a/pif35v6a',
                        source: '/addimage/1548833325.png'
                    },
                    {
                        name: 'three',
                        target: 'http://www.fxsvps.com/',
                        source: '/addimage/1548832027.gif'
                    },
                    {
                        name: 'four',
                        target: 'https://www.exness.com/a/pif35v6a',
                        source: '/addimage/1548833325.png'
                    },
                    {
                        name: 'five',
                        target: 'http://www.fxsvps.com/',
                        source: '/addimage/1548832027.gif'
                    },
                ],
                timezone: null
            }
        },

        created() {
            EventBus.$on('timezone', payload => {
                this.timezoneSettings(payload)
            })
        },

        methods: {
            newTypedSignalCount(type){
                switch (type){
                    case 'active':
                        return this.newSignalCount
                    case 'filled':
                        return this.newFilledCount
                    case 'expire':
                        return this.newExpireCount
                    case 'cancel':
                        return this.newCancelCount
                }
            },

            active(id) {
               
                switch (id) {
                    case 'active':
                        this.newSignalCount = 0
                    case 'filled':
                        this.newFilledCount = 0
                    case 'expire':
                        this.newExpireCount = 0
                    case 'cancel':
                        this.newCancelCount = 0
                }

                $(".nav-item.active").removeClass('active')
                setTimeout(function() {
                    $("#lebel_"+id).addClass('active')
                }, 10)
            
                $(".tab-content.show").removeClass('show')
                setTimeout(function() {
                    $("#"+id).addClass('show')
                }, 10)
            },
            timezoneSettings(payload) {
                this.timezone = null
                this.timezone = payload
            }
        }
    }
</script>

<style style="scss" scoped>
    .tab-content {
        display: none;
    }

    .tab-content.show {
        display: block;
    }
    
    
</style>