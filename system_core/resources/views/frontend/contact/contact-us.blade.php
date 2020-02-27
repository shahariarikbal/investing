@extends('frontend.layouts-v2.master')
@section('support-active', 'active')
@section('style')
<style>
    .contact-bg:after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        display: inline-block;
        background: -moz-linear-gradient(top, rgba(0, 47, 75, 0.5) 0%, rgba(220, 66, 37, 0.5) 100%);
        /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(220, 66, 37, 0.5)), color-stop(100%, rgba(0, 47, 75, 0.5)));
        /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top, rgba(0, 47, 75, 0.5) 0%, rgba(220, 66, 37, 0.5) 100%);
        /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top, rgba(25, 26, 27, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%);
        /* Opera 11.10+ */
        background: -ms-linear-gradient(top, rgba(25, 26, 27, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%);
        /* IE10+ */
        background: linear-gradient(to bottom, rgba(25, 26, 27, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#002f4b', endColorstr='#00000000', GradientType=0);
        /* IE6-9 */
    }

    .middle-text p {
        color: #ffffff;
        margin: 20px 0 0 0;
        font-style: italic;
        font-weight: 400;
    }

    .middle-text p:before,
    .middle-text p:after {
        opacity: 1;
    }

    .middle-text p:before {
        margin-right: 20px;
    }
</style>
@endsection

@section('bottom-script')
<!-- Ticker -->
<script src="{{ asset('/assets/') }}/js/jquery.carouselTicker.js"></script>
<script async src="{{ asset('/assets/') }}/js/start.js"></script>
<!-- Owl Carousel Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('/assets/') }}/js/scripts.js"></script>
<script>
    var captchaApproved = false;

    function makeCaptchaApproved() {
        captchaApproved = true;
    }

    document.getElementById('contact').addEventListener('click', function() {

        var error = 0;
        document.getElementById('department_error').innerHTML = '';
        document.getElementById('priority_error').innerHTML = '';
        document.getElementById('name_error').innerHTML = '';
        document.getElementById('email_error').innerHTML = '';
        document.getElementById('phone_error').innerHTML = '';
        // document.getElementById('address_error').innerHTML = '';
        document.getElementById('subject_error').innerHTML = '';
        document.getElementById('message_error').innerHTML = '';
        document.getElementById('recaptcha_error').innerHTML = '';

        // initialize loading effect
        var height = parseInt(document.getElementById('contactForm').offsetHeight)

        var padding = (height - 40) / 2

        var loadingStyle = `height: ${height}px; text-align: center; padding: ${padding}px 80px;background: rgba(35, 35, 35, 0.26) none repeat scroll 0% 0%; position: absolute; z-index: 2;width: 100%;top: 0;left:0`

        document.getElementById('form-loading').setAttribute('style', loadingStyle)

        if (document.getElementById('department').value.length === 0) {
            document.getElementById('department_error').innerHTML = 'Department is required';
            error++
        }

        if (document.getElementById('priority').value.length === 0) {
            document.getElementById('priority_error').innerHTML = 'Priority is required';
            error++
        }

        if (document.getElementById('name').value.length === 0) {
            document.getElementById('name_error').innerHTML = 'Name is required';
            error++
        }

        if (document.getElementById('email').value.length === 0) {
            document.getElementById('email_error').innerHTML = 'Email is required';
            error++
        }

        var pattern = new RegExp(/^\w+([\.-]?\w+)+@\w+([\.:]?\w+)+(\.[a-zA-Z0-9]{2,3})+$/);

        if (document.getElementById('email').value.match(pattern) === null) {
            document.getElementById('email_error').innerHTML = 'Valid email required';
            error++;
        }

        if (document.getElementById('phone').value.length === 0) {
            document.getElementById('phone_error').innerHTML = 'Phone number is required';
            error++
        }


        // if (document.getElementById('address').value.length === 0) {
        //     document.getElementById('address_error').innerHTML = 'Address is required';
        //     error++
        // }

        if (document.getElementById('subject').value.length === 0) {
            document.getElementById('subject_error').innerHTML = 'Subject is required';
            error++
        }

        if (document.getElementById('message').value.length === 0) {
            document.getElementById('message_error').innerHTML = 'Message is required';
            error++
        }

        if (captchaApproved === false) {
            document.getElementById('recaptcha_error').innerHTML = 'Recaptcha validation required';
            error++
        }

        if (error > 0) {
            document.getElementById('form-loading').setAttribute('style', 'display: none')
        }

        var data = {
            department: document.getElementById('department').value,
            priority: document.getElementById('priority').value,
            name: document.getElementById('name').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            // address:    document.getElementById('address').value,
            subject: document.getElementById('subject').value,
            message: document.getElementById('message').value
        }

        if (error === 0 && captchaApproved) {
            axios.post('/customer/contact/mail', data)
                .then(response => {
                    if (response.status === 200) {
                        setTimeout(function() {
                            window.location.reload(true)
                        }, 3000);
                        document.getElementById('form-loading').setAttribute('style', 'display: none')
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-success")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode(response.data.message)
                        div.appendChild(txt)

                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("success_message").appendChild(div)

                        document.getElementById('department').value = ''
                        document.getElementById('priority').value = ''
                        document.getElementById('name').value = ''
                        document.getElementById('email').value = ''
                        document.getElementById('phone').value = ''
                        // document.getElementById('address').value = ''
                        document.getElementById('subject').value = ''
                        document.getElementById('message').value = ''
                    }
                }).catch(error => {
                    console.log(error)
                    if (error.response.status === 422 || error.response.status === 500) {
                        document.getElementById('form-loading').setAttribute('style', 'display: none')
                        let div = document.createElement("div")
                        div.setAttribute("class", "alert alert-danger")
                        div.setAttribute("role", "alert")
                        let txt = document.createTextNode('Something is wrong. please try again, Your data is unprocessing')
                        div.appendChild(txt)

                        document.getElementById('success_message').innerHTML = ''
                        document.getElementById('error_message').innerHTML = ''
                        document.getElementById("error_message").appendChild(div)

                        document.getElementById('department_error').innerHTML = error.response.data.error.department_error[0]
                        document.getElementById('priority_error').innerHTML = error.response.data.error.priority_error[0]
                        document.getElementById('name_error').innerHTML = error.response.data.error.name_error[0]
                        document.getElementById('email_error').innerHTML = error.response.data.error.email_error[0]
                        document.getElementById('phone_error').innerHTML = error.response.data.error.phone_error[0]
                        // document.getElementById('address_error').innerHTML      = error.response.data.error.address_error[0]
                        document.getElementById('subject_error').innerHTML = error.response.data.error.subject_error[0]
                        document.getElementById('message_error').innerHTML = error.response.data.error.message_error[0]
                    }
                })
        }

    });
</script>
@endsection

@section('content')
<div id="app"></div>
@include('frontend.layouts.includes.trading-ticker')
<section class="header-with-pic contact-bg">
    <div class="middle-text">
        <h2>CONTACT US</h2>
        <p>We are at the forefront of innovation. <br />Discover with us the possibilities of your next dream.</p>
    </div>
</section>
<section class="contact-header">
    <div class="company-content container-fluid career">
        <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 contact-div">
                <div class="contact-icon">
                    <img src="assets/images/contact/smartphone-call.png">
                </div>
                <div class="icon-title">PHONE</div>
                <div class="contact-detail">
                    <p>SVG Office : +442032393863</p>
                    <p>Dubai Office : 072042799</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 contact-div">
                <div class="contact-icon">
                    <img src="assets/images/contact/place.png">
                </div>
                <div class="icon-title">SVG Office</div>
                <p class="ltd">Global Intergrated Capitech Markets Ltd.</p>
                <div class="contact-detail">
                    <p>Shamrock Lodge</p>
                    <p>Murray Road, Kingstown</p>
                    <p>St. Vincent and The Grenadines</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 contact-div">
                <div class="contact-icon">
                    <img src="assets/images/contact/place.png">
                </div>
                <div class="icon-title">Dubai, Office</div>
                <p class="ltd">Global Intergrated Capitech Markets Ltd.</p>
                <div class="contact-detail">
                    <p>Business Center-4 ( 8th Floor)</p>
                    <p>P.O. Box 325 782</p>
                    <p>Ras Al Khaimah, United Arab Emirates</p>
                    <p>Fax: 072041010</p>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 contact-div">
                <div class="contact-icon">
                    <img src="assets/images/contact/envelope.png">
                </div>
                <div class="icon-title">Email</div>
                <div class="contact-detail">
                    <p>support@gicmarkets.com</p>
                    <p>help@gicmarkets.net</p>
                    <p>info@gicmarkets.net </p>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="contact-form-main pt-0 pb-0 mb-5">

    <div class="container text-left">
        <div class="row">
            <div class="col-md-12 text-center" id="success_message"></div>
            <div class="col-md-12 text-center" id="error_message"></div>
        </div>
        <br />
        <br />
        <h3 class="mb-5">IF YOU GOT ANY QUESTIONS PLEASE DO NO HESITATE TO CONTACT US</h3>
        <form method="post" class="" id="contactForm" style="position: relative;">
            <div id="form-loading" style="display: none">
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
            </div>
            @csrf
            <div class="form-group">
                <div class="select-div">
                    <select name="department" id="department" class="form-control">
                        <option value="" disabled="disabled" selected="selected" hidden="hidden">Select a Department</option>
                        <option value="1">General Enquiries</option>
                        <option value="2">Signal Service</option>
                        <option value="3">Copytrade Service</option>
                        <option value="4">Fund Management Service</option>
                        <option value="5">FX Consultancy Service</option>
                        <option value="6">Broker Review Submission</option>
                    </select>
                </div>
                <small id="department_error" style="color: red;"></small>
            </div>
            <div class="form-group">
                <div class="select-div">
                    <select name="priority" id="priority" class="form-control">
                        <option value="" disabled="disabled" selected="selected" hidden="hidden">Select a Priority</option>
                        <option value="7">High</option>
                        <option value="8">Medium</option>
                        <option value="9">Low</option>
                    </select>
                </div>
                <small id="priority_error" style="color: red;"></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                <small id="name_error" style="color: red;"></small>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                <small id="email_error" style="color: red;"></small>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                <small id="phone_error" style="color: red;"></small>
            </div>
            <!-- <div class="form-group">
                    <textarea type="text" class="form-control" rows="3" name="address" id="address" placeholder="Address"></textarea>
                    <small id="address_error" style="color: red;"></small>
                </div> -->
            <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                <small id="subject_error" style="color: red;"></small>
            </div>
            <div class="form-group">
                <textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
                <small id="message_error" style="color: red;"></small>
            </div>
            <script src='https://www.google.com/recaptcha/api.js?render=v3_site_key'></script>
            @if(env('GOOGLE_RECAPTCHA_KEY'))
            <div class="g-recaptcha" id="recaptcha" name="g-recaptcha-response" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}" data-callback="makeCaptchaApproved"></div>
            <small id="recaptcha_error" style="color: red;"></small>
            @endif
            <br />
            <div class="col-md-12">
                <input type="button" id="contact" name="contact" class="btn btn-success custom-btn radius-2px" value="Send Message">
            </div>
        </form>
    </div>
</section>
<section class="address-map">
    <div class="map-container">
        <div class="map-shadow"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3885.0500262195796!2d-61.22327608611501!3d13.159244514295702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c475159ce0ae9dd%3A0x3c836838cc979bc3!2sGrand+Finance!5e0!3m2!1sen!2sbd!4v1542878785316" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</section>

<!-- Share Float -->
<div class="floating-share">
    <div class="social-shares"></div>
</div>

@endsection