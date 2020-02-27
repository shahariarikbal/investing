<template>
    <div class="payment-result">
        <form
            action=""
            @submit.prevent="submit"
        >
            <div class="card" style="background-color: #000;">
                <div class="card-body">
                    <div class="row" v-if="notify">
                        <div class="col">
                            {{notify}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            for="currency"
                            class="col-md-5"
                        >Deposit Currency</label>
                        <select
                            id="currency"
                            v-model="method.currency"
                            class="form-control col-md-7"
                        >
                            <option
                                v-for=" c in method.currencys"
                                :key="c"

                                :value="c"
                            >
                                {{ c }}
                            </option>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label
                            for="ammount"
                            class="col-md-5"
                        >Deposit Amount</label>
                        <div class="input-group col-md-7">
                            <div class="input-group-prepend">
                                <span class="input-group-text">$</span>
                            </div>
                            <input
                                id="ammount"
                                v-model="method.amount"
                                type="number"
                                class="form-control"
                            >
                        </div>
                    </div>
                    <div class="form-group row" v-if="method.transection">
                        <label
                            for="process_fee"
                            class="col-md-5"
                        >Transection Id <small><i
                            class="fas fa-question-circle text-muted ml-2"
                            data-toggle="tooltip"
                            title="Put your transection id here"
                        /></small></label>

                        <input
                            id="process_fee"
                            type="text"
                            class="col-md-7"
                            v-model="payment_id"
                        >
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile"  ref="file" v-on:change="handleFileUpload()">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="form-group row border-bottom" v-if="method.processing_fee">
                        <label
                            for="process_fee"
                            class="col-md-7"
                        >Processing Fee <small><i
                            class="fas fa-question-circle text-muted ml-2"
                            data-toggle="tooltip"
                            title="Calculated as $0.3 + 2.3% of the diposit amount"
                        /></small></label>

                        <input
                            id="process_fee"
                            type="text"
                            readonly
                            class="form-control-plaintext col-md-5 text-right"
                            :value="processiongFee"
                        >
                    </div>
                    <div class="form-group row mb-3">
                        <div

                            class="col-md-5"
                        >
                            <div class="font-weight-bold">
                                Total
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="text-right">
                                {{ total }} USD
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <button
                                type="submit"
                                class="btn btn-block btn-lg pt-2 pb-2"
                            >
                                Confirm and pay  {{ total }} USD
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <p>
                                <small>You agree to authorize the use of your PayPal account for this deposit and future payments.</small>
                                <br>
                                <small>
                                    PayPal does not support Prepaid and gift cards as a funding source.
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center pb-5">
                <img
                    :src="method.icon"
                    :alt="method.name"
                >
            </div>
        </form>
    </div>
</template>
<script>
import mixin from './mixin'

export default {
    mixins: [mixin],
    data () {
        return {
            method: {},
            payment_id: '',
            file: '',
            notify: '',
            loading: false,
        }
    },
    watch: {
        '$route' (r) {
            this.method = this.getMethod();
        }
    },
    computed: {
        
        processiongFee () {
            if (!this.method.processing_fee) {
                return 0;
            }
            let v = parseFloat(this.method.amount)
            if (typeof v !== 'number' || v < 1) return 1
            // eslint-disable-next-line no-eval
            var fee = eval(this.method.processing_fee)
            return fee.toFixed(2)
        },
        total () {
            let v = parseFloat(this.method.amount)
            if (typeof v !== 'number' || v < 1) return 1
            // eslint-disable-next-line no-eval
            let fee = this.processiongFee;
            return parseFloat(fee + v).toFixed(2)
        }
    },
    created () {
        this.method = this.getMethod();
    },
    methods: {
        getMethod () {
            return this.methods.find(m => m.class == this.$route.params.method)
        },
        submit () {
            if (this.loading) {
                return;
            }
            this.loading = true;
            let params = new FormData();

            /*
                Add the form data we need to submit
            */
            params.append('method', this.method.class);
            params.append('amount', parseFloat(this.method.amount));
            params.append('currency', this.method.currency);
            params.append('process_fee', parseFloat(this.processiongFee));
            params.append('payment_id', this.payment_id);
            params.append('total', parseFloat(this.total));
            params.append('file', this.file);


            axios.post(`/dashboard/wallet/deposits/${this.method.class}`, params)
                .then(response => {
                    var res = response.data
                    if (typeof res.form !== 'undefined') {
                        this.generateForm(res.form)
                    } else if (typeof res.redirect !== 'undefined') {
                        location.replace(res.redirect)
                    } else if (typeof res.notify !== 'undefined') {
                        this.notify = res.notify
                    }
                    this.method.amount = 0;
                    this.file = ''
                    this.payment_id = ''
                    this.loading = false;
                })
        },
        generateForm (fromdata) {
            var from = document.createElement('form')
            for (const attr in fromdata.attr) {
                if (fromdata.attr.hasOwnProperty(attr)) {
                    from.setAttribute(attr, fromdata.attr[attr])
                }
            }
            for (const input in fromdata.fields) {
                if (fromdata.fields.hasOwnProperty(input)) {
                    var inputnode = document.createElement('input')
                    inputnode.setAttribute('type', 'hidden')
                    inputnode.setAttribute('value', fromdata.fields[input])
                    inputnode.setAttribute('name', input)
                    from.appendChild(inputnode)
                }
            }

            this.$el.appendChild(from)
            from.submit()
        },
        handleFileUpload(){
            this.file = this.$refs.file.files[0];
        }
    }
}
</script>
