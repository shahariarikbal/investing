<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <div class="drop-shadow pb-0">
            <counter />
            <div class="row">
                <div class="col-md-12 mb-3">
                    <subscriptions />
                </div>
                <!-- <div class="col-lg-6">
                    <invoices />
                </div> -->
                <!-- <div class="col-lg-6">
                    <support-tickets />
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
    import Counter from './Counter'
    import Subscriptions from './Subscriptions'
    import Invoices from './Invoices'
    import SupportTickets from './SuppportTickets'

    export default {
        components: { Counter, Subscriptions, Invoices, SupportTickets }
    }
</script>