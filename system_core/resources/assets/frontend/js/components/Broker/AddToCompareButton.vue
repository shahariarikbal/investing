<template>
    <div>
        <a v-if="!isAddedToCompareWidget && numberOfBrokerInCompareWidget <= 2" class="btn ml-1 bg-info text-white btn-sm addToCompare" @click="addToCompare">Compare</a>
        <a v-if="isAddedToCompareWidget" class="btn ml-1 bg-info text-white btn-sm">Queued</a>
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

<style scoped>
    a {
        cursor: pointer;
        -webkit-writing-mode: vertical-rl;
    -ms-writing-mode: tb-rl;
    writing-mode: vertical-rl;
    background: white;
    padding: 20px 10px;
    box-shadow: 0px 1px 7px 0px rgba(170, 170, 170, 0.95);
    color: #3fc1fb;
    font-weight: 400;
    font-size: 14px;
    letter-spacing: 2px;
    }
    .compare-btn {
        background-color:#137888;
        color: #fff;
        font-size: 12px;
        padding: 0.25rem .50rem;
        width: 100%;
        border-radius: 2px;
        text-transform: uppercase;
    }
    .compare-btn:hover {
        color: #fff;
    }
</style>