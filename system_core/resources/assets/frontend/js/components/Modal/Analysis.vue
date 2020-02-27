<template>
	<div>
		<div v-if="show" class="modal" id="analysis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg animated zoomIn animated-3x" role="document">
            <div class="modal-content modal1-bg">
              <div class="modal-header modal-header-bg-signal">
                <h3 class="modal-title" id="myModalLabel">Signal Analysis</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body no-pb modal-list-menu pt-1">
                <div class="intra-modal-image">
                  <img id="mymodalshow" :src="attachment" alt="demo">
                  <div class="pic-shadow"></div>
                </div>
              </div>
              <div class="modal-footer no-pb no-pt">
                <button type="button" class="btn btn-raised btn-primary-modal" data-dismiss="modal" @click="close">Close</button>
              </div>
            </div>
          </div>
        </div>
	</div>
</template>

<script>
	export default {
        props: [ 'attachment', 'show' ],
        methods: {
            close() {
                this.$emit('close')
            }
        }
	}
</script>
<style scoped>
	.modal-footer .btn {
		background: #03A9F4;
    color: #fff;
	}
	.modal-header .close {
		background:inherit;
		top:0;
	}
</style>