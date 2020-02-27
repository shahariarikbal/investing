<template>
    <div>
        <div class="modal fade addPackageModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" style="position: relative;" id="packageForm">
            <div id="package-loading" style="display: none" >
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h2>Create Package</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body m-t-35">
                        <form name="packages" method="post" class="form-horizontal login_validator" id="form_inline_validator">
                            
                            <div class="form-group row">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="name" class="col-form-label">Name *</label>
                                </div>
                                <div class="col-xl-9">
                                    <input type="text" id="name" name="name" placeholder="Enter Your Package Name...." class="form-control" v-model="name">
                                    <small class="text-danger" v-text="nameError"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="service" class="col-form-label">Service *</label>
                                </div>
                                <div class="col-xl-9">
                                    <select class="form-control chzn-select" name="service" id="service" v-model="service">
                                        <option disabled selected>Choose Your Service</option>
                                        <option v-for="(service, index) in services" :key="index" :value="service.value">{{ service.label }}</option>
                                    </select>
                                    <small class="text-danger" v-text="serviceError"></small>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="duration" class="col-form-label">Duration/ Billing Cycle *</label>
                                </div>
                                <div class="col-xl-9">
                                    <select class="form-control chzn-select" name="duration" id="duration" v-model="duration">
                                        <option disabled selected>Choose Your Package Duration</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="biyearly">Half yearly</option>
                                        <option value="yearly">Yearly</option>
                                    </select>
                                    <small class="text-danger" v-text="durationError"></small>
                                </div>
                            </div>
                            <div class="form-group row" v-if="displayPriceField">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="price" class="col-form-label">Price *</label>
                                </div>
                                <div class="col-xl-9">
                                    <input type="number" id="price" name="price" data-error-target="#price_error" v-model="price" placeholder="Enter Your Package Price...." class="form-control">
                                    <small class="text-danger" v-text="priceError"></small>
                                </div>
                            </div>

                            <div class="form-group row" v-if="displaySecurityDepositField">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="security_deposit" class="col-form-label">Security Deposit (%) *</label>
                                </div>
                                <div class="col-xl-9">
                                    <input type="number" id="security_deposit" name="security_deposit" data-error-target="#security_deposit_error" v-model="securityDeposit" placeholder="Enter Security Deposit Percentages" class="form-control">
                                    <small class="text-danger" v-text="securityDepositError"></small>
                                </div>
                            </div>

                            <div class="form-group row" v-if="displayCompanyShareField">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="company_share" class="col-form-label">Company Share (%) *</label>
                                </div>
                                <div class="col-xl-9">
                                    <input type="number" id="company_share" name="company_share" data-error-target="#company_share_error" v-model="companyShare" placeholder="Enter Company Share Percentages" class="form-control">
                                    <small class="text-danger" v-text="companyShareError"></small>
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="recursive" class="col-form-label">Payment</label>
                                </div>
                                <div class="col-xl-9">
                                    <div class="radio" v-if="service !== 'App\\FundManagement'">
                                        <label>
                                            <input type="radio" name="recursive" v-model="recursive" :value="1">
                                            <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                                            Recursive Price
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="o4" v-model="recursive" :value="0">
                                            <span class="cr"><i class="cr-icon fa fa-star"></i></span>
                                            Fixed Price
                                        </label>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="orders" class="col-form-label">Order *</label>
                                </div>
                                <div class="col-xl-9">
                                    <input type="number" id="orders" name="orders" data-error-target="#orders_error" v-model="orders" placeholder="Enter Your Order Number...." class="form-control">
                                    <small class="text-danger" v-text="ordersError"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="icon" class="col-form-label">Icon</label>
                                </div>
                                <div class="col-xl-9">
                                    <input type="text" id="icon" name="icon" data-error-target="#icon_error" v-model="icon" placeholder="Enter Your Icon Class Name...." class="form-control">
                                    <small class="text-danger" v-text="iconError"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="icon" class="col-form-label">Note</label>
                                </div>
                                <div class="col-xl-9">
                                    <textarea id="note" name="note" data-error-target="#note_error" v-model="note" placeholder="Enter Your Icon Class Name...." class="form-control"></textarea>
                                    <small class="text-danger" v-text="noteError"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="feature_details" class="col-form-label">Feature Details</label>
                                </div>
                                <div class="col-xl-9">
                                    <featureDetail  v-for="n in keyValuePairCount" :key="n" @update-key="updateKey" @update-value="updateValue" />
                                    <small class="text-danger" v-text="detailsError"></small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="feature_details" class="col-form-label"></label>
                                </div>
                                <div class="col-xl-9 cursor-pointer text-underline" @click="appendNewKeyValuePair">
                                    <i class="fa fa-plus-square-o"></i> Add New Key/ value pair
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="feature_details" class="col-form-label">Enable Affiliate</label>
                                </div>
                                <div class="col-xl-9" >
                                    <input class="checkbox-away" type="checkbox" v-model="enableAffiliate" />
                                </div>
                            </div>

                            <div class="form-group row" v-if="enableAffiliate">
                                <div class="col-xl-3 text-xl-right">
                                    <label for="feature_details" class="col-form-label">Affiliate</label>
                                </div>
                                <div class="col-xl-9">
                                    <p>will be calculate by percentage of price</p>
                                    <ul class="list-unstyled">
                                        <li v-for="a in affiliateLavel" :key="a.lavel">
                                            <label for="label1">Label {{ a.lavel }} <input type="number" v-model="a.percent" class="form-control"></label>
                                        </li>
                                        <li>
                                            <button type="button" class="btn btn-primary btn-sm" @click.prevent="addAffiliate" >Add</button>
                                            <button type="button" class="btn btn-danger btn-sm" @click.prevent="removeAffiliate">Remove</button>
                                            <a href="" ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>



                            <permission-group :permissions="newPermissions" v-if="displayPermissions" />

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" @click="adminPackageSave()">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import featureDetail from './KeyValuePairInput.vue'
    import PermissionGroup from './PermissionGroup.vue'
    export default {
        props: [ 'permissions' ],
        data () {
            return {
                signalPermissions: [],
                copytradePermissions: [],
                fundmanagementPermissions: [],
                transactionPermissions: [],

                newPermissions: [],

                keyValuePairCount: 1,

                services: [
                    { 
                        "label": "Copy Trade",
                        "value": "App\\Copytrade"
                    },
                    { 
                        "label": "Fund Management",
                        "value": "App\\FundManagement"
                    },
                    { 
                        "label": "Signal",
                        "value": "App\\Signal"
                    }
                ],

                displaySecurityDepositField: false,
                displayCompanyShareField: false,
                displayPriceField: true,
                displayPermissions: true,

                name: '',
                service: '',
                duration: '',
                price: 0,
                securityDeposit: '',
                companyShare: '',
                discount: '',
                orders: 0,
                note: '',
                icon: '',
                // tax: 0,
                recursive: 1,

                // permissions: null,
                checkedPermission: [],

                details: [
                    {
                        key: '',
                        value: ''
                    }
                ],

                errorCount: 0,
                nameError: '',
                serviceError: '',
                durationError: '',
                discountError: '',
                // taxError: '',
                priceError: '',
                securityDepositError: '',
                companyShareError: '',
                ordersError: '',
                iconError: '',
                noteError: '',
                detailsError: '',
                checkedPermissionError: '',
                enableAffiliate: false,
                affiliateLavel: [{lavel: 1, percent: 0}]
            }
            
        },
        components: { featureDetail, PermissionGroup },
        created () {
            this.newPermissions = this.permissions
          
            this.signalPermissions = this.newPermissions['App\\Signal']

            this.copytradePermissions = this.newPermissions['App\\Copytrade']

            this.fundmanagementPermissions = this.newPermissions['App\\FundManagement']

            this.transactionPermissions = this.newPermissions['App\\Transaction']
        },
        watch: {
            service (value) {

                this.displaySecurityDepositField = false
                this.displayCompanyShareField = false
                this.displayPriceField = true

                if (this.service === 'App\\FundManagement') {
                    this.displaySecurityDepositField = true
                    this.displayCompanyShareField = true
                    this.displayPriceField = false
                    this.recursive = 0
                }

            }
        },
        methods: {
            resetError () {
                this.errorCount = 0
                this.nameError =''
                this.serviceError = ''
                this.durationError = ''
                this.priceError = ''
                this.securityDepositError = ''
                this.companyShareError = ''
                this.detailsError = ''
                this.ordersError = ''
                this.iconError = ''
                this.detailsError = ''
                this.checkedPermissionError = ''
            },
            appendNewKeyValuePair() {
                this.details.push({
                        key: '',
                        value: ''
                    })
                this.keyValuePairCount++
            },
            adminPackageSave () {

                this.resetError()

                // validation
                // check Name length
                if (this.name.length === 0) {
                    this.nameError = 'Name field is required'
                    this.errorCount++
                }

                // validation
                // check Service length
                if (this.service.length === 0) {
                    this.serviceError = 'Service field is required'
                    this.errorCount++
                }

                // validation
                // check duration length
                if (this.duration.length === 0) {
                    this.durationError = 'Duration field is required'
                    this.errorCount++
                }

                // validation
                // check price length
                if (this.service !== 'App\\FundManagement' && this.price.length === 0) {
                    this.priceError = 'price field is required'
                    this.errorCount++
                }

                if (this.service === 'App\\FundManagement' && this.securityDeposit.length === 0) {
                    this.securityDepositError = 'Please set security deposit amount'
                    this.errorCount++
                }

                if (this.service === 'App\\FundManagement' && this.companyShare.length === 0) {
                    this.companyShareError = 'Please set company share amount'
                    this.errorCount++
                }

                // validation
                // check order length
                if (this.orders.length === 0) {
                    this.ordersError = 'Orders field is required'
                    this.errorCount++
                }

          
                // validation
                // check details length
                if (this.details.length === 0) {
                    this.detailsError = 'Details field is required'
                    this.errorCount++
                }

                let checkedPermissions = [];
             
                for (const key in this.newPermissions) {
                    
                    if (this.newPermissions.hasOwnProperty(key)) {
                        const permissions = this.newPermissions[key];
                        permissions.map((permission) => {
                            if (permission.checked) {
                                checkedPermissions.push(permission.name)
                            }
                        })
                    }
                }

                // if (checkedPermissions.length === 0) {
                //     this.checkedPermissionError = 'Select at least one permission'
                //     this.errorCount++
                // }
            
                if (this.errorCount === 0) {
                    // initialize loading effect
                    var height = parseInt(document.getElementById('packageForm').offsetHeight)

                    var padding = (height - 40) / 2

                    var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

                    document.getElementById('package-loading').setAttribute('style', loadingStyle)

                    axios.post('/admin/package/save', {
                            name: this.name,
                            service: this.service,
                            duration: this.duration,
                            price: this.price,
                            // discount: this.discount,
                            recursive: this.recursive,
                            // tax: this.tax,
                            orders: this.orders,
                            icon: this.icon,
                            note: this.note,
                            details: JSON.stringify(this.details),
                            permissions: checkedPermissions,
                            security_deposit: this.securityDeposit,
                            company_share: this.companyShare,
                            enable_affiliate: this.enableAffiliate,
                            affiliate: this.affiliateLavel,
                        })
                        .then((response) => {
                            if (response.status === 201) {
                                // console.log(response)
                                document.getElementById('package-loading').setAttribute('style', 'display: none')
                                this.name = ''
                                this.service = ''
                                this.duration = ''
                                this.price = ''
                                // this.discount = ''
                                this.details = ''
                                this.permission = ''
                                // this.tax = '',
                                this.recursive = 1,
                                this.orders = ''
                                this.icon = ''
                                this.note = ''
                                this.enableAffiliate = false;
                                this.affiliateLavel = [{lavel: 1, percent: 0}];
                                this.securityDeposit = ''
                                this.companyShare = ''
                                $('.addPackageModal').modal('hide')
                                alert('Package has been inserted')
                                location.reload(true);
                                this.$refs.addFaqModal.setAttribute('style', 'display: none')
                            } else {
                                alert('Something went wrong!')
                            }
                            
                        })
                        .catch((error) => {
                            document.getElementById('package-loading').setAttribute('style', 'display: none')
                            console.log(error)
                        })
                }
                
            },
            updateKey (payload1, payload2) {
                this.details[payload2 - 1].key = payload1
                
            },

            updateValue (payload1, payload2) {
                this.details[payload2 - 1].value = payload1
            },

            permissionChecked(payload) {
                let index = this.checkedPermission.findIndex(checked => {
                    return checked.id === payload.id
                })
                if (index === -1) {
                    this.checkedPermission.push(payload)
                }
                // console.log(payload)
            },
            permissionUnchecked(payload) {
                this.checkedPermission = this.checkedPermission.filter(checked => {
                    return checked.id !== payload.id
                })
            },
            addAffiliate() {
                this.affiliateLavel.push({
                    lavel: this.affiliateLavel.length + 1,
                    percent: 0
                })
            },

            removeAffiliate() {
                this.affiliateLavel.pop()
            },
        }
    }
</script>