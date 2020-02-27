<template>
    <div>
        <div class="row">
            <div class="col">
                <div class="drop-shadow">
                    <div class="d-flex flex-column justify-content-center align-items-center mb-3 fs-12" style="margin-top:-60px;">
                        <div>
                            <img :src="`${InvestingPartner}/assets/images/team3.jpg`" alt="Profile Image" class="img-thumbnail mb-2">
                        </div>
                        <div>
                            <span class="my-online">Online</span>
                        </div>
                        <div>
                            <span>@vonrueden.brandyn</span>
                            <img :src="`${InvestingPartner}/assets/images/membership.png`" width="42" height="42" alt="membership-image" data-toggle="tooltip" data-placement="top" title="PROFESSIONAL SERVICE PRO">
                        </div>
                        <div>
                            <span class="mr-1">Suite 674, NC,</span>
                            <span class="mr-1">Edna</span>
                        </div>
                        <div>
                            <span class="mr-1">
                                <img :src="`${InvestingPartner}/assets/images/flag/country/us.png`" width="24" alt="us-flag">
                            </span>
                            <span class="mr-1">United States</span>
                        </div>
                        <div>
                            <span class="mr-1">Member since Jul 3, 2019</span>
                        </div>
                        <div>
                            <span class="mr-1">0 recommendation</span>
                        </div>
                    </div>
                    <div id="accordion" class="faq_content left_menu pro-left-nav">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h6 class="mb-0"> <a class="collapse" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Activate New Services</a> </h6>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li><a href="signal-pre.html">Premium Signal</a></li>
                                        <li><a href="copytrade.html">Copytrade Service</a></li>
                                        <li><a href="fund-manage.html">Fund Management</a></li>
                                        <li><a href="forex-mentor.html">Forex Mentorship</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTen">
                                <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">financial dashboard</a> </h6>
                            </div>
                            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li>
                                            <RouterLink :to="{ name: 'dashboard' }" class="nav-link my-project-link">
                                                Dashboard
                                            </RouterLink>
                                        </li>
                                        <li><a href="money.html">Money In/Out</a></li>
                                        <li><a href="transition.html">transition history </a></li>
                                        <li><a href="billing-manage.html">manage invoice</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="affiliation.html" class="single-link">Affiliate Program </a>
                        <a href="account-settings.html" class="single-link">Account Settings</a>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <h6 class="mb-0"> <a class="collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Support Dipartment</a> </h6>
                            </div>
                            <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordion">
                                <div class="card-body">
                                    <ul>
                                        <li><a href="support-ticket.html">Support Ticket</a></li>
                                        <li><a href="support-faq.html">Support FAQ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="nav nav-pills mb-2 text-uppercase" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="background: #f7f7f7;">
                    <a class="nav-link active show" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile Setting</a>
                    <a class="nav-link" id="v-pills-email-tab" data-toggle="pill" href="#v-pills-email" role="tab" aria-controls="v-pills-email" aria-selected="false">Change Password</a>
                    <a class="nav-link" id="v-pills-membership-tab" data-toggle="pill" href="#v-pills-membership" role="tab" aria-controls="v-pills-membership" aria-selected="false">Service Setting</a>
                </div>
                <div class="tab-content bg-white drop-shadow" id="v-pills-tabContent">
                    <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <div class="form-row mb-5">
                            <div class="form-group col-md-12 text-center">
                                <div class="avatar-wrapper mt-5 mb-1">
                                    <img class="profile-pic" src="">
                                    <div class="upload-button">
                                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    </div>
                                    <input class="file-upload" type="file" accept="image/*">
                                </div>
                                <div class="text-center">
                                    <span class="text-info">Marcus Doe</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 is-empty">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control" id="firstName">
                            </div>
                            <div class="form-group col-md-6 is-empty">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 is-empty">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4">
                            </div>
                            <div class="form-group col-md-6 is-empty">
                                <label for="phoneNumber">Phone Number</label>
                                <input type="number" class="form-control" id="phoneNumber">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Country Name</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Select Country</option>
                                    <option>Australia</option>
                                    <option>USA</option>
                                    <option>South Africa</option>
                                    <option>United Kingdom</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 is-empty">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected="">Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 is-empty">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phoneNumber">Gender</label>
                                <div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-group is-empty">
                                    <label for="exampleFormControlTextarea1">My Bio</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-email" role="tabpanel" aria-labelledby="v-pills-email-tab">
                        <div class="form-row mt-1">
                            <div class="form-group col-md-6 is-empty">
                                <label for="">Current Password</label>
                                <input type="text" class="form-control" id="#">
                            </div>
                            <div class="form-group col-md-6 is-empty">
                                <label for="">New Password</label>
                                <input type="text" class="form-control" id="#">
                            </div>
                            <div class="form-group col-md-6 is-empty">
                                <label for="">Retype Password</label>
                                <input type="text" class="form-control" id="#">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-membership" role="tabpanel" aria-labelledby="v-pills-membership-tab">
                        <div class="form-row mt-1">
                            <div class="form-group col-md-6 is-empty">
                                <label for="changeEmail">Change Email Address</label>
                                <input type="email" class="form-control" id="changeEmail">
                            </div>
                            <div class="form-group col-md-6 is-empty">
                                <label for="cancelrequest">Cancelation Request</label>
                                <input type="text" class="form-control" id="cancelrequest">
                            </div>
                        </div>
                    </div>
                    <div class="bg-white text-center">
                        <a href="#" type="submit" class="btn btn-dark btn-lg">Save</a>
                    </div>
                </div>
            </div>
        </div>
        <RouterView />
    </div>
</template>

<script>
    export default {
        name: 'profile'
    }
</script>