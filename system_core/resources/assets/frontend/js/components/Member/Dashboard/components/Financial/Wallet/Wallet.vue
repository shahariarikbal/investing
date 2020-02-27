<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <balance />

        <recent-transaction />
    </div>
</template>

<script>
import Balance from "./Balance.vue";
import RecentTransaction from "./RecentTransaction";

export default {
    components: { Balance, RecentTransaction }
};
</script>

<style lang="scss">
.flip-cards .card-front {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    background-color: #636262;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    line-height: 35px;
    font-weight: 600;
    letter-spacing: 1px;
    border-radius: 5px;
    color: #fff;
    padding: 1rem;
    box-shadow: 0px 1px 7px 0px rgba(170, 170, 170, 0.95);
}

.balance-sheet {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin-top: 2rem;
    margin-bottom: 2rem;
}
</style>
