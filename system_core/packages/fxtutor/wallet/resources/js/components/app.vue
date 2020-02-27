<template>
    <div class="finances">
        <div class="nesting-navbar bg-theme">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <RouterLink
                                        class="nav-link"
                                        :to="{name: 'financial-dash'}"
                                    >
                                        Finances new
                                    </RouterLink>
                                </li>
                                <li class="nav-item">
                                    <RouterLink
                                        class="nav-link"
                                        :to="{name: 'transactions'}"
                                    >
                                        Transaction History
                                    </RouterLink>
                                </li>
                                <li class="nav-item">
                                    <RouterLink
                                        class="nav-link"
                                        :to="{name: 'verify'}"
                                    >
                                        Verify Payment Method
                                    </RouterLink>
                                </li>
                                <li class="nav-item">
                                    <RouterLink
                                        class="nav-link"
                                        :to="{name: 'deposit'}"
                                    >
                                        Deposit Funds
                                    </RouterLink>
                                </li>
                                <li class="nav-item">
                                    <RouterLink
                                        class="nav-link"
                                        :to="{name: 'withdraw'}"
                                    >
                                        Withdraw Money
                                    </RouterLink>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-12">
                    <RouterView />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    created () {

    },
    methods: {
    }
}
</script>
