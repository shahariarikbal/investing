<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <div
            class="mb-2 drop-shadow money-transaction-details"
            style="position: relative"
            id="deposit-form"
        >
            <h3>New Deposit Request</h3>
            <div id="deposit-from-loading" style="display: none">
                <i
                    class="fa fa-spinner fa-pulse fa-5x fa-fw"
                    aria-hidden="true"
                ></i>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="payment-method">Payment Method</label>
                        <select
                            id="payment-method"
                            class="form-control"
                            v-model="paymentMethod"
                        >
                            <option value="paypal">Paypal</option>
                            <option value="perfect-money">Perfect Money</option>
                            <option value="neteller">Neteller</option>
                            <option value="skrill">Skrill</option>
                            <option value="bitcoin">Bitcoin</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="amount">Enter Amount</label>
                        <input
                            type="number"
                            class="form-control"
                            id="amount"
                            v-model="amount"
                            placeholder="Enter Deposit amount"
                        />
                    </div>
                    <div class="form-group">
                        <label for="note">Note <small>(Optional)</small></label>
                        <textarea
                            class="form-control"
                            id="note"
                            v-model="notes"
                            rows="3"
                        ></textarea>
                    </div>
                </div>

                <neteller
                    v-if="paymentMethod === 'neteller'"
                    :amount="amount"
                    @transactionId="transactionId"
                    @transactionScreenshot="transactionScreenshot"
                />

                <skrill
                    v-if="paymentMethod === 'skrill'"
                    :amount="amount"
                    @transactionId="transactionId"
                    @transactionScreenshot="transactionScreenshot"
                />

                <paypal
                    v-if="paymentMethod === 'paypal'"
                    :process_fee="process_fee"
                    :total="total"
                />

                <perfect-money
                    v-if="paymentMethod === 'perfect-money'"
                    :process_fee="process_fee"
                    :total="total"
                />

                <bitcoin v-if="paymentMethod === 'bitcoin'" />
            </div>
            <div class="form-group text-center">
                <button
                    type="submit"
                    class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4"
                    @click="deposit"
                >
                    Confirm Deposit
                </button>
            </div>
        </div>
        <deposit-history />
        <div class="mb-2 drop-shadow payment">
            <div class="row">
                <div class="col-md-6">
                    <faq />
                </div>
                <div class="col-md-6">
                    <div class="money-pie-chart">
                        <iframe
                            class="chartjs-hidden-iframe"
                            tabindex="-1"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"
                        ></iframe>
                        <canvas
                            id="myChart"
                            width="399"
                            height="199"
                            style="display: block; width: 399px; height: 199px;"
                        ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import DepositHistory from './History.vue'
    import Faq from './Faq.vue'

    import Neteller from './Neteller.vue'
    import Skrill from './Skrill.vue'
    import Paypal from './Paypal.vue'
    import PerfectMoney from './PerfectMoney.vue'
    import Bitcoin from './Bitcoin.vue'

    // import mixin from './mixins'
    
    export default {
        data() {
            return {
                paymentMethod: 'neteller',
                amount: 0.00,
                notes: '',
                transaction: {
                    id: '',
                    screenshot: ''
                },
                // process_fee: 0,
                
                error: 0
            }
        },
        // mixins: [mixin],

        // created() {
        //     this.flash('Data loaded', 'success');
        //     this.flash('Data loaded2', 'warning');
        //     this.flash('Data loaded3', 'info');
        // },
        components: { DepositHistory, Faq, Neteller, Skrill, Paypal, PerfectMoney, Bitcoin },
        computed: {
            process_fee () {
                var fee = 0

                if (this.paymentMethod === 'paypal') {
                    let v = parseFloat(this.amount)
                    fee = 0.3+0.023*v
                }


                if (this.paymentMethod === "perfect-money") {
                    let v = parseFloat(this.amount);
                    fee = 0.02 * v;
                }

                return fee.toFixed(2);
            },
            total() {
                let v = this.amount.length > 0 ? parseFloat(this.amount) : 0;
                if (typeof v !== "number" || v < 1) return 1;
                // eslint-disable-next-line no-eval
                let fee = parseFloat(this.process_fee);
                return parseFloat(fee + v).toFixed(2);
            }
        },
        watch: {
            // amount(value) {
            //     let v = parseFloat(this.amount)
            //     if (typeof v !== 'number' || v < 1) return 1
            //     // eslint-disable-next-line no-eval
            //     let fee = this.processiongFee;
            //     console.log(parseFloat(fee + v).toFixed(2))
            // }
        },
        methods: {
            resetError() {
                this.error = 0;
            },
            validate() {
                if (this.amount === 0) {
                    this.flash("Deposit amount required", "warning");
                    this.error++;
                }
                if (
                    this.paymentMethod === "neteller" ||
                    this.paymentMethod === "skrill"
                ) {
                    if (this.transaction.id.length === 0) {
                        this.flash("Transaction id required", "warning");
                        this.error++;
                    }
                    if (this.transaction.screenshot.length === 0) {
                        this.flash("Transaction screenshot required", "warning");
                        this.error++;
                    }
                }
            },
            deposit() {
                this.resetError();
                this.validate();

                if (this.error === 0) {
                    let height = parseInt(document.getElementById("deposit-form").offsetHeight);
                    let padding = (height - 40) / 2;
                    let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`;
                    document.getElementById("deposit-from-loading").setAttribute("style", loadingStyle);

                    let formData = new FormData();
                    formData.append("method", this.paymentMethod);
                    formData.append("amount", this.amount);
                    formData.append("notes", this.notes);
                    formData.append("transaction_id", this.transaction.id);
                    formData.append("transaction_screenshot", this.transaction.screenshot);
                    formData.append("process_fee", this.process_fee);

                    axios.post("/api/member/financial/deposit", formData, {
                            headers: {
                                "Content-Type": "multipart/form-data"
                            }
                        })
                        .then(response => {
                            document.getElementById("deposit-from-loading").setAttribute("style", "display: none");

                            if (response.status === 200) {
                                var res = response.data;
                                if (typeof res.form !== "undefined") {
                                    this.generateForm(res.form);
                                } else if (typeof res.redirect !== "undefined") {
                                    location.replace(res.redirect);
                                }
                            }

                            if (response.status === 201) {
                                this.flash("Deposit request has been received successfully and waiting for admin approval. Thank you.", "success");

                                this.paymentMethod = "neteller";
                                this.amount = 0.0;
                                this.note = "";
                                this.transaction.id = "";
                                this.transaction.screenshot = "";
                                this.process_fee = 0;

                                EventBus.$emit("clean-transaction-input");

                                EventBus.$emit("new-deposit", response.data);
                            }
                        })
                        .catch(error => {
                            document
                                .getElementById("deposit-from-loading")
                                .setAttribute("style", "display: none");
                            console.log(error);
                        });
                }
            },
            transactionId(payload) {
                this.transaction.id = payload;
            },
            transactionScreenshot(payload) {
                this.transaction.screenshot = payload;
            }
        }
    };
</script>
