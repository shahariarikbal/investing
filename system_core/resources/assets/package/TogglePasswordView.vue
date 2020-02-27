<template>
    <div>
        <span
            :data-toggle="target"
            @click="toggle(target)"
            class="ion-eye toggle-password"
        ></span>
    </div>
</template>

<script>
    export default {
        props: {
            targetId: {
                type: String,
                required: true
            }
        },
        computed: {
            target () {
                return "#"+this.targetId
            }
        },
        methods: {
            toggle (target) {
                if (document.getElementById(this.targetId).getAttribute('type') === 'password') {
                    document.getElementById(this.targetId).setAttribute('type', 'text')
                } else {
                    document.getElementById(this.targetId).setAttribute('type', 'password')
                }
            }
        }
    }
</script>