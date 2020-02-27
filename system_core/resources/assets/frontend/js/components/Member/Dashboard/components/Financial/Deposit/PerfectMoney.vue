<template>
    <div class="col-md-6 selected-payment-box">
        <div class="flex flex-column neteller-wrapper selected-box">
            <b>Deposit Amount :</b> {{ this.total }} <br />
            <b>Processing Fee :</b> {{ this.process_fee }} <br />
        </div>
    </div>
</template>

<script>
    export default {
        props: ['process_fee','total']
    }
</script>