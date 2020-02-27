<template>
    <div class="modal fade show" style="display: block" id="create-admin-permission-management-modal" role="dialog" aria-labelledby="create-admin-permission-management-modal">
        
        <div class="modal-dialog" style="position: relative;" id="create-permission-modal-dialog" role="document">
            <div id="loading" style="display: none">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Create Permission</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" name="name" id="name" v-model="name" class="form-control" placeholder="Name">
                        <small class="text-danger">{{ nameError }}</small>
                    </div>
                    <div class="form-group">
                        <label for="guard_name">Guard</label>
                        <select class="form-control" name="guard_name" id="guard_name" v-model="guard_name">
                            <option disabled selected>Please select a guard</option>
                            <option value="admin">Admin</option>
                            <option value="member">Member</option>
                        </select>
                        <small class="text-danger">{{ guardError }}</small>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-danger" data-dismiss="modal" @click="close">Close</button>
                    <button class="btn btn-success" @click="create">Create</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                name: '',
                guard_name: '',
                errorCount: 0,
                nameError: '',
                guardError: '',
            }
        },
        methods: {
            resetError () {
                this.errorCount = 0
                this.nameError = ''
                this.guardError = ''
            },
            validate () {
                if (this.name.length === 0) {
                    this.nameError = 'Permission Name required'
                    this.errorCount++
                }
                if (this.guard_name.length === 0) {
                    this.guardError = 'Permission guard required'
                    this.errorCount++
                }
            },
            close () {
                this.$router.push({ name: 'permissions' })
            },
            create () {
                this.resetError()
                this.validate()

                let height = parseInt(document.getElementById('create-permission-modal-dialog').offsetHeight)
                let padding = (height - 40) / 2
                let loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`
                document.getElementById('loading').setAttribute('style', loadingStyle)

                let data = {
                    name: this.name,
                    guard_name: this.guard_name,
                }

                if (this.errorCount === 0 ) {
                    axios.post('/xhr/admin/settings/permission-management/create', data)
                        .then(response => {
                            document.getElementById('loading').setAttribute('style', 'display: none')
                            if (response.status === 201) {
                                EventBus.$emit('permission-created', response.data)
                                this.flash('Permission Creation Successfully', 'success')
                                this.close()
                            }
                        })
                        .catch(error => {
                            console.log(error)
                            if (error.response.status === 500) {
                                document.getElementById('loading').setAttribute('style', 'display: none')
                                //console.log('500')
                                this.flash('Internal server error', 'error');
                            }
                            if (error.response.status === 422) {
                                if (error.response.data.name && error.response.data.name.length > 0) {
                                    this.planError = error.response.data.name[0]
                                }
                            }
                            if (error.response.status === 422) {
                                if (error.response.data.guard_name && error.response.data.guard_name.length > 0) {
                                    this.planError = error.response.data.guard_name[0]
                                }
                            }
                        })
                }
            }
        }
    }
</script>