<template>
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header bg-white">
                Deposits
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
                            :to="{ name: 'pending-deposit' }">
                            Pending
                        </RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink 
                            class="nav-link"
                            id="approved-deposit-tab" 
                            data-toggle="tab" 
                            href="#approved-deposit" 
                            role="tab" 
                            aria-controls="approved-deposit" 
                            aria-selected="false"
                            :to="{ name: 'approved-deposit' }">
                            Approved
                        </RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink 
                            class="nav-link"
                            id="canceled-deposit-tab" 
                            data-toggle="tab" 
                            href="#canceled-deposit" 
                            role="tab" 
                            aria-controls="canceled-deposit" 
                            aria-selected="false"
                            :to="{ name: 'canceled-deposit' }">
                            Canceled
                        </RouterLink>
                    </li>
                </ul>
                
                <div class="tab-content" id="depositTabContent">
                    <RouterView />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                //deposits: [],
            }
        },
        mounted() {
            // console.log('deposit')
        },
        computed: {
            
        },
        
        methods: {
            
        }
    }
</script>
