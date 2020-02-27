<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <div class="drop-shadow">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="font-weight-normal text-5 mb-4">Invoices</h2>

                    <div class="transaction-entry-field d-flex justify-content-between" style="margin-bottom: 10px">
                        <div class="d-flex">
                            <div>
                                <span class="mr-1">Show</span>
                            </div>
                            <div>
                                <select class="form-control form-control-xs selectpicker" v-model="perPage">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="75">75</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div>
                                <span class="ml-1">entries</span>
                            </div>
                        </div>
                        <!-- <div class="d-flex justify-content-between">
                            <div class="d-flex"><span class="mr-1">Search:</span></div>
                            <div class="d-flex">
                                <select class="form-control" v-model="searchType">
                                    <option value="">Type</option>
                                    <option value="payment_method">Payment Method</option>
                                    <option value="transaction_id">Transaction ID</option>
                                    <option value="amount">Amount</option>
                                    <option value="date">Date</option>
                                </select>
                            </div>
                            <div class="d-flex"> -->
                                <!-- <select 
                                    class="form-control"
                                    style="width: 199px"
                                    v-if="searchType==='type'" 
                                    v-model="type">
                                    <option value="">Select a type</option>
                                    <option value="subscription">Subscription</option>
                                    <option value="deposit">Deposit</option>
                                    <option value="withdraw">withdraw</option>
                                    <option value="transfer">Transfer</option>
                                </select>
                                
                                
                                <select 
                                    class="form-control"
                                    style="width: 199px"
                                    v-if="searchType==='payment_method'" 
                                    v-model="paymentMethod">
                                    <option value="">Select a payment method</option>
                                    <option value="paypal">Paypal</option>
                                    <option value="perfect-money">Perfect Money</option>
                                    <option value="neteller">Neteller</option>
                                    <option value="skrill">Skrill</option>
                                    <option value="bitcoin">Bitcoin</option>
                                </select>
                                
                                <input type="text" class="form-control" 
                                    v-if="searchType==='transaction_id' || searchType==='amount'" 
                                    v-model="search"
                                    :placeholder="searchPlaceholder">

                                <date-range-picker
                                    v-if="searchType==='date'"
                                    v-model="dateRange"
                                    opens="left"
                                    :linked-calendars="true"
                                    :showWeekNumbers="true"
                                    :showDropdowns="true"
                                    :autoApply="true"
                                    @update="searchWithDateRange"
                                ></date-range-picker> -->
                            <!-- </div>
                        </div> -->
                    </div>

                    <table class="table text-center table-bordered" v-if="invoices.length">
                        <thead class="thead-dark text-uppercase">
                            <tr>
                                <th>Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Due Data</th>
                                <th scope="col">Service</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                         <!-- v-text="transaction.meta.payment_method.toUpperCase()" -->
                        <tbody>
                            <tr v-for="invoice in invoicePages[currentPage - 1]" :key="invoice.id">
                                <td>{{invoice.name}}</td>
                                <td>{{invoice.status}}</td>
                                <td>{{invoice.total_price | currency}}</td>
                                <td>{{invoice.due_date | moment('llll')}}</td>
                                <td class="text-left">
                                    <namespace-to-class-name :namespace="invoice.items[0].service" />
                                 </td>
                                <td>
                                    <a :href="`/member/financial/invoices/${invoice.id}/download`" download  >Download</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div
                        class="alert alert-warning"
                        role="alert"
                        v-else
                        v-html="fallbackMessage"
                    ></div>

                    <paginate
                        v-if="pageCount > 1"
                        v-model="currentPage"
                        :page-count="pageCount"
                        :prev-text="'Prev'"
                        :next-text="'Next'"
                        :container-class="'pagination justify-content-center'"
                    >
                    </paginate>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import NamespaceToClassName from '@p/NamespaceToClassName'

export default {
    data () {
        return {
            perPage: 10,
            pageCount: 1,
            currentPage: 1,
            searchType: '',
            invoices: [],
            invoicePages: '',
            fallbackMessage: 'Fetching invoices from server <i class="fas fa-spinner fa-pulse"></i>'
        }
    },
    components: { NamespaceToClassName },
    watch: {
        perPage(value) {
            this.perPage = parseInt(this.perPage);

            this.setCurrentPage(1);
            this.generatePages(this.invoices);
        }
    },
    created () {
        this.getInvoices();
    },
    computed: {

    },
    methods: {
        getInvoices () {
            axios.get('/api/member/financial/invoices')
                .then(response => {
                    this.invoices = response.data
                    this.generatePages(this.invoices)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        setCurrentPage(page) {
            this.currentPage = page;
        },
        generatePages(invoices) {
            this.setCurrentPage(1);
            this.invoicePages = _.chunk(invoices, this.perPage);
            this.pageCount = this.invoicePages.length;
            if (this.pageCount === 0) {
                this.fallbackMessage = "No invoice found";
            }
        },
    }
}
</script>