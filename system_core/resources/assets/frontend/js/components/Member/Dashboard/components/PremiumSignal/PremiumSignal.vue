<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <div class="drop-shadow">
            <notice />
            
            <subscription />

            <active-signals />

            <div class="row ">
                <performance-graph />
                <signal-distribution-chart />
            </div>

            <monthly-trade-statement />
        </div>
    </div>
</template>

<script>
    import Notice from './Notice'
    import Subscription from './Subscription'
    import ActiveSignals from './ActiveSignal'
    import PerformanceGraph from './PerformanceGraph'
    import SignalDistributionChart from './SignalDistributionChart'
    import MonthlyTradeStatement from './MonthlyTradeStatement'

    export default {
        components: { Notice, Subscription, ActiveSignals, PerformanceGraph, SignalDistributionChart, MonthlyTradeStatement }
    }
</script>
<style scoped>
.timezone-style a {
         
                background: #212529;
                color: #fff;
                padding: 5px 7px;
                display: inline-block!important;
                margin-bottom: 5px;
                margin-top: 5px;
                border-radius: 4px;
           
    }
</style>
