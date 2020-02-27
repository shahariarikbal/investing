<template>
	<div>
		<div class="modal fade" id="regulated-information-modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header" style="border-bottom: 1px solid #efefef;">
		        <h3 class="modal-title">Regulated Broker</h3>
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
				  </button>
		      </div>
		      <div class="modal-body">
		        <div class="modal-body no-pb borker-regulated-content broker-list">

					<h3 class="cc-name" style="text-align: center" v-text="broker.name"></h3>

					<p class="varify" style="text-align: center">( Regulated and verified broker by InvestingPartner )</p>

					<ul>

						<li><i class="fas fa-check-square mr-1 text-primary"></i><span class="fw-600">Website :</span><span class="web"> {{ broker.website_title }}</span></li>

						<li><i class="fas fa-check-square mr-1 text-primary"></i><span class="fw-600">Company Name :</span><span class="c-name"> {{ broker.name }}</span></li>

						<li><i class="fas fa-check-square mr-1 text-primary"></i><span class="fw-600">Foundation :</span><span class="found"> {{ broker.founded_in }}</span></li>

						<li><i class="fas fa-check-square mr-1 text-primary"></i><span class="fw-600">Headquarter :</span> <span class="headquar"> {{ broker.headquarter }}</span></li>

						<li><i class="fas fa-check-square mr-1 text-primary"></i><span class="fw-600">Regulation :</span> <span class="regu" v-if="broker.meta"> {{ regulated }}</span></li>
						
						<li><i class="fas fa-check-square mr-1 text-primary"></i><span class="fw-600">Payment Processor :</span> <span class="payment" v-if="broker.meta"> {{ broker.meta.acc_currency }}</span></li>

					</ul>

				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal" style="color: #fff;background-color: #0069d9;border-color: #0062cc;">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</template>

<script>
  export default {
    props: {
		broker: {
			type: Object,
			required: true
		}
	},
	computed: {
		regulated () {
			return this.broker.regulatory_authorities.map(authority => {
				return authority.name
			}).join(', ')
		}
	}
  }
</script>

<style>
	.modal {
		z-index:1150;
	}
	.modal-title {
		font-weight: 400;
	}
	.modal-body p {
		padding: 0 18px;
	}
	.modal-body ul li {
		list-style-type:none;
	}
</style>