<template>
    <div class="modal fade show" style="display: block" id="create-copytrade-performance-graph-modal" role="dialog" aria-labelledby="create-copytrade-performance-graph-modal">
        
        <div class="modal-dialog modal-xl" style="position: relative;" id="create-copytrade-performance-graph-modal-dialog" role="document">
            <div id="loading" style="display: none">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Member Details</h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-3" style="border-bottom: 1px solid #aaa;" id="individual-member-tab" role="tablist">
                        <li class="nav-item">
                            <RouterLink 
                                class="nav-link"
                                id="pills-profile-tab" 
                                data-toggle="pill" 
                                href="#pills-profile" 
                                role="tab" 
                                aria-controls="pills-profile" 
                                aria-selected="true"
                                :to="{ name: 'member-profile' }">
                                Profile
                            </RouterLink>
                        </li>
                        <li class="nav-item">
                            <RouterLink 
                                class="nav-link"
                                id="pills-subscription-tab" 
                                data-toggle="pill" 
                                href="#pills-subscription" 
                                role="tab" 
                                aria-controls="pills-subscription" 
                                aria-selected="true"
                                :to="{ name: 'member-subscription' }">
                                Subscription
                            </RouterLink>
                        </li>
                        <li class="nav-item">
                            <RouterLink 
                                class="nav-link"
                                id="pills-wallet-tab" 
                                data-toggle="pill" 
                                href="#pills-wallet" 
                                role="tab" 
                                aria-controls="pills-wallet" 
                                aria-selected="true"
                                :to="{ name: 'member-wallet' }">
                                Wallet
                            </RouterLink>
                        </li>
                        <li class="nav-item">
                            <RouterLink 
                                class="nav-link"
                                id="pills-transaction-tab" 
                                data-toggle="pill" 
                                href="#pills-transaction" 
                                role="tab" 
                                aria-controls="pills-transaction" 
                                aria-selected="true"
                                :to="{ name: 'member-transaction' }">
                                Transaction
                            </RouterLink>
                        </li>
                    </ul>
                    <div class="tab-content" id="individual-member-tabContent">
                        <RouterView />
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-danger" data-dismiss="modal" @click="close">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                
            }
        },
        created() {
            
        },
        computed: {
            
        },
        methods: {
            close () {
                this.$router.push({ name: 'members' })
            },
        }
    }
</script>

<style lang="scss">
    .router-link-active {
        color: #fff;
        background-color: #00c0ef;
    }
</style>