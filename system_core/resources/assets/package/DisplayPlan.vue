<template>
    <div>
        <span v-if="information.length > 0" v-text="information"></span>
    </div>
</template>

<script>
    export default {
        props: {
            plan: {
                type: Object,
                required: true
            },
        },
        computed: {
            information () {
                var information = this.plan.duration + ' "' + this.plan.name + '"'
                let service = this.plan.service.split("\\")
                information += " " + service[service.length - 1] + " Plan @"
                if (service[service.length - 1] === "FundManagement") {
                    information += this.plan.details[0].value
                } else {
                    information += this.plan.price
                }
                return information
            }
        }
    }
</script>