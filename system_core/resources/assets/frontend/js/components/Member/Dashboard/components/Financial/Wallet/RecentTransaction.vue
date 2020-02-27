<template>
    <div class="drop-shadow">
        <div class="row">
            <div class="col-md-12">
                <h2 class="font-weight-normal text-5 mb-4"><strong class="font-weight-extra-bold">recent </strong>transaction</h2>
                <table class="table text-center table-bordered" v-if="transactionPages.length > 0">
                    <thead class="thead-dark text-uppercase">
                        <tr>
                            <th>date</th>
                            <th scope="col">type</th>
                            <th scope="col">payment method</th>
                            <th scope="col">transaction id</th>
                            <th scope="col">description</th>
                            <th>amount in/out</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="transaction in transactionPages[0]" :key="transaction.id">
                            <td>{{ transaction.created_at | moment("llll") }}</td>
                            <td v-text="transaction.resource_type.split('\\')[transaction.resource_type.split('\\').length - 1]"></td>
                            <td style="text-align: left">
                                <payment-processor 
                                    v-if="transaction.resource_type.split('\\')[transaction.resource_type.split('\\').length - 1] === 'Subscription'" 
                                    :styling="none"
                                    :image="true" 
                                    :text="false" 
                                    data="wallet" />
                                <payment-processor 
                                    v-else 
                                    :styling="none"
                                    :image="true" 
                                    :text="false" 
                                    :data="transaction.meta.payment_method" />
                            </td>
                            <td>{{ transaction.transaction_id }}</td>
                            <td class="text-left" v-text="transaction.message.replace('App\\', '')"></td>
                            <td style="text-align: right">{{ transaction.type === 'credit' ? '+' : '-' }} {{ transaction.amount | currency }}</td>
                        </tr>
                        <tr v-if="transactionPages.length > 1">
                            <td colspan="6">
                                <RouterLink :to="{ name: 'transactions' }" style="background: #212529;color: #f8f5f8;display: block;padding: 5px 0;font-weight: 500;">
                                    Full Transition History
                                </RouterLink>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="alert alert-warning" role="alert" v-else v-html="fallbackMessage">
                No Transaction Found
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                transactions: {},
                transactionPages: {},
                fallbackMessage: 'Fetching transaction history from server <i class="fas fa-spinner fa-pulse"></i>',

                perPage: 10,
                pageCount: 1,
                currentPage: 0
            }
        },
        created () {
            console.log('transaction');
            axios.post('/api/member/financial/transactions', { 'type': 'recent' }
                )
                .then(response => {
                    if (response.data.length === 0) {
                        this.fallbackMessage = 'No transaction found'
                    }
                    this.transactions = response.data
                    this.transactionPages = _.chunk(this.transactions, this.perPage)
                    this.pageCount = this.transactionPages.length
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            setCurrentPage (page) {
                this.currentPage = page - 1
            }
        }
    }
</script>