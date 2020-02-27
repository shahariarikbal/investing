<template>
    <div class="card">
        <div class="card-header bg-white">
            Copytrade Performance Graphs
            <RouterLink 
                class="btn btn-raised btn-success btn-sm float-right"
                :to="{ name: 'create-copytrade-performance-graph' }">
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
                            <option value="plan">Plan</option>
                            <option value="status">Status</option>
                            <option value="month">Month</option>
                        </select>
                    </div>
                    <div class="d-flex">
                        <select 
                            class="form-control"
                            style="width: 199px"
                            v-if="searchType==='plan'" 
                            v-model="plan">
                            <option value="" disabled>Select a Plan</option>
                            <option v-for="plan in packages" :value="plan.id" :key="plan.id">{{ plan.name }} - {{ plan.duration }}@{{ plan.price }}</option>
                        </select>
                        
                        
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
                            v-if="searchType==='month'" 
                            v-model="month">
                            <option value="" disabled>Select a status</option>
                            <option v-for="month in months" :key="month.month" :value="month">{{ month.month }}, {{ month.year }}</option>
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
                        <th>Profit</th>
                        <th>Value (%)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody v-if="graphPages.length > 0">
                    <tr 
                        
                        v-for="(graph, index) in graphPages[currentPage]" 
                        :key="graph.id">
                        <td>{{ graph.id }}</td>
                        <td>{{ graph.month }}, {{ graph.year }}</td>
                        <td>{{ graph.package.name }} - {{ graph.package.duration }}@{{ graph.package.price }}</td>
                        <td>{{ graph.profit ? 'Profit' : 'Loss' }}</td>
                        <td class="text-right">{{ graph.value.toFixed(2) }}</td>
                        <td>
                            {{ graph.status ? 'Active' : 'Inactive' }}<br />
                            <span v-if="graph.is_notified" class="badge badge-pill badge-success">Notified</span>
                        </td>
                        <td style="text-align: center; width: 15%">
                            <RouterLink 
                                class="btn btn-raised btn-info btn-sm"
                                :to="{ name: 'edit-copytrade-performance-graph', params: { id: graph.id } }">
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
                        <td colspan="7" class="alert alert-warning" role="alert">
                        {{ message }}
                        </td>
                    </tr>
                </tbody>
            </table>
            

            <paginate
                v-if="pageCount > 1"
                :page-count="pageCount"
                :click-handler="setCurrentPage"
                
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
                currentPage: 0,
                message: 'Fetching Graph Data From The Server. Please Wait!',

                searchType: 'plan',
                packages: [],
                plan: '',
                status: '',
                months: [],
                month: ''
            }
        },
        watch: {
            searchType (value) {
                this.generatePages(this.graphs)
                this.plan = ''
                this.status = ''
                this.month = ''
            },
            perPage (value) {
                this.generatePages(this.graphs)
            },
            plan (value) {
                if (this.plan != '') {
                    let newGraphs = this.graphs.filter(graph => {
                        return graph.package_id === this.plan
                    })

                    this.generatePages(newGraphs)
                }
            },
            status (value) {
                if (this.status != '') {
                    let newGraphs = this.graphs.filter(graph => {
                        return parseInt(graph.status) == parseInt(this.status)
                    })

                    this.generatePages(newGraphs)
                }
            },
            month (value) {
                if (this.month != '') {
                    let newGraphs = this.graphs.filter(graph => {
                        return graph.month == this.month.month && graph.year == this.month.year
                    })

                    this.generatePages(newGraphs)
                }
            }
        },
        created() {

            axios.get('/xhr/admin/graph/package/copytrade')
                .then(response => {
                    this.packages = response.data
                })
                .catch(error => {
                    console.log(error)
                })
            EventBus.$on('copytrade-graph-update', payload => {
                let index = this.graphs.findIndex(graph => {
                    return graph.id === payload.id
                })
                this.graphs[index] = payload

                this.generatePages(this.graphs)
            })

            EventBus.$on('new-copytrade-graph-inserted', payload => {
                this.graphs.unshift(payload)

                this.generatePages(this.graphs)
            })

            axios.get('/xhr/admin/graph/copytrade')
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
                this.currentPage = page - 1
            },
            generatePages (graph) {
                this.graphPages = _.chunk(graph, this.perPage)
                this.pageCount = this.graphPages.length
                if (this.pageCount === 0) {
                    this.message = "Sorry! No Graph Data Found"
                }
            },

            active (graph) {
                axios.post('/admin/graph/' + graph.id + '/active')
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
                axios.post('/admin/graph/' + graph.id + '/inactive')
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