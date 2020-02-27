<template>
    <div class="card">
        <div class="card-header bg-white">
            Signal Subscriptions <br/>
        </div>
        <div class="card-body card_block_top_align ">
            <ul class="nav nav-tabs" id="depositTab" role="tablist">
                    <li class="nav-item">
                        <RouterLink 
                            class="nav-link"
                            id="pending-deposit-tab" 
                            data-toggle="tab" 
                            href="#pending-deposit" 
                            role="tab" 
                            aria-controls="pending-deposit" 
                            aria-selected="false"
                            :to="{ name: 'all-signal-subscription' }">
                            All Subscription
                        </RouterLink>
                    </li>
                </ul>
            
                
            <div class="tab-content" id="depositTabContent">
                <RouterView />
                <!-- <div class="tab-pane fade show active" id="pending-deposit" role="tabpanel" aria-labelledby="pending-deposit-tab">...</div>
                <div class="tab-pane fade" id="approved-deposit" role="tabpanel" aria-labelledby="approved-deposit-tab">...</div>
                <div class="tab-pane fade" id="canceled-deposit" role="tabpanel" aria-labelledby="canceled-deposit-tab">...</div> -->
            </div>
        </div>
    </div>
</template>

<script>
    import TransactionScreenshotModal from './Modal/TransactionScreenshotModal'
    import ApproveDepositModal from './Modal/ApproveDepositModal'
    import CancelDepositModal from './Modal/CancelDepositModal'

    export default {
        data () {
            return {
                deposits: [],
                screenshot: '',
            }
        },
        components: { TransactionScreenshotModal, ApproveDepositModal, CancelDepositModal },

        created() {
            axios.get('/xhr/admin/wallet/deposit/approved')
                .then(response => {
                    this.deposits = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            setScreenshot(screenshot) {
                this.screenshot = screenshot
            },
        }
    }
</script>