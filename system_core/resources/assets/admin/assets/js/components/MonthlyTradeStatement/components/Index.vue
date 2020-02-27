<template>
    <div class="row sales_section">
        <flash-message class="flash-message"></flash-message>
        <RouterLink 
            class="col-xl-6 col-sm-6 col-12"
            :to="{ name: 'fund-management-monthly-trade-statement' }"
            >
            <div class="card p-d-15">
                <div class="sales_icons">
                    <span class="bg-danger"></span>
                    <i class="fa fa-bar-chart"></i>
                </div>
                <div>
                    <h5 class="sales_orders text-right m-t-5">Monthly Trade Statement</h5>
                    <h1 class="sales_number m-t-15 text-right">Fund Management</h1>
                    <p class="sales_text">
                        <span class="pull-right"><i class="fa fa-caret-down text-danger font_18 m-r-5"></i></span>
                    </p>
                </div>
            </div>
        </RouterLink>
        
        <div class="col-xl-12 col-lg-12 col-md-12" style="margin-top: 10px">
            <RouterView />
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                
            }
        }
    }
</script>

<style lang="scss" scoped>
    .flash-message {
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 1051;
    }
</style>