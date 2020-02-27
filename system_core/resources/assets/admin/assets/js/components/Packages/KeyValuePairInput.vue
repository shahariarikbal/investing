<template>
    <div>
        <div style="display: flex;justify-content: space-between;">
            <input type="text" class="form-control" name="feature_details_key[]" placeholder="key" v-model="keyText">
            <input type="text" class="form-control" name="feature_details_value[]" placeholder="value" v-model="valueText">
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            data: {
                type: Object,
                required: false
            }
        },
        data () {
            return {
                keyText: this.data ? this.data.key : '',
                valueText: this.data ? this.data.value : ''
            }
        },
        watch: {
            data(value) {
                this.keyText = value.key
                this.valueText = value.value
            },
            keyText (value) {
                this.$emit('update-key', value, this.$vnode.key)
            },
            valueText(value) {
                this.$emit('update-value', value, this.$vnode.key)
            }
        }
    }
</script>