<template>
    <div class="drop-shadow mb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="flip-cards">
                    <div class="card-front">
                        <div class="text-6">{{ account.deposit | currency }}</div>
                        <div class="text-uppercase">Total</div>
                        <div class="text-uppercase" style="line-height: 1">Deposit</div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="flip-cards">
                    <div class="card-front">
                        <div class="text-6">{{ account.widhdraw | currency }}</div>
                        <div class="text-uppercase">Total</div>
                        <div class="text-uppercase" style="line-height: 1">Withdraw</div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="flip-cards">
                    <div class="card-front">
                        <div class="text-6">{{ account.affiliate | currency }}</div>
                        <div class="text-uppercase">total affiliate </div>
                        <div class="text-uppercase" style="line-height: 1">commision</div>
                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <div class="balance-sheet">
                    <div>
                        <span><strong class="mr-2">CURRENT BALANCE:</strong> {{ account.wallet.balance | currency }}</span>
                    </div>
                    <div>
                        <span><strong class="mr-2">TOTAL PURCHASE:</strong> {{ account.purchase | currency }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                account: {
                    wallet: {
                        balance: 0
                    },
                    deposit: 0,
                    withdraw: 0,
                    affiliate: 0,
                    purchase: 0,
                },
            }
        },
        created () {
            axios.post('/api/member/financial/wallet/balance')
                .then(response => {
                    this.account = response.data
                })
                .catch(error => {
                    console.log(error)
                })

            axios.get('/api/member/affiliate/transections')
                .then(res=> {
                    this.account.affiliate = res.data.total_earn
                })
        }
    }
</script>