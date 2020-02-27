<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <div class="drop-shadow">
            <summery />

            <subscription />

            <div class="row">
                <performance-graph />

                <shout-box />
            </div>

            <monthly-trade-statement />
        </div>
    </div>
</template>

<script>
import Summery from "./Summery";
import Subscription from "./Subscription";
import PerformanceGraph from "./PerformanceGraph";
import ShoutBox from "./ShoutBox";
import MonthlyTradeStatement from "./MonthlyTradeStatement";
export default {
    components: {
        Summery,
        Subscription,
        PerformanceGraph,
        ShoutBox,
        MonthlyTradeStatement
    }
};
</script>
