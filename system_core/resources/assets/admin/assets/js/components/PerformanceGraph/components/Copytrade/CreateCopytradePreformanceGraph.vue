<template>
    <div class="modal fade show" style="display: block" id="create-copytrade-performance-graph-modal" role="dialog" aria-labelledby="create-copytrade-performance-graph-modal">
        
        <div class="modal-dialog" style="position: relative;" id="create-copytrade-performance-graph-modal-dialog" role="document">
            <div id="loading" style="display: none">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Copytrade Performance Graph Create</h4>
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
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" v-model="status">
                            <option disabled>Please select a status</option>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <small class="text-danger">{{ statusError }}</small>
                    </div>

                    <div class="form-group">
                        <label for="notify">Notify via email now</label>
                        <input type="checkbox" id="notify" v-model="notify" value="1">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-danger" data-dismiss="modal" @click="close">Close</button>
                    <button class="btn btn-success" data-dismiss="modal" @click="save">Confirm</button>
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
                date: new Date(),
                profit: 1,
                value: 0,
                plan: '',
                status: 1,
                notify: 0,

                errorCount: 0,
                dateError: '',
                valueError: '',
                planError: '',
                statusError: ''
            }
        },
        components: { Datepicker },
        created() {
            
            axios.get('/xhr/admin/graph/package/copytrade')
                .then(response => {
                    this.packages = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        computed: {
            monthYearFormatter (date) {
                return moment(date).format('MMM YYYY');
            }
        },
        methods: {
            close () {
                this.$router.push({ name: 'copytrade-performance-graph' })
            },

            resetError () {
                this.errorCount = 0
                this.dateError = ''
                this.valueError = ''
                this.planError = ''
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

                if (this.status.length === 0) {
                    this.statusError = 'Please specify a status'
                    this.errorCount++
                }
            },
            save () {
                this.resetError()
                this.validate()

                if (this.errorCount === 0) {
                    let height = parseInt(document.getElementById('create-copytrade-performance-graph-modal-dialog').offsetHeight)
                    let padding = (height - 40) / 2
                    let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                    document.getElementById('loading').setAttribute('style', loadingStyle)

                    let data = {
                        date: this.date,
                        profit: this.profit,
                        value: this.value,
                        plan: this.plan,
                        status: this.status,
                        service: 'copytrade',
                        notify: this.notify
                    }

                    axios.post('/xhr/admin/graph', data)
                        .then(response => {
                            document.getElementById('loading').setAttribute('style', 'display: none')
                            if (response.status === 201) {
                                EventBus.$emit('new-copytrade-graph-inserted', response.data)
                                this.flash('Performance graph created successfully!', 'success');
                                this.close()
                            }
                        })
                        .catch(error => {
                            document.getElementById('loading').setAttribute('style', 'display: none')
                            if (error.response.status === 500) {
                                console.log('500')
                                this.flash('Internal server error', 'error');
                            }
                            if (error.response.status === 422) {
                                if (error.response.data.plan && error.response.data.plan.length > 0) {
                                    this.planError = error.response.data.plan[0]
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
