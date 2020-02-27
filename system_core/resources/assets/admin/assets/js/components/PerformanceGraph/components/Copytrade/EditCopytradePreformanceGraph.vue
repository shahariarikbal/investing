<template>
    <div class="modal fade show" style="display: block" id="edit-copytrade-performance-graph-modal" role="dialog" aria-labelledby="edit-copytrade-performance-graph-modal">
        
        <div class="modal-dialog" style="position: relative;" id="edit-copytrade-performance-graph-modal-dialog" role="document">
            <div id="edit-loading" style="display: none">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Copytrade Performance Graph Edit</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="date">Date</label>
                        <datepicker 
                            input-class="form-control" 
                            name="date" 
                            v-model="date"
                            id="date"></datepicker>
                        <small class="text-danger">{{ edit_dateError }}</small>
                    </div>                   

                    <div class="form-group">
                        <label for="profit">Profit</label>
                        <input type="checkbox" id="profit" v-model="profit">
                    </div>

                    <div class="form-group">
                        <label for="value">Value</label>
                        <input type="number" class="form-control" name="value" id="value" v-model="value">
                        <small class="text-danger">{{ edit_valueError }}</small>
                    </div>

                    <div class="form-group">
                        <label for="package">Plan</label>
                        <select class="form-control" name="package" id="package" v-model="plan">
                            <option value="" disabled>Please select a package</option>
                            <option v-for="plan in packages" :value="plan.id" :key="plan.id">{{ plan.name }} - {{ plan.duration }}@{{ plan.price }}</option>
                        </select>
                        <small class="text-danger">{{ edit_planError }}</small>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" v-model="status">
                            <option disabled>Please select a status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <small class="text-danger">{{ edit_statusError }}</small>
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
    data () {
            return {
                packages: [],
                date: new Date(),
                profit: 1,
                value: 0,
                plan: '',
                status: 1,
                notify: 0,

                edit_errorCount: 0,
                edit_dateError: '',
                edit_valueError: '',
                edit_planError: '',
                edit_statusError: ''
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

        mounted () {
            axios.get(`/admin/graph/edit/${this.$route.params.id}`)
                .then(response => {

                    this.date = new Date(response.data.date)
                    this.profit = response.data.profit
                    this.value = response.data.value
                    this.plan = response.data.package_id
                    this.status = response.data.status
                    this.notify = response.data.is_notified

                })
                .catch(error => {
                    console.log(error)
                })
        },

        methods: {
            close () {
                this.$router.push({ name: 'copytrade-performance-graph' })
            },

            resetError () {
                this.edit_errorCount = 0
                this.edit_dateError = ''
                this.edit_valueError = ''
                this.edit_planError = ''
                this.edit_statusError = ''
            },
            validate () {
                if (this.date.length === 0) {
                    this.edit_dateError = 'Please select a date'
                    this.edit_errorCount++
                }

                if (this.value === 0) {
                    this.edit_valueError = 'Please specify a value'
                    this.edit_errorCount++
                }
                
                if (this.plan.length === 0) {
                    this.edit_planError = 'Please select a package'
                    this.edit_errorCount++
                }

                if (this.status.length === 0) {
                    this.edit_statusError = 'Please specify a status'
                    this.edit_errorCount++
                }
            },
            update () {
                this.resetError()
                this.validate()

                let height = parseInt(document.getElementById('edit-copytrade-performance-graph-modal-dialog').offsetHeight)
                let padding = (height - 40) / 2
                let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                document.getElementById('edit-loading').setAttribute('style', loadingStyle)

                let data = {
                        date: this.date,
                        profit: this.profit,
                        value: this.value,
                        plan: this.plan,
                        status: this.status,
                        service: 'copytrade'
                    }
                console.log(data)
                    axios.post(`/admin/graph/${this.$route.params.id}/update`, data)
                        .then(response => {
                            //console.log(response)
                            document.getElementById('edit-loading').setAttribute('style', 'display: none')
                            if (response.status === 200) {
                                EventBus.$emit('copytrade-graph-update', response.data)
                                this.flash('Performance graph updated successfully!', 'success');
                                this.close()
                            }
                        })
                        .catch(error => {
                            //console.log(error)
                             document.getElementById('edit-loading').setAttribute('style', 'display: none')
                            if (error.response.status === 500) {
                                console.log('500')
                                this.flash('Internal server error', 'error');
                            }
                            if (error.response.status === 422) {
                                if (error.response.data.plan && error.response.data.plan.length > 0) {
                                    this.edit_planError = error.response.data.plan[0]
                                }
                                if (error.response.data.value && error.response.data.value.length > 0) {
                                    this.edit_valueError = error.response.data.value[0]
                                }
                            }
                        })
            },
        }
    }
</script>
