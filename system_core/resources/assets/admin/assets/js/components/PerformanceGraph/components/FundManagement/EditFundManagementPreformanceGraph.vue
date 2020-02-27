<template>
    <div class="modal fade show" style="display: block" id="edit-fund-management-performance-graph-modal" role="dialog" aria-labelledby="edit-fund-management-performance-graph-modal">
        
        <div class="modal-dialog" style="position: relative;" id="edit-fund-management-performance-graph-modal-dialog" role="document">
            <div id="edit-loading" style="display: none">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Fund Management Performance Graph Edit</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="date">Date</label>
                        <datepicker 
                            input-class="form-control" 
                            name="date" 
                            v-model="date"
                            id="date"></datepicker>
                        <small class="text-danger">{{ dateError }}</small>
                    </div>                   

                    <div class="form-group">
                        <label for="profit">Profit</label>
                        <input type="checkbox" id="profit" v-model="profit">
                    </div>

                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="number" class="form-control" name="value" id="value" v-model="value">
                        <small class="text-danger">{{ valueError }}</small>
                    </div>

                    <div class="form-group">
                        <label for="package">Plan</label>
                        <select class="form-control" name="package" id="package" v-model="plan">
                            <option value="" disabled selected>Please select a package</option>
                            <option v-for="plan in packages" :value="plan.id" :key="plan.id">{{ plan.name }} - {{ plan.duration }}@{{ plan.price }}</option>
                        </select>
                        <small class="text-danger">{{ planError }}</small>
                    </div>

                    <div class="form-group">
                        <label for="package">Members</label>
                        <select class="form-control" name="member" id="member" v-model="member">
                            <option value="" disabled>Please select a member</option>
                            <option v-for="member in members" :key="member.id" :value="member.id">{{ member.email }}</option>
                        </select>
                        
                        <small class="text-danger">{{ memberError }}</small>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" v-model="status">
                            <option disabled>Please select a status</option>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <small class="text-danger">{{ statusError }}</small>
                    </div>

                    <div class="form-group">
                        <label for="notify">Notify via email</label>
                        <span v-if="notify" class="badge badge-pill badge-success">Notified</span>
                        <span v-else class="badge badge-pill badge-warning">Not Yet</span>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-danger" data-dismiss="modal" @click="close">Close</button>
                    <button class="btn btn-success" data-dismiss="modal" @click="update">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker'

    export default {
        // props: [ 'deposit' ],
        data () {
            return {
                packages: [],
                members: [],
                date: new Date(),
                profit: 1,
                value: 0,
                plan: '',
                member: '',
                status: 1,
                notify: 0,

                errorCount: 0,
                dateError: '',
                valueError: '',
                planError: '',
                memberError: '',
                statusError: ''
            }
        },
        components: { Datepicker },
        created() {
            
            axios.get('/xhr/admin/graph/package/fund-management')
                .then(response => {
                    this.packages = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },

        watch: {
            plan (value) {
                axios.get(`/xhr/admin/graph/package/${this.plan}/subscription/fund-management`)
                    .then(response => {
                        console.log(response.data)
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
            }
        },

        mounted () {
            axios.get(`/admin/graph/edit/${this.$route.params.id}`)
                .then(response => {

                    this.date = new Date(response.data.date)
                    this.profit = response.data.profit
                    this.value = response.data.value
                    this.plan = response.data.package_id
                    this.member = response.data.member_id
                    this.status = response.data.status

                })
                .catch(error => {
                    console.log(error)
                })
        },
    
        methods: {
            close () {
                this.$router.push({ name: 'fund-management-performance-graph' })
            },

            resetError () {
                this.errorCount = 0
                this.dateError = ''
                this.valueError = ''
                this.planError = ''
                this.memberError = ''
                this.statusError = ''
            },
            validate () {
                if (this.date.length === 0) {
                    this.dateError = 'Please select a date'
                    this.errorCount++
                }

                if (this.value === 0) {
                    this.valueError = 'Please specify a value'
                    this.errorCount++
                }
                
                if (this.plan.length === 0) {
                    this.planError = 'Please select a package'
                    this.errorCount++
                }

                if (this.member.length === 0) {
                    this.memberError = 'Please select a member'
                    this.errorCount++
                }

                if (this.status.length === 0) {
                    this.statusError = 'Please specify a status'
                    this.errorCount++
                }
            },
            update () {
                this.resetError()
                this.validate()

                if (this.errorCount === 0) {
                    let height = parseInt(document.getElementById('edit-fund-management-performance-graph-modal-dialog').offsetHeight)
                    let padding = (height - 40) / 2
                    let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                    document.getElementById('edit-loading').setAttribute('style', loadingStyle)

                    let data = {
                        date: this.date,
                        profit: this.profit,
                        value: this.value,
                        plan: this.plan,
                        member_id: this.member,
                        status: this.status,
                        service: 'fund-management'
                    }

                    axios.post(`/admin/graph/${this.$route.params.id}/update`, data)
                        .then(response => {
                            document.getElementById('edit-loading').setAttribute('style', 'display: none')
                            if (response.status === 200) {
                                EventBus.$emit('fund-management-graph-update', response.data)
                                this.flash('Fun-management graph update successfully!', 'success');
                                this.close()
                            }
                        })
                        .catch(error => {
                            document.getElementById('edit-loading').setAttribute('style', 'display: none')
                            if (error.response.status === 500) {
                                console.log('500')
                                this.flash('Internal server error', 'error');
                            }
                            if (error.response.status === 422) {
                                if (error.response.data.plan && error.response.data.plan.length > 0) {
                                    this.planError = error.response.data.plan[0]
                                }
                                if (error.response.data.value && error.response.data.value.length > 0) {
                                    this.valueError = error.response.data.value[0]
                                }
                            }
                        })
                }
                
            },
            // selected (date) {
            //     console.log(date)
            // }
            // confirm() {
            //     let data = {
            //         amount: this.amount,
            //         transaction_id: this.transactionId,
            //         email: this.email,
            //         deposit: this.deposit
            //     }

            //     EventBus.$emit('deposit-approve-confirmed', data)

            //     this.amount = ''
            //     this.transactionId = ''
            //     this.email = ''
            // }
        }
    }
</script>
