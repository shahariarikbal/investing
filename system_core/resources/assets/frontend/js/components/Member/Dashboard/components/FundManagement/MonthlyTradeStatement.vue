<template>
    <div class="row">
        <div class="col-md-12">
            <div class="title-container d-flex justify-content-between">
                <h2 class="forex-header-second" style="font-size: 18px;"><span>monthly trade statement</span></h2>
                <select class="form-control" style="width: auto" v-model="plan">
                    <option v-for="subscription in subscriptions" :value="subscription.plan.id" :key="subscription.id">{{ subscription.plan.name }}</option>
                </select>
            </div>
        </div>
        <template v-if="displayStatement">
            <div class="col-md-12">
                <span class="float-right badge badge-info p-2" style="font-size: 0.8rem;">Gained: {{ statements[0].profit ? '+' : '-' }} <span>{{ statements[0].amount | currency }}</span> (in {{ statements[0].month }} {{ statements[0].year }})</span>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-hover">
                        <thead style="background: #6c757d;color:#fff;font-weight:300;">
                            <tr>
                                <th scope="col">Date, Time</th>
                                <th scope="col">Month</th>
                                <th scope="col">Profit in Dollars ($) </th>
                                <th scope="col">Growth</th>
                                <th scope="col">Statement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="statement in statementPages[currentPage - 1]" :key="statement.id">
                                <td>{{ statement.date | moment('llll') }}</td>
                                <td>
                                    <span>{{ statement.month }}-{{ statement.year }}</span>
                                </td>
                                <td>{{ statement.amount | currency }}</td>
                                <td>{{ statement.growth }}%</td>
                                <td>
                                    <a target="_blank" class="btn btn-default custom-btn" @click="setAttachment(statement.attachment)">
                                        <span style="top: 0; right: 0; left: 0">Check Statement</span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <paginate
                        v-if="pageCount > 1"
                        :page-count="pageCount"
                        v-model="currentPage"
                        :prev-text="'Prev'"
                        :next-text="'Next'"
                        :container-class="'pagination justify-content-center'"
                        >
                    </paginate>
                </div>
            </div>
        </template>
        
        <div v-else class="col-md-12">
            <div class="alert alert-warning" role="alert">No trade statement found</div>
        </div>
        <statement-modal 
            v-if="displayAttachment"
            :attachment="attachment" />
    </div>
</template>

<script>
    import StatementModal from './StatementModal'

    export default {
        data () {
            return {
                subscriptions: [],
                plan: '',
                statements: [],
                statementPages: [],
                fallbackMessage: 'Fetching transaction history from server <i class="fas fa-spinner fa-pulse"></i>',

                perPage: 6,
                pageCount: 1,
                currentPage: 1,
                displayStatement: false,

                displayAttachment: false,
                attachment: ''
            }
        },
        components: { StatementModal },
        created () {
            EventBus.$on('fund-management-subscriptions', payload => {
                this.subscriptions = payload
                this.plan = this.subscriptions[0].plan.id
                this.getMonthlyTradeStatement(this.plan)
            })

            EventBus.$on('statementModalDisplay', payload => {
                this.displayAttachment = false
                if (payload === true) {
                    this.displayAttachment = true
                }
            })
            
        },
        watch: {
            plan (value) {
                this.getMonthlyTradeStatement(this.plan)
            }
        },
        methods: {
            setCurrentPage (page) {
                this.currentPage = page
            },
            getMonthlyTradeStatement (plan) {
                axios.post('/api/member/fund-management/monthly-trade-statement', { package_id: plan })
                    .then(response => {
                        if (response.status === 200) {
                            this.statements = response.data
                            this.statementPages = _.chunk(this.statements, this.perPage)
                            this.pageCount = this.statementPages.length
                            
                            this.displayStatement = false
                            if (this.statements.length > 0) {
                                this.displayStatement = true
                            }
                        }
                    })
                    .catch(error => {

                    })
            },
            setAttachment (attachment) {
                this.attachment = attachment
                this.displayAttachment = true
            }
        }
    }
</script>