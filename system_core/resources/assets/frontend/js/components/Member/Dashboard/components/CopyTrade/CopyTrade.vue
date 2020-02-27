<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <div class="drop-shadow">
            <notice />
            <subscription />

            <performance-graph />

            <faq />
        </div>
    </div>
</template>

<script>
import Notice from "./Notice";
import Subscription from "./Subscription";
import PerformanceGraph from "./PerformanceGraph";
import Faq from "./Faq";
export default {
    components: { Notice, Subscription, PerformanceGraph, Faq }
};
</script>
