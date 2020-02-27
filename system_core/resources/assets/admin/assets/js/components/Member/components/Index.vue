<template>
    <div class="col-xl-12 col-lg-12 col-md-12">
        <flash-message class="flash-message"></flash-message>
        <div class="card">
            <div class="card-header bg-white">
                Members Table
            </div>
            <RouterView />
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .flash-message {
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 1051;
    }
</style>