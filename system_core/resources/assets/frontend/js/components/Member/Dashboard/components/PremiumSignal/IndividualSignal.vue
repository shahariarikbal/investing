<template>
    <div class="modal show" style="display: block;background: #000000cc;" id="individualSignalModal" tabindex="-1" role="dialog" aria-labelledby="individualSignalModalLabel" aria-hidden="true">
        <div id="individualSignalDialog" class="modal-dialog" role="document" style="position: relative; margin-top: 100px">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <signal :signal="signal" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import signal from './../../../../Signal/Signal'

    export default {
        props: {
            signal: {
                type: Object,
                required: true
            }
        },
        components: { signal },
        mounted () {
            document.getElementById('individualSignalModal').addEventListener('click', function(e){
                if (document.getElementById('individualSignalDialog').contains(e.target) === false) {
                    EventBus.$emit('individualSignalDisplay', false)
                }
            })
        }
    }
</script>