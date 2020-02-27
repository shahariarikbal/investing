<template>
    <div>
        <div class="row">
            <div class="col-xl-12 text-xl-center" style="margin-bottom: 20px">
                <h4>Permissions</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3" style="border: 1px solid #aaa;padding: 10px 15px;" v-for="(permission, index) in permissions" :key="index">
                <h4>
                    <namespace-to-string :namespace="index" />
                    
                </h4>
                <div class="checkbox" v-for="pg in permission" :key="pg.id">
                    <permission :permission="pg" v-model="pg.checked" />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Permission from './../../../Packages/Permission.vue'
    import NamespaceToString from '@p/NamespaceToClassName'
    export default {
        props: ['permissions'],
        data () {
            return {
                permissionServices: [],
                permission: ''
            }
        },
        components: { Permission, NamespaceToString },
        created () {
            
        }
    }
</script>