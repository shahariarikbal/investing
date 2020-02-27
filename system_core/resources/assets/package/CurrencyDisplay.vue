<template>
    <div>
        <span style="display: inline" v-if="isIcon" v-html="icon"></span>
        <span style="display: inline" v-if="isLogo">{{ logo }}</span>
        <span style="display: inline" v-if="text">&nbsp; {{ signal.currency.name }}</span>
    </div>
</template>

<script>
    export default {
        props: {
            signal: {
                type: Object,
                default: true
            },
            text: {
                type: Boolean,
                default: true
            },
            image: {
                type: Boolean,
                default: true
            }
        },
        data () {
            return {
                isIcon: false,
                isLogo: false,

                icon: '',
                logo: '',
            }
        },
        created() {
            if (this.signal.currency.icon) {
                this.isIcon = true
                this.isLogo = false

                let icon = this.signal.currency.icon.split('-')
                
                this.icon = "<i class=\"flag-icon flag-icon-" + icon[0] + "\"></i><i class=\"flag-icon flag-icon-" + icon[1] + "\"></i>"
            } else {
                this.isIcon = false
                this.isLogo = true

                this.logo = "<img src=\"" + InvestingPartner.app_url + "/currency/images/" + this.signal.currency.logo + "\" />"
            }
                // let index = this.images.findIndex(image => {
                // return image.title === this.data.toLowerCase()
                //     // return image.title === this.data
                // })
                // this.output = this.images[index]
        }
    }
</script>