<template>
    <div class="mb-2 drop-shadow money-transaction-details">
        <form @submit.prevent="submit" v-if="balance > 0" style="position: relative" id="withdraw-form">
            <div id="withdraw-from-loading" style="display: none">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>New Withdraw Request</h3>
                    <div class="form-group">
                        <label for="">Enter Amount</label>
                        <input
                            type="number"
                            class="form-control"
                            v-model.number="amount"
                            :max="balance"
                            min="1"
                            required
                            placeholder=""
                        />
                        <small class="text-danger" v-if="amountError.length > 0" v-text="amountError"></small>
                        <span>Your remaining withdrawable balance: {{ (balance - amount) | currency }}</span>
                    </div>
                    <div class="form-group">
                        <label for="">Payment Method</label>
                        <select id="" class="form-control" v-model="method">
                            <option value="">Please select a payment method</option>
                            <option value="paypal">Paypal</option>
                            <option value="perfect-money">Perfect Money</option>
                            <option value="neteller">Neteller</option>
                            <option value="payoneer">Payoneer</option>
                            <option value="skrill">Skrill</option>
                            <!-- <option value="bitcoin">Bitcoin</option> -->
                        </select>
                        <small class="text-danger" v-if="methodError.length > 0" v-text="methodError"></small>
                    </div>
                    <div class="form-group" v-if="method.length > 0">
                        <label for="account" v-text="accountLabel">Enter Receiving Account</label>
                        <input
                            :type="accountType"
                            class="form-control"
                            id="account"
                            v-model="account"
                            :placeholder="accountPlaceholder"
                            required
                        />
                        <small class="text-danger" v-if="accountError.length > 0" v-text="accountError"></small>
                    </div>
                    <div class="form-group">
                        <label for="">Remark (Optional)</label>
                        <textarea
                            class="form-control"
                            v-model="remark"
                            rows="3"
                        ></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-center">
                        <button
                            type="submit"
                            class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4"
                        >
                            Submit Request
                        </button>
                    </div>
                </div>
            </div>
        </form>
       <div
            class="alert alert-warning"
            role="alert"
            v-else
        >
            Not enough balance to withdraw.
        </div>
    </div>
</template>

<script>
export default {
    props: {
        balance: {
            type: Number,
            required: true,
        }
    },
    data () {
        return {
            amount: 0,
            method: '',
            account: '',
            remark: '',

            errorCount: 0,
            amountError: '',
            methodError: '',
            accountError: ''
        }
    },
    computed: {
        accountLabel: function () {
            switch (this.method) {
                case 'paypal':
                    return 'Enter Paypal Email'
                    break;
                case 'perfect-money':
                    return 'Enter Perfect Money Account'
                    break;
                case 'neteller':
                    return 'Enter Neteller Email'
                    break;
                case 'payoneer':
                    return 'Enter Payoneer Email'
                    break;
                case 'skrill':
                    return 'Enter Skrill Email'
                    break;
            }
        },
        accountPlaceholder: function () {
            switch (this.method) {
                case 'paypal':
                    return 'user@example.com'
                    break;
                case 'perfect-money':
                    return 'Uxxxxxxx'
                    break;
                case 'neteller':
                    return 'user@example.com'
                    break;
                case 'payoneer':
                    return 'user@example.com'
                    break;
                case 'skrill':
                    return 'user@example.com'
                    break;
            }
        },
        accountType: function () {
            return ['paypal', 'neteller', 'payoneer', 'skrill'].includes(this.method) ? 'email' : 'text'
        }
    },
    created () {

    },
    methods: {
        resetError () {
            this.errorCount = 0
            this.amountError = ''
            this.methodError = ''
            this.accountError = ''
        },
        validate () {
            if (this.amount === 0) {
                this.amountError = "Enter an amount you want to withdraw"
                this.errorCount++
            }

            if (!['paypal', 'perfect-money', 'neteller', 'payoneer', 'skrill'].includes(this.method)) {
                this.methodError = 'Please select a supported method'
                this.errorCount++
            }

            if (this.method != '' && this.account.length === 0) {
                let account = this.method === 'perfect-money' ? 'account number' : 'email'
                this.accountError = 'Please enter your ' + this.method.replace('-', ' ')  + ' ' + account + ' you would like to withdraw on'
                this.errorCount++
            }

            if (['paypal', 'neteller', 'payoneer', 'skrill'].includes(this.method)) {
                var atposition=this.account.indexOf("@");  
                var dotposition=this.account.lastIndexOf(".");  
                if (atposition<1 || dotposition<atposition+2 || dotposition+2>=this.account.length){  
                    let account = this.method === 'perfect-money' ? 'account number' : 'email'
                    this.accountError = 'Please enter your ' + this.method.replace('-', ' ')  + ' ' + account + ' you would like to withdraw on'
                    this.errorCount++
                }
            }
        },
        submit () {
            this.resetError()
            this.validate()
            
            if (this.errorCount === 0) {
                let height = parseInt(document.getElementById("withdraw-form").offsetHeight)
                let padding = (height - 40) / 2
                let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                document.getElementById("withdraw-from-loading").setAttribute("style", loadingStyle)

                let params = {
                    method: this.method,
                    amount: this.amount,
                    account: this.account,
                    currency: 'usd',
                    remark: this.remark
                }
                axios.post("/api/member/financial/withdraws", params)
                    .then(res => {
                        document.getElementById("withdraw-from-loading").setAttribute("style", "display: none");
                        if (res.status === 201) {
                            this.method = ''
                            this.amount = ''
                            this.account = ''
                            this.remark = ''
                            this.flash('Your withdraw request has been received and waiting for admin approval. Thank you', 'success')
                            EventBus.$emit('new-withdraw-request', res.data)
                        }
                    })
                    .catch(error => {
                        document.getElementById("withdraw-from-loading").setAttribute("style", "display: none");
                        if (error.response && error.response.status === 422) {
                            if (error.response.data && error.response.data.balance && error.response.data.balance.length > 0) {
                                this.amountError = error.response.data.balance[0];
                                this.errorCount++
                            }
                            
                            if (error.response.data.errors && error.response.data.errors.amount && error.response.data.errors.method.amount > 0) {
                                this.amountError = error.response.data.errors.amount[0];
                                this.errorCount++
                            }

                            if (error.response.data.errors && error.response.data.errors.method && error.response.data.errors.method.length > 0) {
                                this.methodError = error.response.data.errors.method[0];
                                this.errorCount++
                            }

                            if (error.response.data.errors && error.response.data.errors.account && error.response.data.errors.account.length > 0) {
                                this.accountError = error.response.data.errors.account[0];
                                this.errorCount++
                            }
                        }
                    })
            }
            
        }
    }
}
</script>