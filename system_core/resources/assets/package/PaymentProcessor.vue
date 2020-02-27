<template>
    <div style="display: flex; justify-content:center">
        <span v-if="text" v-text="output.title"></span>
        <img style="width: 80px" v-if="image" :src="output.image" :alt="data">
    </div>
</template>

<script>
    export default {
        props: {
            image: {
                type: Boolean,
                default: false
            },
            text: {
                type: Boolean,
                default: true
            },
            data: {
                type: String,
                required: true
            }
        },
        data () {
            return {
                images: [
                    {
                        'image': InvestingPartner.app_url + '/assets/images/payment/paypal.png',
                        'title': 'paypal'
                    },
                    {
                        'image': InvestingPartner.app_url + '/assets/images/payment/perfect-money.png',
                        'title': 'perfect-money'
                    },
                    {
                        'image': InvestingPartner.app_url + '/assets/images/payment/neteller.png',
                        'title': 'neteller'
                    },
                    {
                        'image': InvestingPartner.app_url + '/assets/images/payment/skrill.png',
                        'title': 'skrill'
                    },
                    {
                        'image': InvestingPartner.app_url + '/assets/images/payment/bitcoin.png',
                        'title': 'bitcoin'
                    },
                    {
                        'image': InvestingPartner.app_url + '/assets/images/payment/payoneer.png',
                        'title': 'payoneer'
                    },
                    {
                        'image': InvestingPartner.app_url + '/assets/images/payment/wallet.png',
                        'title': 'wallet'
                    }
                ],
                output: {}
            }
        },
        created() {
                let index = this.images.findIndex(image => {
                return image.title === this.data.toLowerCase()
                    // return image.title === this.data
                })
                this.output = this.images[index]
        }
    }
</script>