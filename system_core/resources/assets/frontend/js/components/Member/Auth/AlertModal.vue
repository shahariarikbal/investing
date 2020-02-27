<template>
    <div class="modal show" style="display: block;background: #000000cc;" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel" aria-hidden="true">
        <div id="alert-modal-dialog" class="modal-dialog" role="document">
            <div class="modal-content">
                <div :class="`modal-body text-${message.type} text-center`">
                    {{ message.text }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ "message" ],
        mounted () {
            document.getElementById('alertModal').addEventListener('click', function(e){
                if (document.getElementById('alert-modal-dialog').contains(e.target) === false) {
                    EventBus.$emit('alertModalDisplay', false)
                }
            })
        }
    }
</script>
