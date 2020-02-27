<template>
    <div>
        <a v-if="!isAddedToCompareWidget && numberOfBrokerInCompareWidget <= 2" class="btn btn-info btn-sm text-white btn-block" @click="addToCompare">Add To Compare</a>
        <a v-if="isAddedToCompareWidget" class="btn btn-info btn-sm text-white btn-block">Queued in Compare</a>
    </div>
</template>

<script>
export default {
    props: {
        slug: 
        {
            type: String,
            required: true
        }
    },
    data() {
        return {
            numberOfBrokerInCompareWidget: 0,
            isAddedToCompareWidget: false
        }
    },
    mounted() {
        this.init()
        EventBus.$on('updateCompare', () => {
            this.isAddedToCompareWidget = false
            this.init()
        })
    },
    methods: {
        init() {

            let brokersToBeComparedInCookie = document.cookie.split(';').filter((item) => {
                if (item.trim().startsWith('broker')) {
                    return true
                }
            })

            this.numberOfBrokerInCompareWidget = brokersToBeComparedInCookie.length

            let self = this
            brokersToBeComparedInCookie.map(item => {
                if (item.search(self.slug) > 0) {
                    this.isAddedToCompareWidget = true
                }
            })
        },
        addToCompare() {
            document.cookie = "broker[" + this.numberOfBrokerInCompareWidget + "]="+this.slug+"; path=/"
            this.init()
            EventBus.$emit('updateCompare');
        }
    }
}
</script>

<style lang="scss">
    a {
        cursor: pointer;
    }
</style>