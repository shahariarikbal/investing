<template>
    <div class="col-lg-12" style="position: relative;" id="create-role-modal-dialog" role="document">
        <div id="role-loading" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title text-white">Create role</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name"></label>
                        <input type="text" name="name" id="name" v-model="name" class="form-control" placeholder="Name">
                    <small class="text-danger"></small>
                </div>
                <permission-group :permissions="newPermissions"></permission-group>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <button class="btn btn-danger" data-dismiss="modal" @click="close">Close</button>
                <button class="btn btn-success" @click="create">Create</button>
            </div>
        </div>
    </div>
  
</template>

<script>
    import PermissionGroup from './PermissionGroup.vue'
    export default {
        data () {
            return {
                
                newPermissions: [],
                name: '',
                permissions: [],

                checkedPermission: [],

                guard_name: '',
                role_name: '',
                errorCount: 0,
                nameError: '',
            }
        },
        components: { PermissionGroup },
        created () {
            axios.get('/xhr/admin/settings/role-management/permissions')
                .then(response => {
                    this.newPermissions = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },

        methods: {
            resetError () {
                this.errorCount = 0
                this.nameError =''
                this.permissionError = ''
            },
            close () {
                this.$router.push({ name: 'roles' })
            },

            create () {
                this.resetError()

                // validation
                // check Name length
                if (this.name.length === 0) {
                    this.nameError = 'Name field is required'
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
                axios.post('/xhr/admin/settings/role-management', {
                    name: this.name,
                    permissions: checkedPermissions,
                })
                .then(response => {
                    if (response.status === 201) {
                        this.name = ''
                        this.permission = ''
                    }
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    }
    
</script>