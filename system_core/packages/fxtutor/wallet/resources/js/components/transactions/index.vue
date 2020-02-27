<template>
    <div class="transaction-history">
        <div class="row">
            <div class="col-md-12">
                <div class="trans-title">
                    <h3>Transaction History</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <RouterLink
                                    :to="{name: 'transactions'}"
                                    class="btn btn-info"
                                >
                                    Transactions
                                </RouterLink>
                            </li>
                            <li class="nav-item">
                                <RouterLink
                                    :to="{name: 'milestone-history'}"
                                    class="btn btn-info"
                                >
                                    Milestones
                                </RouterLink>
                            </li>
                            <li class="nav-item">
                                <RouterLink
                                    :to="{name: 'pending-funds-history'}"
                                    class="btn btn-info"
                                >
                                    Pending Funds
                                </RouterLink>
                            </li>
                            <li class="nav-item">
                                <RouterLink
                                    :to="{name: 'invoices-history'}"
                                    class="btn btn-info"
                                >
                                    Invoices
                                </RouterLink>
                            </li>
                            <li class="nav-item">
                                <RouterLink
                                    :to="{name: 'deposit-history'}"
                                    class="btn btn-info"
                                >
                                    Deposit
                                </RouterLink>
                            </li>
                            <li class="nav-item">
                                <RouterLink
                                    :to="{name: 'withdraw-history'}"
                                    class="btn btn-info"
                                >
                                    Withdraw
                                </RouterLink>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="inner">
                            <KeepAlive>
                                <RouterView />
                            </KeepAlive>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    components: {

    },
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
