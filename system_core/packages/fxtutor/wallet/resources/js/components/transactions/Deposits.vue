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
                <div class="filtering-area">
                    <div>
                        <div class="form-inline">
                            <div class="form-group mr-2">
                                <label
                                    for="showNumber"
                                    class="mr-2"
                                >Show</label>
                                <select
                                    class="form-control form-control-sm"
                                    @change="changeShowCount"
                                >
                                    <option value="10">
                                        10
                                    </option>
                                    <option value="20">
                                        20
                                    </option>
                                    <option value="30">
                                        30
                                    </option>
                                </select>
                            </div>
                            <div class="form-group mr-2">
                                <label
                                    for="showNumber"
                                    class="mr-2"
                                >Status</label>
                                <select
                                    v-model="status"
                                    class="form-control form-control-sm"
                                    @change="getDepositHistory()"
                                >
                                    <option value="">
                                        All
                                    </option>
                                    <option value="1">
                                        unapproved
                                    </option>
                                    <option value="2">
                                        approved
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
                <div class="table-area">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">
                                        Date
                                    </th>
                                    <th scope="col">
                                        Method
                                    </th>
                                    <th>Currency</th>
                                    <th scope="col">
                                        Process Fee
                                    </th>
                                    <th>tax</th>
                                    <th scope="col">
                                        Amount
                                    </th>
                                    <th scope="col">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="d in deposits"
                                    :key="d.id"
                                >
                                    <td>
                                        {{ momentDate(d.created_at) }}
                                    </td>
                                    <td> {{ getMethodName(d.method) }} </td>
                                    <td> {{ d.currency.toUpperCase() }} </td>
                                    <td> {{ d.process_fee }} </td>
                                    <td> {{ d.tax }} </td>
                                    <td>{{ d.amount }}</td>
                                    <td>{{ d.total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <Pagination
                    v-model="currentPage"
                    :meta="meta"
                />
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from './Pagination.vue'
export default {
    components: {
        Pagination
    },
    data () {
        return {
            deposits: [],
            status: 2,
            showCount: 10,
            meta: {},
            currentPage: 1
        }
    },
    watch: {
        currentPage (value) {
            this.getDepositHistory()
        }
    },
    created () {
        this.getDepositHistory()
    },
    methods: {
        getMethodName (method) {
            var m = method.split('\\')
            m = m[m.length - 1]
            return _.startCase(m)
        },
        changeShowCount (event) {
            this.showCount = parseInt(event.target.value, 10)
            this.getDepositHistory()
        },
        getDepositHistory (page) {
            let params = {
                page: this.currentPage,
                count: this.showCount,
                status: this.status
            }
            axios.get('/dashboard/wallet/reportes/deposit-history', { params })
                .then(response => {
                    this.deposits = response.data.data
                    this.meta = response.data.meta
                })
        }
    }
}
</script>
