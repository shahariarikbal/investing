<template>
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header bg-white">
                Withdraw
            </div>
            <div class="card-body card_block_top_align ">
                <ul class="nav nav-tabs" id="withdrawTab" role="tablist">
                    <li class="nav-item">
                        <RouterLink 
                            class="nav-link"
                            id="pending-withdraw-tab" 
                            data-toggle="tab" 
                            href="#pending-withdraw" 
                            role="tab" 
                            aria-controls="pending-withdraw" 
                            aria-selected="false"
                            :to="{ name: 'pending-withdraw' }">
                            Pending
                        </RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink 
                            class="nav-link"
                            id="approved-withdraw-tab" 
                            data-toggle="tab" 
                            href="#approved-withdraw" 
                            role="tab" 
                            aria-controls="approved-withdraw" 
                            aria-selected="false"
                            :to="{ name: 'approved-withdraw' }">
                            Approved
                        </RouterLink>
                    </li>
                    <li class="nav-item">
                        <RouterLink 
                            class="nav-link"
                            id="canceled-withdraw-tab" 
                            data-toggle="tab" 
                            href="#canceled-withdraw" 
                            role="tab" 
                            aria-controls="canceled-withdraw" 
                            aria-selected="false"
                            :to="{ name: 'canceled-withdraw' }">
                            Canceled
                        </RouterLink>
                    </li>
                </ul>
                
                <div class="tab-content" id="withdrawTabContent">
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
                //withdraws: [],
            }
        },
        mounted() {
            // console.log('withdraw')
        },
        computed: {
            
        },
        
        methods: {
            
        }
    }
</script>
