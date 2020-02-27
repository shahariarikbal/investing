<template>
    <div class="card">
        <div class="card-header bg-white">
            Fund Management Monthly Trade Statement
            <RouterLink 
                class="btn btn-raised btn-success btn-sm float-right"
                :to="{ name: 'create-fund-management-monthly-trade-statement' }">
                create
            </RouterLink>
        </div>
        <div class="card-body card_block_top_align ">
            <div class="transaction-entry-field d-flex justify-content-between" style="margin-bottom: 10px">
                <div class="d-flex">
                    <div>
                        <span class="mr-1">Show</span>
                    </div>
                    <div>
                        <select class="form-control form-control-xs selectpicker" v-model="perPage">
                            <option value="5">5</option>
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

                <div class="d-flex justify-content-between">
                    <div class="d-flex"><span class="mr-1">Search:</span></div>
                    <div class="d-flex">
                        <select class="form-control" v-model="searchType">
                            <option value="status">Status</option>
                            <option value="member">Member</option>
                            <option value="month">Month</option>
                            <option value="plan">Plan</option>
                        </select>
                    </div>
                    <div class="d-flex">
                        
                        <select 
                            class="form-control"
                            style="width: 199px"
                            v-if="searchType==='status'" 
                            v-model="status">
                            <option value="" disabled>Select a status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        
                        <select 
                            class="form-control"
                            style="width: 199px"
                            v-if="searchType==='member'" 
                            v-model="member">
                            <option value="" disabled>Select a member</option>
                            <option v-for="member in members" :key="member.id" :value="member.id">{{ member.email }}</option>
                        </select>
                        
                        <select 
                            class="form-control"
                            style="width: 199px"
                            v-if="searchType==='month'" 
                            v-model="month">
                            <option value="" disabled>Select a status</option>
                            <option v-for="month in months" :key="month.month" :value="month">{{ month.month }}, {{ month.year }}</option>
                        </select>

                        <select 
                            class="form-control"
                            style="width: 199px"
                            v-if="searchType==='plan'" 
                            v-model="plan">
                            <option value="" disabled>Select a Plan</option>
                            <option v-for="plan in packages" :value="plan.id" :key="plan.id">{{ plan.name }} - {{ plan.duration }}@{{ plan.details[0].value }}</option>
                        </select>
                    </div>
                </div>
                
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Month</th>
                        <th>Package</th>
                        <th>Member</th>
                        <th>Profit</th>
                        <th>Growth (%)</th>
                        <th>Amount ($)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody v-if="statementPages.length > 0">
                    <tr 
                        
                        v-for="(statement, index) in statementPages[currentPage - 1]" 
                        :key="statement.id">
                        <td>{{ statement.id }}</td>
                        <td>{{ statement.month }}, {{ statement.year }}</td>
                        <td>{{ statement.package.name }} - {{ statement.package.duration }}@{{ statement.package.details[0].value }}</td>
                        <td>
                            <div class="row">
                            <div class="col-3">
                                <img :src="`${statement.member.avater_path}/50x50-${statement.member.avater}`" alt="">
                            </div>
                            <div class="col-9">
                                <b>Username: </b>{{ statement.member.username }}<br />
                                <b>Full Name: </b>{{ statement.member.full_name }}<br />
                                <b>Email: </b>{{ statement.member.email }}
                            </div>
                        </div>
                        </td>
                        <td>{{ statement.profit ? 'Profit' : 'Loss' }}</td>
                        <td class="text-right">{{ statement.growth.toFixed(2) }}</td>
                        <td class="text-right">{{ statement.amount | currency }}</td>
                        <td>
                            {{ statement.status ? 'Active' : 'Inactive' }}<br />
                            <span v-if="statement.is_notified" class="badge badge-pill badge-success">Notified</span>
                        </td>
                        <td>
                            <!-- <RouterLink 
                                class="btn btn-raised btn-info btn-sm"
                                :to="{ name: 'edit-fund-management-monthly-trade-statement', params: { id: statement.id } }">
                                Edit
                            </RouterLink> -->
                            <button v-if="statement.status === 0" class="btn btn-raised btn-primary btn-sm" @click="active(statement)">Active</button>
                            <button v-if="statement.status === 1" class="btn btn-raised btn-warning btn-sm" @click="inactive(statement)">Inactive</button>
                            <RouterLink 
                                class="btn btn-raised btn-success btn-sm"
                                :to="{ name: 'attachment-fund-management-monthly-trade-statement', params: { id: statement.id } }">
                                Attachment
                            </RouterLink>
                            <button v-if="statement.is_notified === 0" class="btn btn-raised btn-success btn-sm" @click="notify(statement)"><i class="fa fa-envelope-o"></i> Notify</button>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td colspan="9" class="alert alert-warning" role="alert">
                        {{ message }}
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

            <RouterView />
            
        </div>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                statements: [],
                statementPages: [],
                perPage: 10,
                pageCount: 1,
                currentPage: 1,
                message: 'Fetching Monthly Trading statement From The Server. Please Wait!',

                searchType: 'status',
                status: '',
                months: [],
                month: '',
                members: [],
                member: '',
                packages: [],
                plan: '',
            }
        },
        watch: {
            searchType (value) {
                this.setCurrentPage(1)
                this.generatePages(this.statements)
                this.user = ''
                this.status = ''
                this.month = ''
                this.plan = ''
            },
            perPage (value) {
                this.setCurrentPage(1)
                this.generatePages(this.statements)
            },
           
            status (value) {
                this.setCurrentPage(1)
                this.generatePages(this.statements)
                if (this.status != '') {
                    let newStatements = this.statements.filter(statement => {
                        return parseInt(statement.status) == parseInt(this.status)
                    })

                    this.generatePages(newStatements)
                }
            },
            month (value) {
                this.setCurrentPage(1)
                this.generatePages(this.statements)
                if (this.month != '') {
                    let newStatements = this.statements.filter(statement => {
                        return statement.month == this.month.month && statement.year == this.month.year
                    })

                    this.generatePages(newStatements)
                }
            },
            member (value) {
                this.setCurrentPage(1)
                this.generatePages(this.statements)
                if (this.member != '') {
                    let newStatements = this.statements.filter(statement => {
                        return statement.member.id == this.member
                    })

                    this.generatePages(newStatements)
                }
            },

            plan(value) {
                this.setCurrentPage(1)
                this.generatePages(this.statements)
                if (this.plan != '') {
                    let statements = this.statements.filter(statement => {
                        return statement.package_id === this.plan
                    })
                    
                    this.generatePages(statements)
                }
            }
        },
        created() {

            axios.get('/xhr/admin/monthly-trade-statement/package/fund-management')
                .then(response => {
                    this.packages = response.data
                })
                .catch(error => {
                    console.log(error)
                })

            axios.get('/xhr/admin/monthly-trade-statement/member/fund-management')
                .then(response => {
                    this.members = response.data.map(res => {
                        let member = {}
                        member.id = res.member.id
                        member.username = res.member.username
                        member.email = res.member.email
                        member.first_name = res.member.first_name
                        member.last_name = res.member.last_name
                        member.full_name = res.member.full_name
                        member.avater = res.member.avater

                        return member
                    })
                })
                .catch(error => {
                    console.log(error)
                })

            EventBus.$on('fund-management-monthly-trade-statement-update', payload => {
                console.log(payload)
                let index = this.statements.findIndex(statement => {
                    return statement.id === payload.id
                })
                this.statements[index] = payload

                this.generatePages(this.statements)
            })

            // EventBus.$on('new-fund-management-graph-inserted', payload => {
            //     this.graphs.unshift(payload)

            //     this.generatePages(this.graphs)
            // })

            axios.get('/xhr/admin/monthly-trade-statement/fund-management')
                .then(response => {
                    this.statements = response.data

                    this.statements.map(statement => {
                        let month = {}
                        let index
                        // if (this.months.length > 0) {
                        index = this.months.findIndex(m => {
                            return m.month === statement.month && m.year === statement.year
                        })
                        
                        if (index === -1) {
                            month.month = statement.month
                            month.year = statement.year
                            this.months.push(month)
                        }

                    })

                    this.generatePages(this.statements)

                    if (this.statements.length === 0) {
                        this.message = 'Sorry! No Statement Found.'
                    }
                })
                .catch(error => {
                    console.log(error)
                })

                EventBus.$on('new-fund-management-monthly-trade-statement-inserted', payload => {
                    this.statements.unshift(payload)

                    this.generatePages(this.statements)
                })
                EventBus.$on('fund-management-monthly-trade-update', payload => {
                let index = this.statements.findIndex(statement => {
                    return statement.id === payload.id
                })
                this.statements[index] = payload

                this.generatePages(this.statements)
            })
        },
        methods: {
            setCurrentPage (page) {
                this.currentPage = page
            },
            generatePages (statements) {
                this.statementPages = _.chunk(statements, this.perPage)
              
                this.pageCount = 0
                this.pageCount = this.statementPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No Statement Found"
                }
            },

            active (statement) {
                axios.post('/admin/monthly-trade-statement/' + statement.id +'/active')
                    .then(response => {
                        if (response.status === 200) {
                            this.statements = this.statements.map(g => {
                                if (g.id === statement.id) {
                                    g.status = 1
                                }
                                return g
                            })
                            this.generatePages(this.statements)

                            this.flash('Statement active successfully!', 'success');
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            inactive (statement) {
                axios.post('/admin/monthly-trade-statement/' + statement.id +'/inactive')
                    .then(response => {
                        if (response.status === 200) {
                            this.statements = this.statements.map(g => {
                                if (g.id === statement.id) {
                                    g.status = 0
                                }
                                return g
                            })
                            this.generatePages(this.statements)

                            this.flash('Statement inactive successfully!', 'success');
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            notify (statement) {
                axios.post('/admin/monthly-trade-statement/' + statement.id + '/notify')
                    .then(response => {
                        if (response.status === 200) {
                            response.data.id
                            let index = this.statements.findIndex(statement => {
                                return statement.id === response.data.id
                            })
                            this.statements[index] = response.data

                            this.generatePages(this.statements)

                            this.flash('Monthly trade statement has been notified to its recepients!', 'success');
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
            
        }
    }
</script>