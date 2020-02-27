<template>
    <div class="card">
        <div class="card-header bg-white">
            Fund Management Performance Graphs
            <RouterLink 
                class="btn btn-raised btn-success btn-sm float-right"
                :to="{ name: 'create-fund-management-performance-graph' }">
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
                            <option value="" disabled>Select a package</option>
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
                        <th>Value (%)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody v-if="graphPages.length > 0">
                    <tr 
                        
                        v-for="(graph, index) in graphPages[currentPage - 1]" 
                        :key="graph.id">
                        <td>{{ graph.id }}</td>
                        <td>{{ graph.month }}, {{ graph.year }}</td>
                        <td>{{ graph.package.name }} - {{ graph.package.duration }}@{{ graph.package.details[0].value }}</td>
                        <td>
                            <div class="row">
                            <div class="col-3">
                                <img :src="`${graph.member.avater_path}/50x50-${graph.member.avater}`" alt="">
                            </div>
                            <div class="col-9">
                                <b>Username: </b>{{ graph.member.username }}<br />
                                <b>Full Name: </b>{{ graph.member.full_name }}<br />
                                <b>Email: </b>{{ graph.member.email }}
                            </div>
                        </div>
                        </td>
                        <td>{{ graph.profit ? 'Profit' : 'Loss' }}</td>
                        <td class="text-right">{{ graph.value.toFixed(2) }}</td>
                        <td>
                            {{ graph.status ? 'Active' : 'Inactive' }}<br />
                            <span v-if="graph.is_notified" class="badge badge-pill badge-success">Notified</span>
                        </td>
                        <td>
                            <RouterLink 
                                class="btn btn-raised btn-info btn-sm"
                                :to="{ name: 'edit-fund-management-performance-graph', params: { id: graph.id } }">
                                Edit
                            </RouterLink>
                            <button v-if="graph.status === 0" class="btn btn-raised btn-primary btn-sm" @click="active(graph)">Active</button>
                            <button v-if="graph.status === 1" class="btn btn-raised btn-warning btn-sm" @click="inactive(graph)">Inactive</button>
                            <button v-if="graph.is_notified === 0" class="btn btn-raised btn-success btn-sm" @click="notify(graph)"><i class="fa fa-envelope-o"></i> Notify</button>
                        </td>
                    </tr>
                </tbody>
                <tbody v-else>
                    <tr>
                        <td colspan="8" class="alert alert-warning" role="alert">
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
                graphs: [],
                graphPages: [],
                perPage: 10,
                pageCount: 1,
                currentPage: 1,
                message: 'Fetching Graph Data From The Server. Please Wait!',

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
                this.generatePages(this.graphs)
                this.user = ''
                this.status = ''
                this.month = ''
                this.plan = ''
            },
            perPage (value) {
                this.setCurrentPage(1)
                this.generatePages(this.graphs)
            },
           
            status (value) {
                this.setCurrentPage(1)
                if (this.status != '') {
                    let newGraphs = this.graphs.filter(graph => {
                        return parseInt(graph.status) == parseInt(this.status)
                    })

                    this.generatePages(newGraphs)
                }
            },
            month (value) {
                this.setCurrentPage(1)
                console.log(this.month.month)
                if (this.month != '') {
                    let newGraphs = this.graphs.filter(graph => {
                        return graph.month == this.month.month && graph.year == this.month.year
                    })

                    this.generatePages(newGraphs)
                }
            },
            member (value) {
                this.setCurrentPage(1)
                if (this.member != '') {
                    let newGraphs = this.graphs.filter(graph => {
                        return graph.member.id == this.member
                    })

                    this.generatePages(newGraphs)
                }
            },
            plan(value) {
                this.setCurrentPage(1)
                if (this.plan != '') {
                    let newGraphs = this.graphs.filter(graph => {
                        return graph.package_id === this.plan
                    })
                    
                    this.generatePages(newGraphs)
                }
            }
        },
        created() {

            axios.get('/xhr/admin/graph/package/fund-management')
                .then(response => {
                    this.packages = response.data
                })
                .catch(error => {
                    console.log(error)
                })

            axios.get('/xhr/admin/graph/member/fund-management')
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

                EventBus.$on('fund-management-graph-update', payload => {
                    let index = this.graphs.findIndex(graph => {
                        return graph.id === payload.id
                    })
                    this.graphs[index] = payload

                    this.generatePages(this.graphs)
                })

            EventBus.$on('new-fund-management-graph-inserted', payload => {
                this.graphs.unshift(payload)

                this.generatePages(this.graphs)
            })

            axios.get('/xhr/admin/graph/fund-management')
                .then(response => {
                    this.graphs = response.data

                    this.graphs.map(graph => {
                        let month = {}
                        let index
                        // if (this.months.length > 0) {
                        index = this.months.findIndex(m => {
                            return m.month === graph.month && m.year === graph.year
                        })
                        
                        if (index === -1) {
                            month.month = graph.month
                            month.year = graph.year
                            this.months.push(month)
                        }

                    })

                    this.generatePages(this.graphs)

                    if (this.graphs.length === 0) {
                        this.message = 'Sorry! No Graph Data Found.'
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        },
        methods: {
            setCurrentPage (page) {
                this.currentPage = page
            },
            generatePages (graph) {
                this.graphPages = _.chunk(graph, this.perPage)
              
                this.pageCount = this.graphPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No Graph Data Found"
                }
            },

            active (graph) {
                axios.post('/admin/graph/' + graph.id +'/active')
                    .then(response => {
                        if (response.status === 200) {
                            this.graphs = this.graphs.map(g => {
                                if (g.id === graph.id) {
                                    g.status = 1
                                }
                                return g
                            })
                            this.generatePages(this.graphs)

                            this.flash('Performance graph active successfully!', 'success');
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            inactive (graph) {
                axios.post('/admin/graph/' + graph.id +'/inactive')
                    .then(response => {
                        if (response.status === 200) {
                            this.graphs = this.graphs.map(g => {
                                if (g.id === graph.id) {
                                    g.status = 0
                                }
                                return g
                            })
                            this.generatePages(this.graphs)

                            this.flash('Performance graph inactive successfully!', 'success');
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            },

            notify (graph) {
                axios.post('/admin/graph/' + graph.id + '/notify')
                    .then(response => {
                        if (response.status === 200) {
                            response.data.id
                            let index = this.graphs.findIndex(graph => {
                                return graph.id === response.data.id
                            })
                            this.graphs[index] = response.data

                            this.generatePages(this.graphs)

                            this.flash('Performance graph has been notified to its recepients!', 'success');
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }
            
        }
    }
</script>