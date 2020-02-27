<template>
    <div class="card">
        <flash-message class="flash-message"></flash-message>
        <div class="card-header bg-white">
            Permission Management
            <RouterLink 
                class="btn btn-raised btn-success btn-sm float-right"
                :to="{ name: 'create-permission' }">
                create
            </RouterLink>
        </div>
        
        <div class="card-body card_block_top_align ">
            <RouterView/>
        </div>
    </div>
</template>
<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
    .flash-message {
        position: fixed;
        right: 0;
        z-index: 1051;
    }
</style>