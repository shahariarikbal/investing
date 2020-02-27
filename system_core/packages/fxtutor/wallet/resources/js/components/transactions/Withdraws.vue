<template>
    <div class="deposits">
        <div class="row">
            <div class="col-md-12">
                <div class="collapsable-area">
                    <div
                        id="ExportCollapse"
                        class="collapse"
                    >
                        <div class="card card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="collapseFiltering">
                                        <div class="daterange">
                                            <div class="title">
                                                <label>Date Range </label>
                                            </div>
                                            <div class="daterange-field">
                                                <div>
                                                    <input
                                                        id="dateRange1"
                                                        type="date"
                                                        class="form-control"
                                                    >
                                                </div>
                                                <div>
                                                    <label>To</label>
                                                </div>
                                                <div>
                                                    <input
                                                        id="dateRange2"
                                                        type="date"
                                                        class="form-control"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="format">
                                            <div>
                                                <label>Format</label>
                                            </div>
                                            <div>
                                                <select class="form-control">
                                                    <option value="">
                                                        10
                                                    </option>
                                                    <option value="">
                                                        20
                                                    </option>
                                                    <option value="">
                                                        30
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="export-btn">
                                        <button class="btn bg-theme text-white">
                                            Export
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <FilteringForm />
                <TransactionTable />
                <div class="pagination-wrapper">
                    <div>
                        <span>Showing 0 to 0 of 0 entries</span>
                    </div>
                    <div>
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a
                                    class="page-link"
                                    href="#"
                                    tabindex="-1"
                                    aria-disabled="true"
                                >Previous</a>
                            </li>
                            <li class="page-item">
                                <a
                                    class="page-link"
                                    href="#"
                                >1</a>
                            </li>
                            <li class="page-item">
                                <a
                                    class="page-link"
                                    href="#"
                                >2</a>
                            </li>
                            <li class="page-item">
                                <a
                                    class="page-link"
                                    href="#"
                                >3</a>
                            </li>
                            <li class="page-item">
                                <a
                                    class="page-link"
                                    href="#"
                                >Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import FilteringForm from './FilteringForm.vue'
import TransactionTable from './TransactionTable.vue'

export default {
    components: {
        FilteringForm,
        TransactionTable
    },
    data () {
        return {

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
