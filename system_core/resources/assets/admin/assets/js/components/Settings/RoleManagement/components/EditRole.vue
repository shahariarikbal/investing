<template>
    <div class="modal fade show" style="display: block" id="edit-admin-role-management-modal" role="dialog" aria-labelledby="edit-admin-role-management-modal">
        
        <div class="modal-dialog modal-xl" style="position: relative;" id="edit-role-modal-dialog" role="document">
            <div id="edit-loading" style="display: none">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title text-white">Edit Role</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"></label>
                        <input type="text" name="name" id="name" v-model="name" class="form-control" placeholder="Name">
                        <small class="text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button class="btn btn-success">update</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    
</script>