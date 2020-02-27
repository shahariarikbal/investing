<template>
    <div>
        <a class="btn btn-dark btn-sm" href="javascript:void(0)" v-text="timeSettings"></a>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                timezone: localStorage.getItem('timezone'),
                timeformat: localStorage.getItem('timeformat'),
                now: null,
                options: null,
                execute: null
            }
        },
        created () {

            this.options = { timeZone: this.timezone, hour: 'numeric', minute: 'numeric', second: '2-digit' }

            if(localStorage.getItem("timeformat") == 12) this.options.hour12 = true
            if(localStorage.getItem("timeformat") == 24) this.options.hour12 = false

            // this.now = new Date().toLocaleString("en-US", options)

            this.executeTime()

            EventBus.$on('timezone', payload => {
                // console.log(payload.timezone, payload.timeFormat)
                this.timezone = payload.timezone
                this.timeformat = payload.timeFormat

                this.options = { timeZone: this.timezone, hour: 'numeric', minute: 'numeric', second: '2-digit' }

                if(this.timeformat == 12) this.options.hour12 = true
                if(this.timeformat == 24) this.options.hour12 = false

                if (this.execute) {
                    clearTimeout(this.execute)
                }
                this.executeTime()
                
            })

        },
        computed: {
            timeSettings () {
                return `${this.now} (${this.timezone} - ${this.timeformat} Hours)`
            }
        },
        methods: {
            executeTime () {
                this.execute = setInterval(() => {
                    this.now = new Date().toLocaleString("en-US", this.options)
                }, 1000)
            }
        }
    }
</script>

