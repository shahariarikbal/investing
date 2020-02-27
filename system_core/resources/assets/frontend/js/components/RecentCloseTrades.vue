<template>
    <div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="text-center">
                <tr>
                    <th>Currency</th> 
                    <th>Signal</th> 
                    <th>Profit/Loss</th> 
                    <th class="d-none d-sm-none d-md-block">Time</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr v-for="signal in signalData" :key="signal.id">

                    <td><span class="mr-2" v-html="signal.currency_icon"></span>{{ signal.currency_name }}</td>

                    <td>{{ signal.signal_type_display }}</td>

                    <td class="font-weight-bold" :class="{ 'text-success pips-gain' : signal.is_profit, 'text-danger pips-loss' : !signal.is_profit }">{{ signal.pips }} Pips</td>

                    <td>{{ signal.filled }}</td>

                </tr>
            </tbody>
        </table>
    </div>
    </div>
</template>

<script>
    export default {
        props: {
            signals: {
                type: Array,
                required: true
            }
        },
        data() {
            return {
                signalData: this.signals
            }
        },
    }
</script>

<style>
    .pips-loss::before {
    content: "-"
    }

    .pips-gain::before {
    content: "+";
    }
</style>