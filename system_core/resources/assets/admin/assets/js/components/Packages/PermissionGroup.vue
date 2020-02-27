<template>
    <div class="form-group row" style="margin-top: 20px">
        <div class="col-xl-12 text-xl-center" style="margin-bottom: 20px">
            <h4>Permissions</h4>
            <!-- <small class="text-danger" v-text="checkedPermissionError"></small> -->
        </div>
        <div class="col-xl-12 cursor-pointer" style="display: flex; justify-content: space-between">
            <div v-for="(pg, index) in permissions" :key="index">

                <h5>{{ index }}</h5>

                <permission v-for="permission in pg" :key="permission.id" :permission="permission"  v-model="permission.checked" />
            </div>
        </div>
    </div>
</template>

<script>
    import Permission from './Permission'

    export default {
        props: ['permissions'],
        components: { Permission },
        data() {
            return {

            }
        },

        methods: {
            groupTitle(key) {

            }
        }
    }
</script>