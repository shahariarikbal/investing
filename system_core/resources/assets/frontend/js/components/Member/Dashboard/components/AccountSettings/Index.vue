<template>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" id="seconddiv">
        <div class="nav nav-pills mb-2 text-uppercase" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="background: #f7f7f7;">
            <RouterLink :to="{ name: 'profile' }" class="nav-link">
                Profile Setting
            </RouterLink>
            <RouterLink :to="{ name: 'change-password' }" class="nav-link">
                Change Password
            </RouterLink>
            <RouterLink :to="{ name: 'service-settings' }" class="nav-link">
                Service Setting
            </RouterLink>
            <!-- <a class="nav-link active show" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile Setting</a>
            <a class="nav-link" id="v-pills-email-tab" data-toggle="pill" href="#v-pills-email" role="tab" aria-controls="v-pills-email" aria-selected="false">Change Password</a>
            <a class="nav-link" id="v-pills-membership-tab" data-toggle="pill" href="#v-pills-membership" role="tab" aria-controls="v-pills-membership" aria-selected="false">Service Setting</a> -->
        </div>
        <div class="tab-content bg-white drop-shadow" id="v-pills-tabContent">
            <RouterView />
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .nav-link.router-link-exact-active.router-link-active {
        background: #05050e;
        color: white;
    }
</style>