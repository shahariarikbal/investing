<template>
	<div>
		<div class="modal fade" id="regulated-information-modal" tabindex="-1" role="dialog">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
				<div class="ribbon ribbon-top-left"><span>Regulated Broker</span></div>
		      <!--<div class="modal-header" style="border-bottom: 1px solid #efefef;">
		       <h3 class="cc-name" style="text-align: center" v-text="broker.name"></h3>
				  	<a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
					  	<span aria-hidden="true">&times;</span>
				  	</a>
		      </div>-->
		      <div class="modal-body">
		        <div class="modal-body no-pb borker-regulated-content broker-list">
					<h3 class="cc-name" style="text-align: center;font-weight: bold;letter-spacing: 1px;color: #3498db;text-transform: uppercase;" v-text="broker.name"></h3>
				  	<a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;top:0;right:0;color:#3498db;opacity:1;">
					  	<span aria-hidden="true">&times;</span>
				  	</a>
					

					<p class="varify" style="text-align: center;text-transform: uppercase;margin-bottom: 2rem;">( Regulated and verified broker by InvestingPartner )</p>

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
		        <a href="javascript:void(0)" style="background: #3498db;color: #fff;" class="btn" data-dismiss="modal" >Close</a>
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

<style scoped>
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
	.box {
  position: relative;
  max-width: 600px;
  width: 90%;
  height: 400px;
  background: #fff;
  box-shadow: 0 0 15px rgba(0,0,0,.1);
}

/* common */
.ribbon {
  width: 150px;
  height: 150px;
  overflow: hidden;
  position: absolute;
}
.ribbon::before,
.ribbon::after {
  position: absolute;
  z-index: -1;
  content: '';
  display: block;
  border: 5px solid #2980b9;
}
.ribbon span {
  position: absolute;
  display: block;
  width: 225px;
  padding: 15px 0;
  background-color: #3498db;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
  color: #fff;
  font: 700 12px/1 'Lato', sans-serif;
  text-shadow: 0 1px 1px rgba(0,0,0,.2);
  text-transform: uppercase;
  text-align: center;
}

/* top left*/
.ribbon-top-left {
  top: -10px;
  left: -10px;
}
.ribbon-top-left::before,
.ribbon-top-left::after {
  border-top-color: transparent;
  border-left-color: transparent;
}
.ribbon-top-left::before {
  top: 0;
  right: 0;
}
.ribbon-top-left::after {
  bottom: 0;
  left: 0;
}
.ribbon-top-left span {
  right: -25px;
  top: 37px;
  transform: rotate(-45deg);
}
.broker-list li {
	line-height: 30px;
}
html .text-primary {
    color: #3498db !important;
		padding-right: 5px;
}

</style>