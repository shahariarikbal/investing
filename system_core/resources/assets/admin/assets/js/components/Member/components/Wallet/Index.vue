<template>
    <div class="tab-pane fade show active" id="pills-wallet" role="tabpanel" aria-labelledby="pills-wallet-tab">
        <div class="row">
            <div class="col-3" style="border-right: 1px solid #aaa;">
                <div class="nav flex-column nav-pills" id="individual-member-wallet-tab" role="tablist" aria-orientation="vertical">
                    <RouterLink 
                        class="nav-link"
                        id="pills-wallet-balance-tab" 
                        data-toggle="pill" 
                        href="#pills-wallet-balance" 
                        role="tab" 
                        aria-controls="pills-wallet-balance" 
                        aria-selected="true"
                        :to="{ name: 'member-wallet-balance' }">
                        Balance
                    </RouterLink>
                    <RouterLink 
                        class="nav-link"
                        id="pills-wallet-deposit-tab" 
                        data-toggle="pill" 
                        href="#pills-wallet-deposit" 
                        role="tab" 
                        aria-controls="pills-wallet-deposit" 
                        aria-selected="true"
                        :to="{ name: 'member-wallet-deposit' }">
                        Deposit
                    </RouterLink>
                    <RouterLink 
                        class="nav-link"
                        id="pills-wallet-withdraw-tab" 
                        data-toggle="pill" 
                        href="#pills-wallet-withdraw" 
                        role="tab" 
                        aria-controls="pills-wallet-withdraw" 
                        aria-selected="true"
                        :to="{ name: 'member-wallet-withdraw' }">
                        Withdraw
                    </RouterLink>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="individual-member-wallet-tabContent">
                    <RouterView />
                </div>
            </div>
        </div>
    </div>
</template>