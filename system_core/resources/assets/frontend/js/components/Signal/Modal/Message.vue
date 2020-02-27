<template>
	<div>
		<div class="modal fade" id="message-modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h3 class="modal-title" v-text="message.title"></h3>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p v-text="message.body"></p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</template>

<script>
  export default {
    props: [ 'message' ]
  }
</script>

<style scoped>
  .modal-title {
    font-weight: 400;
  }
  .modal-body p {
    padding: 0 18px;
  }
	.modal-footer .btn {
		background: #03A9F4;
    color: #fff;
	}
	.modal-header .close {
		background:inherit;
		top:0;
	}
</style>