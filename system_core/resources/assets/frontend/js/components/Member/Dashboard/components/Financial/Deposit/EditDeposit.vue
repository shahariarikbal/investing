<template>
    <div class="modal show" style="display: block;background: #000000cc;" id="depositEditModal" tabindex="-1" role="dialog" aria-labelledby="depositEditLabel" aria-hidden="true">
        <div id="deposit-edit-modal-dialog" style="margin-top: 100px" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-2 drop-shadow money-transaction-details" style="position: relative" id="deposit-edit-form">
                        <div id="deposit-from-loading" style="display: none">
                            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="payment-method">Payment Method</label>
                                    <select id="payment-method" class="form-control" v-model="paymentMethod">
                                        <option value="paypal">Paypal</option>
                                        <option value="perfect-money">Perfect Money</option>
                                        <option value="neteller">Neteller</option>
                                        <option value="skrill">Skrill</option>
                                        <option value="bitcoin">Bitcoin</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="amount">Enter Amount</label>
                                    <input type="number" class="form-control" id="amount" v-model="amount" placeholder="Enter Deposit amount">
                                </div>
                                <div class="form-group">
                                    <label for="note">Note <small>(Optional)</small></label>
                                    <textarea class="form-control" id="note" v-model="notes" rows="3"></textarea>
                                </div>
                                
                            </div>

                            <neteller
                                v-if="paymentMethod === 'neteller'"
                                :amount="amount" 
                                @transactionId="transactionId"
                                @transactionScreenshot="transactionScreenshot" />

                            <skrill
                                v-if="paymentMethod === 'skrill'"
                                :amount="amount"
                                @transactionId="transactionId"
                                @transactionScreenshot="transactionScreenshot" />

                            <paypal v-if="paymentMethod === 'paypal'" />
                            <perfect-money v-if="paymentMethod === 'perfect-money'" />
                            <bitcoin v-if="paymentMethod === 'bitcoin'" />
                        </div>
                        <div class="form-group text-center">
                            <button 
                                type="submit" 
                                class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4"
                                @click="deposit">Confirm Deposit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Neteller from './Neteller.vue'
    import Skrill from './Skrill.vue'
    import Paypal from './Paypal.vue'
    import PerfectMoney from './PerfectMoney.vue'
    import Bitcoin from './Bitcoin.vue'

    export default {
        data () {
            return {

                deposit: {},

                paymentMethod: 'neteller',
                amount: 0.00,
                notes: '',
                transaction: {
                    id: '',
                    screenshot: ''
                },
                process_fee: 0,
                
                error: 0
            }
        },
        components: { Neteller, Skrill, Paypal, PerfectMoney, Bitcoin },

        created () {
            axios.post('/api/member/financial/deposit/'+this.$route.params.id)
                .then(response => {
                    this.deposit = response.data
                    this.paymentMethod = response.data.methods.split("\\")[response.data.methods.split("\\").length - 1].toLowerCase()
                })
                .catch(error => {
                    console.log(error)
                })
        },

        mounted() {
            let self = this
            document.getElementById('depositEditModal').addEventListener('click', function(e){
                if (document.getElementById('deposit-edit-modal-dialog').contains(e.target) === false) {
                    self.$router.push({ name: 'deposit' })
                }
            })
        },
        methods: {
            resetError () {
                this.error = 0
            },
            validate () {
                if (this.amount === 0) {
                    this.flash('Deposit amount required', 'warning')
                    this.error++
                }
                if (this.transaction.id.length === 0) {
                    this.flash('Transaction id required', 'warning')
                    this.error++
                }
                if (this.transaction.screenshot.length === 0) {
                    this.flash('Transaction screenshot required', 'warning')
                    this.error++
                }
            },
            deposit () {
                this.resetError()
                this.validate()
                

                if (this.error === 0) {
                    let height = parseInt(document.getElementById('deposit-form').offsetHeight)
                    let padding = (height - 40) / 2
                    let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                    document.getElementById('deposit-from-loading').setAttribute('style', loadingStyle)

                    let formData = new FormData()
                    formData.append('method', this.paymentMethod)
                    formData.append('amount', this.amount)
                    formData.append('notes', this.notes)
                    formData.append('transaction_id', this.transaction.id)
                    formData.append('transaction_screenshot', this.transaction.screenshot)
                    formData.append('process_fee', this.process_fee)

                
                    axios.post('/api/member/financial/deposit', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(response => {
                            document.getElementById('deposit-from-loading').setAttribute('style', 'display: none')
                            if (response.status === 201) {
                                this.flash('Deposit request has been received successfully and waiting for admin approval. Thank you.', 'success')
                                
                                this.paymentMethod = 'neteller'
                                this.amount = 0.00
                                this.note = ''
                                this.transaction.id = ''
                                this.transaction.screenshot = ''
                                this.process_fee = 0

                                EventBus.$emit('clean-transaction-input')

                                EventBus.$emit('new-deposit', response.data)
                            }
                        })
                        .catch(error => {
                            document.getElementById('deposit-from-loading').setAttribute('style', 'display: none')
                            console.log(error)
                        })
                }
                
            },
            transactionId (payload) {
                this.transaction.id = payload
            },
            transactionScreenshot (payload) {
                this.transaction.screenshot = payload
            }
        }
    }
</script>