<template>
    <div>
        <span v-text="datetime"></span>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        props: {
            date: {
                required: true
            }
        },
        computed: {
            datetime () {
                return moment(this.date).format("MMM Do YYYY, h:mm:ss a")
            }
        }
    }
</script>