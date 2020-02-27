<template>
    <Modal ref="createFundManagementMonthlyTradeStatement" :header-class="'bg-success'" @modal-cosed="close">
        <template v-slot:header>
            <h4 class="modal-title text-white">Fund Management Monthly Trade Statement Create</h4>
        </template>
        
        <template>
            <div class="form-group">
                <label for="package">Plan *</label>
                <select class="form-control" name="package" id="package" v-model="plan">
                    <option value="" disabled selected>Please select a package</option>
                    <option v-for="plan in packages" :value="plan.id" :key="plan.id">{{ plan.name }} - {{ plan.duration }}@{{ plan.details[0].value }}</option>
                </select>
                <small class="text-danger">{{ planError }}</small>
            </div>

            <div class="form-group">
                <label for="package">Members *</label>
                <select class="form-control" name="member" id="member" v-model="member">
                    <option value="" disabled>Please select a member</option>
                    <option v-for="member in members" :key="member.id" :value="member.id">{{ member.email }}</option>
                </select>
                
                <small class="text-danger">{{ memberError }}</small>
            </div>

            <div class="form-group">
                <label for="date">Date *</label>
                <datepicker 
                    input-class="form-control" 
                    name="date" 
                    v-model="date"
                    id="date"></datepicker>
                <small class="text-danger">{{ dateError }}</small>
            </div>                   

            <div class="form-group">
                <label for="profit">Profit *</label>
                <input type="checkbox" id="profit" v-model="profit">
            </div>

            <div class="form-group">
                <label for="growth">Growth (%) *</label>
                <input type="number" class="form-control" name="growth" id="growth" v-model="growth">
                <small class="text-danger">{{ growthError }}</small>
            </div>

            <div class="form-group">
                <label for="amount">Amount *</label>
                <input type="number" class="form-control" name="amount" id="amount" v-model="amount">
                <small class="text-danger">{{ amountError }}</small>
            </div>

            <div class="form-group">
                <label for="company_share">Company Share [as {{ companySharePercentages }}%]</label>
                <input type="text" class="form-control" name="company_share" id="company_share" v-model="companyShare" readonly>
                <small class="text-danger">{{ companyShareError }}</small>
            </div>

            <div class="form-group">
                <label for="affiliate_commission">Affiliate Commission [as {{ affiliatePercentages }}%]</label>
                <input type="text" class="form-control" name="affiliate_commission" id="affiliate_commission" v-model="affiliateCommission" readonly>
                <small class="text-danger">{{ affiliateCommissionError }}</small>
            </div>

            <div class="form-group">
                <label for="attachment">attachment *</label>
                <input
                    type="file"
                    class="form-control-file pl-0"
                    id="transactionScreenshot"
                    style="font-size: 13px;"
                    ref="attachment"
                    accept="application/pdf" >
                <small class="text-danger">{{ attachmentError }}</small>
            </div>

            <div class="form-group">
                <label for="status">Status * <small>(if set inactive, invoice will not be generated without manual clicking on active)</small></label>
                <select class="form-control" name="status" id="status" v-model="status">
                    <option disabled>Please select a status</option>
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                </select>
                <small class="text-danger">{{ statusError }}</small>
            </div>

            <div class="form-group">
                <label for="notify">Notify via email now</label>
                <input type="checkbox" id="notify" v-model="notify" value="1" :disabled="status == 1 ? false : true">
            </div>
        </template>

        <template v-slot:footer>
            <button class="btn btn-danger" data-dismiss="modal" @click="close">Close</button>
            <button class="btn btn-success" @click="save">Confirm</button>
        </template>
    </Modal>
</template>

<script>
    import Modal from '@p/Modal.vue'
    import Datepicker from 'vuejs-datepicker'
    export default {
        // props: {
        //     value: {
        //         type: Boolean,
        //         default: false
        //     },
        //     data: {
        //         type: Object,
        //         required: true
        //     }

        // },
        data () {
            return {
                members: [],
                packages: '',
                date: new Date(),
                profit: 1,
                growth: 0,
                amount: 0,
                plan: '',
                member: '',
                status: 1,
                notify: 0,

                errorCount: 0,
                dateError: '',
                growthError: '',
                amountError: '',
                attachmentError: '',
                planError: '',
                memberError: '',
                statusError: '',
                companyShareError: '',
                affiliateCommissionError: '',

                companySharePercentages: 0,
                affiliatePercentages: 0
            }
        },
        components: { Modal, Datepicker },
        mounted () {
            this.$refs.createFundManagementMonthlyTradeStatement.show()
        },
        created () {
                axios.get('/xhr/admin/graph/package/fund-management')
                .then(response => {
                    this.packages = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        watch: {
            // value (val) {
            //     if (val) {
            //         this.$refs.confirm.show()
            //         this.$emit('input', true)
            //     }
            // }
            status (value) {
                if (this.status == 0) {
                    this.notify = 0
                }
            },
            plan (value) {

                let index = this.packages.findIndex(plan => {
                    return plan.id === this.plan
                })
                this.companySharePercentages = index !== -1 ? parseFloat(this.packages[index].settings.company_share) : 0
                this.affiliatePercentages = index !== -1 ? parseFloat(this.packages[index].settings.affiliate[0].percent) : 0

                axios.get(`/xhr/admin/graph/package/${this.plan}/subscription/fund-management`)
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
            }
        },
        
        computed: {
            monthYearFormatter (date) {
                return moment(date).format('MMM YYYY');
            },
            companyShare () {
                return (parseFloat(this.amount) / 100) * this.companySharePercentages
            },
            affiliateCommission () {
                return (this.companyShare / 100) * this.affiliatePercentages
            }
        },
        methods: {
            // cancel () {
            //     this.$emit('cancel')
            //     this.$refs.confirm.hide()
            //     this.$emit('input', false)
            // },
            // confirm () {
            //     this.$emit('confirm')
            //     this.$refs.confirm.hide()
            //     this.$emit('input', false)
            // }

            close () {
                this.$router.push({ name: 'fund-management-monthly-trade-statement' })
                this.$refs.createFundManagementMonthlyTradeStatement.hide()
            },

            resetError () {
                this.errorCount = 0
                this.dateError = ''
                this.growthError = ''
                this.amountError = ''
                this.companyShareError = ''
                this.affiliateCommissionError = ''
                this.attachmentError = ''
                this.planError = ''
                this.memberError = ''
                this.statusError = ''
            },
            validate () {
                if (this.date.length === 0) {
                    this.dateError = 'Please select a date'
                    this.errorCount++
                }

                if (this.growth === 0 || this.growth.length === 0) {
                    this.growthError = 'Please specify growth percentage'
                    this.errorCount++
                }

                if (this.amount === 0 || this.amount.length === 0) {
                    this.amountError = 'Please specify amount'
                    this.errorCount++
                }

                if (this.companyShare === 0 || this.companyShare.length === 0) {
                    this.companyShareError = 'Can not generate company share, due to wrong/ missing required input'
                    this.errorCount++
                }

                if (this.$refs.attachment.files.length === 0) {
                    this.attachmentError = 'Please provide trade statement in pdf'
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
            save () {
                this.resetError()
                this.validate()
                if (this.errorCount === 0) {

                    let formData = new FormData()
                    formData.append('date', moment(new Date(this.date)).utc())
                    formData.append('profit', this.profit)
                    formData.append('growth', this.growth)
                    formData.append('amount', this.amount)
                    formData.append('company_share', this.companyShare)
                    formData.append('affiliate_commission', this.affiliateCommission)
                    formData.append('attachment', this.$refs.attachment.files[0])
                    formData.append('plan', this.plan)
                    formData.append('member_id', this.member)
                    formData.append('status', this.status)
                    formData.append('service', 'fund-management')
                    formData.append('notify', this.notify)
            
                    axios.post('/xhr/admin/monthly-trade-statement', formData, {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        })
                        .then(response => {
                            if (response.status === 201) {
                                EventBus.$emit('new-fund-management-monthly-trade-statement-inserted', response.data)
                                this.flash('Monthly trade statement created successfully!', 'success');
                                this.close()
                            }
                        })
                        .catch(error => {
                            if (error.response.status === 500) {
                                console.log('500')
                                this.flash('Internal server error', 'error');
                            }
                            if (error.response.status === 422) {
                                if (error.response.data.date && error.response.data.date.length > 0) {
                                    this.dateError = error.response.data.date[0]
                                }
                                if (error.response.data.growth && error.response.data.growth.length > 0) {
                                    this.growthError = error.response.data.growth[0]
                                }
                                if (error.response.data.amount && error.response.data.amount.length > 0) {
                                    this.amountError = error.response.data.amount[0]
                                }
                                if (error.response.data.plan && error.response.data.plan.length > 0) {
                                    this.planError = error.response.data.plan[0]
                                }
                                if (error.response.data.member_id && error.response.data.member_id.length > 0) {
                                    this.memberError = error.response.data.member_id[0]
                                }
                                if (error.response.data.company_share && error.response.data.company_share.length > 0) {
                                    this.companyShareError = 'Can not generate company share, due to wrong/ missing required input'
                                }
                                if (error.response.data.attachment && error.response.data.attachment.length > 0) {
                                    this.attachmentError = error.response.data.attachment[0]
                                }
                            }
                        })
                }
                
            }
        }
    }
</script>