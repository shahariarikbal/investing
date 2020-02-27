<template>
    <div class="platform-column">
        <ul 
            v-for="(tradingPlatform, index) in tradingPlatforms" 
            :key="index">
            <li v-for="platform in tradingPlatform" :key="platform.id">{{ platform.name }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        platforms: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            tradingPlatforms: []
        }
    },
    mounted() {
        this.tradingPlatforms = _.chunk(this.platforms, 3)
    }
}
</script>
<style lang="scss">
    .platform-column {
        ul {
            padding: 0;
            margin: 0;
            li {
                text-align: left;
            }
        }
    }
</style>