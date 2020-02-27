<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="font-weight-bold mt-5 ">
                    Add a Verified Payment Method
                </h3>
            </div>
        </div>
        <div class="row mt-5 mb-5 ">
            <div class="col-md-4 text-center">
                <img
                    src="/images/payment/1.png"
                    alt=""
                >
                <div class="content-title mt-2">
                    <h5 class="font-weight-bold">
                        Add a verified payment method
                    </h5>
                    <p>Appear more professional with a payment verified badge.</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <img
                    src="/images/payment/2.png"
                    alt=""
                >
                <div class="content-title mt-2">
                    <h5 class="font-weight-bold">
                        Receive a FREE Plus membership trial
                    </h5>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <img
                    src="/images/payment/3.png"
                    alt=""
                >
                <div class="content-title mt-2">
                    <h5 class="font-weight-bold">
                        Concentrate on success!
                    </h5>
                    <p>Bid, post projects, pay easier and get stuff done faster.</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="info-box">
                    <div class="text-center mb-3">
                        <img
                            src="/images/payment/credit-card.png"
                            class="img-fluid"
                            alt=""
                        >
                    </div>
                    <div class="text-center mb-3">
                        <a
                            href="#"
                            class="btn bg-theme text-white"
                        >Add Credit or Debit Card</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <div class="text-center mb-2 mt-4">
                        <img
                            src="/images/payment/Paypal-Logo-PNG.png"
                            class="img-fluid"
                            alt=""
                            width="150"
                        >
                    </div>
                    <div class="text-center mb-1">
                        <a
                            href="#"
                            class="btn btn-success bg-theme text-white"
                        >Add PayPal Account</a>
                    </div>
                    <div class="text-center">
                        <small class="m-2">*PayPal does not support Prepaid and gift cards as a funding source.</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="text-muted mt-5 mb-5">
                    * When compared to Freelancers not on a membership, based on internal data between May 1, 2016 to July 13, 2016.
                </p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-4">
                <form class="p-3 edit-form-control">
                    <div class="form-row">
                        <div class="form-group col-md-12 text-center">
                            <span class="font-weight-bold">All major cards accepted.</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="cardNumber">Card number:</label>
                            <input
                                id="cardNumber"
                                type="text"
                                class="form-control"
                            >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="expiryDate">Expiry date:</label>
                            <input
                                id="expiryDate"
                                type="text"
                                class="form-control"
                            >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="cardholdername">Cardholder name:</label>
                            <input
                                id="cardholdername"
                                type="text"
                                class="form-control"
                            >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ccv">CCV/CVV:</label>
                            <input
                                id="ccv"
                                type="text"
                                class="form-control"
                            >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <ul class="m-0 p-0">
                                <li class="d-inline-block">
                                    <img
                                        src="/images/payment/visa.png"
                                        alt=""
                                        width="38"
                                    >
                                </li>
                                <li class="d-inline-block">
                                    <img
                                        src="/images/payment/mastercard.png"
                                        alt=""
                                        width="48"
                                    >
                                </li>
                                <li class="d-inline-block">
                                    <img
                                        src="/images/payment/american_express.png"
                                        alt=""
                                        width="48"
                                    >
                                </li>
                                <li class="d-inline-block">
                                    <img
                                        src="/images/payment/jcb.png"
                                        alt=""
                                        width="42"
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <form class="p-3 edit-form-control">
                    <div class="form-group row">
                        <label
                            for="currency"
                            class="col-sm-6 col-form-label"
                        >Card Currency</label>
                        <div class="col-sm-6 position-relative">
                            <select
                                id="currency"
                                class="form-control"
                            >
                                <option>US Dollar</option>
                                <option>Taka</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a
                                href="#"
                                class="btn btn-block btn-lg text-capitalize bg-theme text-white"
                            >Verify Payment Method</a>
                        </div>
                        <div class="col-md-12">
                            <p class="mt-3">
                                You agree to authorize the use of your PayPal account for future payments.
                                PayPal does not support Prepaid and gift cards as a funding source.
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {

        }
    },
    computed: {

    },
    created () {

    },
    methods: {

    }
}
</script>
  <style>
    .payment-method-blade {
      margin-top: 93px;
    }
    .info-box {
        background:#F0F0F0;
        height:250px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    form {
      background:#F0F0F0;
      border-radius:20px;
    }
  </style>
