<template>
    <div class="modal fade" id="transaction-modal" role="dialog" aria-labelledby="transactionModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-white" id="transactionModalLabel">Transaction Details</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Serial</td>
                                <td>Balance Type</td>
                                <td>Action</td>
                                <td>Invoice</td>
                                <td>Balance</td>
                                <td>Type</td>
                                <td>Payment Method</td>
                                <td>Transaction Id</td>
                                <td>Created</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="transaction in transactions" :key="transaction.id">
                                <td>{{ transaction.id }}</td>
                                <td>{{ transaction.balance_type }}</td>
                                <td>{{ transaction.action }}</td>
                                <td>{{ transaction.invoice }}</td>
                                <td>{{ transaction.balance }}</td>
                                <td>{{ transaction.type }}</td>
                                <td>{{ transaction.meta.payment_method }}</td>
                                <td>{{ transaction.transaction_id}}</td>
                                <td>{{ transaction.created_at | moment('llll') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn  btn-primary" data-dismiss="modal">Close me!</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'transactions' ],
        data () {
            return {

            }
        }
    }
</script>