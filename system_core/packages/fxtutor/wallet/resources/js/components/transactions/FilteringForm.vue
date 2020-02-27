<template>
    <div class="filtering-area">
        <div>
            <div class="form-inline">
                <div class="form-group mr-2">
                    <label
                        for="showNumber"
                        class="mr-2"
                    >Show</label>
                    <input
                        id=""
                        v-model="showCount"
                        type="number"
                        name="showCount"
                        min="10"
                        max="100"
                        step="5"
                    >
                </div>
                <div class="form-group mr-2">
                    <label
                        for="showNumber"
                        class="mr-2"
                    >Filter</label>
                    <select class="form-control form-control-sm">
                        <option value="">
                            All
                        </option>
                        <option value="">
                            Fee
                        </option>
                        <option value="">
                            Amount
                        </option>
                    </select>
                </div>
                <div class="form-group mr-2">
                    <label
                        for="showNumber"
                        class="mr-2"
                    >Currency</label>
                    <select class="form-control form-control-sm">
                        <option value="">
                            USD
                        </option>
                        <option value="">
                            EURO
                        </option>
                        <option value="">
                            TAKA
                        </option>
                    </select>
                </div>
            </div>
        </div>
        <div>
            <div class="download-area">
                <ul>
                    <li><a href="javascript:void(0)">PDF</a></li>
                    <li><a href="javascript:void(0)">CSV</a></li>
                    <li>
                        <a
                            data-toggle="collapse"
                            href="#ExportCollapse"
                            role="button"
                            aria-expanded="false"
                            aria-controls="ExportCollapse"
                        >Export</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            showCount: 10
        }
    },
    computed: {

    },
    created () {

    },
    methods: {

    }
}
</script>
