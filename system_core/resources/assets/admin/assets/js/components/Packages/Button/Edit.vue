<template>
    <div>
        <a @click="emitPackageEditDataFetch" :href="'/admin/package/' + package_id + '/edit'" data-toggle="modal" data-target=".editPackageModal" class="btn btn-warning tipso m-t-20 edit" data-background="#ffa000" data-tipso="Click to edit" data-position="bottom">
            <i class="fa fa-edit"></i>
        </a>
    </div>
</template>

<script>
    export default {
        props: [ 'package_id' ],
        methods: {
            emitPackageEditDataFetch () {
                EventBus.$emit('package-edit-data-fetch', this.package_id)
            }
        }
    }
</script>