<template>
    <div>
        <span v-if="className.length > 0" v-text="className"></span>
    </div>
</template>

<script>
    export default {
        props: {
            namespace: {
                type: String,
                required: true
            },
        },
        computed: {
            className () {
                let namespace = this.namespace.split('\\')
                return namespace[namespace.length - 1]
            }
        }
    }
</script>