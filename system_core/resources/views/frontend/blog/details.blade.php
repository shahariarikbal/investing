@extends('frontend.layouts-v2.master')

@section('blog-active', 'active')

@section('fb-sdk')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId={{ env('FACEBOOK_APP_ID') }}&autoLogAppEvents=1"></script>
@endsection

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/top-forex-broker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/advertisement.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/recent-closed-trade.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/recent-analysis.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/analysis-index.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/small-advertisements.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/article-section.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('/css/article-carousel.css') }}" />
<style>
.faq_content .card {
    margin-bottom: 5px;
}
.card.card-forex-head {
    margin-bottom: 5px;
}
.faq_content .heading-card span {
    background-color: #212529;
    color: #ffffff;
    display: block;
    padding: 10px 15px;
    margin-bottom: 5px;
    font-size: 22px;
    text-align: center;
    text-transform: uppercase;
    font-weight: 500;
    letter-spacing: 1px;
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
/**
     * Forex Brokers Switechers JS
     */
    function topForexBroker() {
        var x = document.getElementById("topForexBroker");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function advertisement() {
        var x = document.getElementById("advertisement");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function recentClosedTrade() {
        var x = document.getElementById("recent-closed-trade");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function marketAnalysis() {
        var x = document.getElementById("marketAnalysis");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function smallAdvertisement() {
        var x = document.getElementById("smallAdvertisement");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    function relatedBlogPost() {
        var x = document.getElementById("relatedBlogPost");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

<script>
    let appName = "{{ env('APP_NAME') }}"
    let contentId = location.href.split('/')[5].split('~')[0]
    let isLiked = localStorage.getItem(`${appName}.${contentId}.like`) ? true : false

    
    if (isLiked) {
        document.getElementById("liked").style.display = 'block'
        document.getElementById("not-liked").style.display = 'none'
    } else {
        document.getElementById("liked").style.display = 'none'
        document.getElementById("not-liked").style.display = 'block'
    }

    //add liked
    let isLikeClicked = false;
    document.getElementById('not-liked').addEventListener('click', function () {
        if(isLikeClicked) {
            return
        }
        isLikeClicked = true;
        axios.post(`${InvestingPartner.app_url}/blog/like/${contentId}`)
            .then(response => {
                console.log(response)
                
                if (response.status === 201) {
                    // store into localstorage
                    localStorage.setItem(`${appName}.${contentId}.like`, response.data.key)

                    let like_count = document.getElementsByClassName("like-count")
                    for (var f = 0; f <= like_count.length - 1; f++) {
                        like_count[f].innerHTML = response.data.count
                    }
                    
                    // display/hide new state button
                    document.getElementById("liked").style.display = 'block'
                    document.getElementById("not-liked").style.display = 'none'
                }

                isLikeClicked = false
            })
            .catch(error => {
                console.log(error)
            })
    })
    
    // remove liked
    document.getElementById('liked').addEventListener('click', function () {
        axios.delete(`${InvestingPartner.app_url}/blog/unlike/${contentId}/${localStorage.getItem(`${appName}.${contentId}.like`)}`)
            .then(response => {
                console.log(response)
                if (response.status === 200) {
                    // remove from localstorage
                    localStorage.removeItem(`${appName}.${contentId}.like`)

                    let like_count = document.getElementsByClassName("like-count")
                    for (var f = 0; f <= like_count.length - 1; f++) {
                        like_count[f].innerHTML = response.data.count
                    }
                    
                    // display/hide new state button
                    document.getElementById("liked").style.display = 'none'
                    document.getElementById("not-liked").style.display = 'block'
                }
            })
            .catch(error => {
                console.log(error)
            })
    });

</script>



    <script>
        let app_name = "{{ env('APP_NAME') }}"
        let ratingKey = localStorage.getItem(`${app_name}.${location.href.split('/')[5].split('~')[0]}.rating`)
        if (ratingKey) {
            let endpoint = `${InvestingPartner.app_url}/blog/rating/${location.href.split('/')[5]}/${ratingKey}`
            axios.get(endpoint)
                .then(response => {
                    let rating = parseInt(response.data.rating)
                    document.getElementById("rating-value").innerHTML = `${response.data.rating}.0`

                    if (rating === 5) {
                        document.getElementById("rate_1").setAttribute("checked", true)
                        document.getElementById("label_rate_1").style.color = "#E8A403"

                        document.getElementById("rate_2").setAttribute("checked", true)
                        document.getElementById("label_rate_2").style.color = "#E8A403"

                        document.getElementById("rate_3").setAttribute("checked", true)
                        document.getElementById("label_rate_3").style.color = "#E8A403"

                        document.getElementById("rate_4").setAttribute("checked", true)
                        document.getElementById("label_rate_4").style.color = "#E8A403"

                        document.getElementById("rate_5").setAttribute("checked", true)
                        document.getElementById("label_rate_5").style.color = "#E8A403"
                    }

                    if (rating === 4) {
                        document.getElementById("rate_1").setAttribute("checked", true)
                        document.getElementById("label_rate_1").style.color = "#E8A403"

                        document.getElementById("rate_2").setAttribute("checked", true)
                        document.getElementById("label_rate_2").style.color = "#E8A403"

                        document.getElementById("rate_3").setAttribute("checked", true)
                        document.getElementById("label_rate_3").style.color = "#E8A403"

                        document.getElementById("rate_4").setAttribute("checked", true)
                        document.getElementById("label_rate_4").style.color = "#E8A403"

                        if (document.getElementById("rate_5").hasAttribute('checked')) {
                            document.getElementById("rate_5").removeAttribute("checked")
                            document.getElementById("label_rate_5").style.color = "#DDDDDD"
                        }
                    }

                    if (rating === 3) {
                        document.getElementById("rate_1").setAttribute("checked", true)
                        document.getElementById("label_rate_1").style.color = "#E8A403"

                        document.getElementById("rate_2").setAttribute("checked", true)
                        document.getElementById("label_rate_2").style.color = "#E8A403"

                        document.getElementById("rate_3").setAttribute("checked", true)
                        document.getElementById("label_rate_3").style.color = "#E8A403"

                        if (document.getElementById("rate_4").hasAttribute('checked')) {
                            document.getElementById("rate_4").removeAttribute("checked")
                            document.getElementById("label_rate_4").style.color = "#DDDDDD"
                        }

                        if (document.getElementById("rate_5").hasAttribute('checked')) {
                            document.getElementById("rate_5").removeAttribute("checked")
                            document.getElementById("label_rate_5").style.color = "#DDDDDD"
                        }
                    }

                    if (rating === 2) {
                        document.getElementById("rate_1").setAttribute("checked", true)
                        document.getElementById("label_rate_1").style.color = "#E8A403"

                        document.getElementById("rate_2").setAttribute("checked", true)
                        document.getElementById("label_rate_2").style.color = "#E8A403"

                        if (document.getElementById("rate_3").hasAttribute('checked')) {
                            document.getElementById("rate_3").removeAttribute("checked")
                            document.getElementById("label_rate_3").style.color = "#DDDDDD"
                        }

                        if (document.getElementById("rate_4").hasAttribute('checked')) {
                            document.getElementById("rate_4").removeAttribute("checked")
                            document.getElementById("label_rate_4").style.color = "#DDDDDD"
                        }

                        if (document.getElementById("rate_5").hasAttribute('checked')) {
                            document.getElementById("rate_5").removeAttribute("checked")
                            document.getElementById("label_rate_5").style.color = "#DDDDDD"
                        }
                    }

                    if (rating === 1) {
                        document.getElementById("rate_1").setAttribute("checked", true)
                        document.getElementById("label_rate_1").style.color = "#E8A403"

                        if (document.getElementById("rate_2").hasAttribute('checked')) {
                            document.getElementById("rate_2").removeAttribute("checked")
                            document.getElementById("label_rate_2").style.color = "#DDDDDD"
                        }

                        if (document.getElementById("rate_3").hasAttribute('checked')) {
                            document.getElementById("rate_3").removeAttribute("checked")
                            document.getElementById("label_rate_3").style.color = "#DDDDDD"
                        }

                        if (document.getElementById("rate_4").hasAttribute('checked')) {
                            document.getElementById("rate_4").removeAttribute("checked")
                            document.getElementById("label_rate_4").style.color = "#DDDDDD"
                        }

                        if (document.getElementById("rate_5").hasAttribute('checked')) {
                            document.getElementById("rate_5").removeAttribute("checked")
                            document.getElementById("label_rate_5").style.color = "#DDDDDD"
                        }
                    }
                })
                .catch(error => {
                    console.log(error)
                })
        };

        let labels = ["label_rate_1", "label_rate_2", "label_rate_3", "label_rate_4", "label_rate_5"]

        for (var i = 0; i <= labels.length - 1; i++) {
            // console.log(document.getElementById(labels[i]))

            document.getElementById(labels[i]).addEventListener('mouseover', function() {
                var key = parseInt(this.getAttribute('data-value'))

                if (key === 1) {
                    document.getElementById("label_rate_1").style.color = "#E8A403"
                }
                if (key === 2) {
                    document.getElementById("label_rate_1").style.color = "#E8A403"
                    document.getElementById("label_rate_2").style.color = "#E8A403"
                }
                if (key === 3) {
                    document.getElementById("label_rate_1").style.color = "#E8A403"
                    document.getElementById("label_rate_2").style.color = "#E8A403"
                    document.getElementById("label_rate_3").style.color = "#E8A403"
                }
                if (key === 4) {
                    document.getElementById("label_rate_1").style.color = "#E8A403"
                    document.getElementById("label_rate_2").style.color = "#E8A403"
                    document.getElementById("label_rate_3").style.color = "#E8A403"
                    document.getElementById("label_rate_4").style.color = "#E8A403"
                }
                if (key === 5) {
                    document.getElementById("label_rate_1").style.color = "#E8A403"
                    document.getElementById("label_rate_2").style.color = "#E8A403"
                    document.getElementById("label_rate_3").style.color = "#E8A403"
                    document.getElementById("label_rate_4").style.color = "#E8A403"
                    document.getElementById("label_rate_5").style.color = "#E8A403"
                }
            });

            document.getElementById(labels[i]).addEventListener('mouseout', function() {
                var key = parseInt(this.getAttribute('data-value'))

                if (key === 1) {
                    if (!document.getElementById("rate_1").hasAttribute("checked")) {
                        document.getElementById("label_rate_1").style.color = "#DDDDDD"
                    }
                }
                if (key === 2) {
                    if (!document.getElementById("rate_1").hasAttribute("checked")) {
                        document.getElementById("label_rate_1").style.color = "#DDDDDD"
                    }
                    if (!document.getElementById("rate_2").hasAttribute("checked")) {
                        document.getElementById("label_rate_2").style.color = "#DDDDDD"
                    }
                }
                if (key === 3) {
                    if (!document.getElementById("rate_1").hasAttribute("checked")) {
                        document.getElementById("label_rate_1").style.color = "#DDDDDD"
                    }
                    if (!document.getElementById("rate_2").hasAttribute("checked")) {
                        document.getElementById("label_rate_2").style.color = "#DDDDDD"
                    }
                    if (!document.getElementById("rate_3").hasAttribute("checked")) {
                        document.getElementById("label_rate_3").style.color = "#DDDDDD"
                    }
                }
                if (key === 4) {
                    if (!document.getElementById("rate_1").hasAttribute("checked")) {
                        document.getElementById("label_rate_1").style.color = "#DDDDDD"
                    }
                    if (!document.getElementById("rate_2").hasAttribute("checked")) {
                        document.getElementById("label_rate_2").style.color = "#DDDDDD"
                    }
                    if (!document.getElementById("rate_3").hasAttribute("checked")) {
                        document.getElementById("label_rate_3").style.color = "#DDDDDD"
                    }
                    if (!document.getElementById("rate_4").hasAttribute("checked")) {
                        document.getElementById("label_rate_4").style.color = "#DDDDDD"
                    }
                }
                if (key === 5) {
                    if (!document.getElementById("rate_1").hasAttribute("checked")) {
                        document.getElementById("label_rate_1").style.color = "#DDDDDD"
                    }
                    if (!document.getElementById("rate_2").hasAttribute("checked")) {
                        document.getElementById("label_rate_2").style.color = "#DDDDDD"
                    }
                    if (!document.getElementById("rate_3").hasAttribute("checked")) {
                        document.getElementById("label_rate_3").style.color = "#DDDDDD"
                    }
                    if (!document.getElementById("rate_4").hasAttribute("checked")) {
                        document.getElementById("label_rate_4").style.color = "#DDDDDD"
                    }
                    if (!document.getElementById("rate_5").hasAttribute("checked")) {
                        document.getElementById("label_rate_5").style.color = "#DDDDDD"
                    }
                }
            });

            document.getElementById(labels[i]).addEventListener('click', function() {

                let rating = this.getAttribute('data-value')
                let app_name = "{{ env('APP_NAME') }}"
                let endpoint = `${InvestingPartner.app_url}/blog/rating/${location.href.split('/')[5].split('~')[0]}`
                let ratingKey = localStorage.getItem(`${app_name}.${location.href.split('/')[5]}.rating`)
                if (ratingKey) {
                    endpoint = `${endpoint}/${ratingKey}`
                }
                axios.post(endpoint, {
                        rating: rating
                    })
                    .then(response => {
                        if (response.status === 201) {
                            localStorage.setItem(`${app_name}.${location.href.split('/')[5].split('~')[0]}.rating`, response.data.key)
                        }
                        document.getElementById("rating-value").innerHTML = response.data.rating
                        document.getElementById("rating-average").innerHTML = response.data.average

                        let average = parseInt(response.data.average)

                        //console.log(average)

                        if (average === 5) {
                            document.getElementById("display_rating_1").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_2").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_3").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_4").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_5").setAttribute("class", "fas fa-star")
                        }

                        if (average === 4) {
                            document.getElementById("display_rating_1").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_2").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_3").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_4").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_5").setAttribute("class", "far fa-star")
                        }

                        if (average === 3) {
                            document.getElementById("display_rating_1").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_2").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_3").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_4").setAttribute("class", "far fa-star")
                            document.getElementById("display_rating_5").setAttribute("class", "far fa-star")
                        }

                        if (average === 2) {
                            document.getElementById("display_rating_1").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_2").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_3").setAttribute("class", "far fa-star")
                            document.getElementById("display_rating_4").setAttribute("class", "far fa-star")
                            document.getElementById("display_rating_5").setAttribute("class", "far fa-star")
                        }

                        if (average === 1) {
                            document.getElementById("display_rating_1").setAttribute("class", "fas fa-star")
                            document.getElementById("display_rating_2").setAttribute("class", "far fa-star")
                            document.getElementById("display_rating_3").setAttribute("class", "far fa-star")
                            document.getElementById("display_rating_4").setAttribute("class", "far fa-star")
                            document.getElementById("display_rating_5").setAttribute("class", "far fa-star")
                        }

                        document.getElementById("rating-count").innerHTML = response.data.count

                        let rating = parseInt(response.data.rating)

                        if (rating === 5) {
                            document.getElementById("rate_1").setAttribute("checked", true)
                            document.getElementById("label_rate_1").style.color = "#E8A403"

                            document.getElementById("rate_2").setAttribute("checked", true)
                            document.getElementById("label_rate_2").style.color = "#E8A403"

                            document.getElementById("rate_3").setAttribute("checked", true)
                            document.getElementById("label_rate_3").style.color = "#E8A403"

                            document.getElementById("rate_4").setAttribute("checked", true)
                            document.getElementById("label_rate_4").style.color = "#E8A403"

                            document.getElementById("rate_5").setAttribute("checked", true)
                            document.getElementById("label_rate_5").style.color = "#E8A403"
                        }

                        if (rating === 4) {
                            document.getElementById("rate_1").setAttribute("checked", true)
                            document.getElementById("label_rate_1").style.color = "#E8A403"

                            document.getElementById("rate_2").setAttribute("checked", true)
                            document.getElementById("label_rate_2").style.color = "#E8A403"

                            document.getElementById("rate_3").setAttribute("checked", true)
                            document.getElementById("label_rate_3").style.color = "#E8A403"

                            document.getElementById("rate_4").setAttribute("checked", true)
                            document.getElementById("label_rate_4").style.color = "#E8A403"

                            if (document.getElementById("rate_5").hasAttribute('checked')) {
                                document.getElementById("rate_5").removeAttribute("checked")
                                document.getElementById("label_rate_5").style.color = "#DDDDDD"
                            }
                        }

                        if (rating === 3) {
                            document.getElementById("rate_1").setAttribute("checked", true)
                            document.getElementById("label_rate_1").style.color = "#E8A403"

                            document.getElementById("rate_2").setAttribute("checked", true)
                            document.getElementById("label_rate_2").style.color = "#E8A403"

                            document.getElementById("rate_3").setAttribute("checked", true)
                            document.getElementById("label_rate_3").style.color = "#E8A403"

                            if (document.getElementById("rate_4").hasAttribute('checked')) {
                                document.getElementById("rate_4").removeAttribute("checked")
                                document.getElementById("label_rate_4").style.color = "#DDDDDD"
                            }

                            if (document.getElementById("rate_5").hasAttribute('checked')) {
                                document.getElementById("rate_5").removeAttribute("checked")
                                document.getElementById("label_rate_5").style.color = "#DDDDDD"
                            }
                        }

                        if (rating === 2) {
                            document.getElementById("rate_1").setAttribute("checked", true)
                            document.getElementById("label_rate_1").style.color = "#E8A403"

                            document.getElementById("rate_2").setAttribute("checked", true)
                            document.getElementById("label_rate_2").style.color = "#E8A403"

                            if (document.getElementById("rate_3").hasAttribute('checked')) {
                                document.getElementById("rate_3").removeAttribute("checked")
                                document.getElementById("label_rate_3").style.color = "#DDDDDD"
                            }

                            if (document.getElementById("rate_4").hasAttribute('checked')) {
                                document.getElementById("rate_4").removeAttribute("checked")
                                document.getElementById("label_rate_4").style.color = "#DDDDDD"
                            }

                            if (document.getElementById("rate_5").hasAttribute('checked')) {
                                document.getElementById("rate_5").removeAttribute("checked")
                                document.getElementById("label_rate_5").style.color = "#DDDDDD"
                            }
                        }

                        if (rating === 1) {
                            document.getElementById("rate_1").setAttribute("checked", true)
                            document.getElementById("label_rate_1").style.color = "#E8A403"

                            if (document.getElementById("rate_2").hasAttribute('checked')) {
                                document.getElementById("rate_2").removeAttribute("checked")
                                document.getElementById("label_rate_2").style.color = "#DDDDDD"
                            }

                            if (document.getElementById("rate_3").hasAttribute('checked')) {
                                document.getElementById("rate_3").removeAttribute("checked")
                                document.getElementById("label_rate_3").style.color = "#DDDDDD"
                            }

                            if (document.getElementById("rate_4").hasAttribute('checked')) {
                                document.getElementById("rate_4").removeAttribute("checked")
                                document.getElementById("label_rate_4").style.color = "#DDDDDD"
                            }

                            if (document.getElementById("rate_5").hasAttribute('checked')) {
                                document.getElementById("rate_5").removeAttribute("checked")
                                document.getElementById("label_rate_5").style.color = "#DDDDDD"
                            }
                        }
                    })
                    .catch(error => {
                        console.log(error)
                    })
            });
        }
    </script>
@endsection

@section('content')
    <div id="app"></div>
    @include('frontend.layouts.includes.trading-ticker')
    <div class="mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 md-pr-1-half">

                    @include('frontend.layouts.includes.blog-catagory')
                  
                    @include('frontend.layouts.includes.side-advertise')
                
                    @include('frontend.partials.signals.topForexBroker')

                    @include('frontend.layouts.includes.side-advertise')

                    @include('frontend.layouts.includes.advertisement')
                </div>
                <div class="col-lg-6">
                    <section class="article-section" id="content-section">
                        <div>
                            <div class="row article-detials bg-white pb-3" id="initial-content">
                                <div class="col-md-12 p-0">
                                    <div class="title-bar">
                                        <h1>FX OFFICIAL Blog detail</h1>
                                    </div>
                                </div>
                                <div class="col-md-12 title-heading">
                                    <div>
                                        <h2>{{ $blog->title }}</h2>
                                    </div>
                                    <div>
                                        <ul class="social-icon">
                                            <li class="nav-item">
                                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $blog->permalink }}" class="nav-link facebook-share" target="_blank"><i class="fab fa-facebook-f facebook-icon"></i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="https://twitter.com/intent/tweet?url={{ $blog->permalink }}?text={{ env('APP_NAME') }}" class="nav-link twitter-share" target="_blank"><i class="fab fa-twitter twitter-icon"></i></a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ $blog->permalink }}" class="nav-link linkedin-share" target="_blank"><i class="fab fa-linkedin-in linkedin-icon"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-12 rating">
                                    <div>
                                        <ul>
                                            <li><i id="display_rating_1" class="{{ $blog->average_rating >= 1 ? 'fas' : 'far' }} fa-star" aria-hidden="true"></i></li>
                                            <li><i id="display_rating_2" class="{{ $blog->average_rating >= 2 ? 'fas' : 'far' }} fa-star" aria-hidden="true"></i></li>
                                            <li><i id="display_rating_3" class="{{ $blog->average_rating >= 3 ? 'fas' : 'far' }} fa-star" aria-hidden="true"></i></li>
                                            <li><i id="display_rating_4" class="{{ $blog->average_rating >= 4 ? 'fas' : 'far' }} fa-star" aria-hidden="true"></i></li>
                                            <li><i id="display_rating_5" class="{{ $blog->average_rating == 5 ? 'fas' : 'far' }} fa-star" aria-hidden="true"></i></li>
                                            <li>
                                                <span id="rating-average">{{ $blog->average_rating }}.0</span>
                                                (<span id="rating-count">{{ $blog->rating_count }}</span> ratings)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-12 publish-date rating">
                                    <ul>
                                        <li>
                                            <span><i class="fas fa-user"></i></span>
                                            <span>{{ $blog->created }}</span> 									
                                        </li>
                                        <li>
                                            <span><i class="fas fa-folder"></i></span>
                                            <span>{{ $blog->category->name }}</span> 								
                                        </li>
                                        <li>
                                            <span><i class="fas fa-clock"></i></span>
                                            <span>{{ date('F j Y', strtotime( $blog->updated_at )) }}</span>
                                        </li>
                                        {{-- <li>
                                            <span><i class="fas fa-eye text-yellow" id="view-count"></i> 0</span>
                                        </li> --}}
                                        <li>
                                            <span><i class="fas fa-comments"></i>{{ $blog->approved_comments_count }}</span>
                                        </li>
                                        <li>
                                            <span id="ip_view"> <span class="fb-comments-count" data-href="{{ $blog->permalink }}"></span></span>
                                        </li>
                                    </ul>
                                    <ul class="likes">
                                        <li><i class="fas fa-thumbs-up"></i></li>
                                        <li><span class="badge like-count">{{ $blog->likes_count }}</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 analysis-content">
                                    <div class="text-center p-3">
                                        <a href="#">
                                            <img class="img-fluid" title="click here to enlarge" data-toggle="modal" data-target="#modal-image" src="{{ asset('/blogs/images/1200x630-'.$blog->feature_image) }}" alt="">
                                        </a>
                                    </div>
                                    <p>
                                    {!! $blog->body !!}
                                    </p>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="footer-rating master-review">
                                        <div class="fiveStarRating">
                                            <form method="POST" action="#" accept-charset="UTF-8" enctype="multipart/form-data" id="formreview">
                                                <div class="rated">
                                                    <div>
                                                        <fieldset class="rating1">
                                                            <input type="radio" class="rate" id="rate_5" name="rating" value="5">
                                                            <label id="label_rate_5" class="full rate" data-value="5.0" for="star1100" title="Awesome - 5 stars" style="color: rgb(221, 221, 221);"></label>
                                                            <input type="radio" class="rate" id="rate_4" name="rating" value="4">
                                                            <label id="label_rate_4" class="full rate" data-value="4.0" for="star1101" title="Pretty good - 4 stars" style="color: rgb(221, 221, 221);"></label>
                                                            <input type="radio" class="rate" id="rate_3" name="rating" value="3">
                                                            <label id="label_rate_3" class="full rate" data-value="3.0" for="star1102" title="Meh - 3 stars" style="color: rgb(221, 221, 221);"></label>
                                                            <input type="radio" class="rate" id="rate_2" name="rating" value="2">
                                                            <label id="label_rate_2" class="full rate" data-value="2.0" for="star1103" title="Kinda bad - 2 stars" style="color: rgb(221, 221, 221);"></label>
                                                            <input type="radio" class="rate" id="rate_1" name="rating" value="1">
                                                            <label id="label_rate_1" class="full rate" data-value="1.0" for="star1104" title="Sucks big time - 1 star" style="color: rgb(221, 221, 221);"></label>
                                                        </fieldset>
                                                    </div>
                                                    <div>
                                                        <span class="badge badge-dark" id="rating-value" data-toggle="tooltip" data-placement="right" title="Please review this article" data-state="free">0.0</span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div>
                                            <div class="likeButtonArea">
                                                <div class="mr-2">
                                                    <span style="font-size: 24px; vertical-align: -2px; cursor: pointer; display: none;" data-toggle="tooltip" data-placement="left" title="You already liked this article" class="likeable" id="liked" data-for="unlike" data-id="{{ $blog->id }}">
                                                        <i class="fas fa-thumbs-up"></i>
                                                    </span>
                                                    <span style="font-size: 24px; vertical-align: -2px; cursor: pointer; display: block;" data-toggle="tooltip" data-placement="left" title="Click to liked this article" class="likeable" id="not-liked" data-for="like" data-id="{{ $blog->id }}">
                                                        <i class="far fa-thumbs-up"></i>
                                                    </span>
                                                </div>
                                                <div class="like-count" id="like-count" data-count="{{ $blog->likes_count }}">
                                                    {{ $blog->likes_count }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="card facebook-comment-box">
                                        <div class="card-body">
                                            <div id="fb-comments"  class="fb-comments" data-href="{{ url($blog->permalink) }}" data-numposts="5"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="next-prev-button">
                                        @if ($prevPermalink)
                                            <div>
                                                <a href="{{ $prevPermalink }}" class="btn btn-default"><i class="fas fa-angle-double-left mr-1"></i> Previous Blog Post</a>
                                            </div>
                                        @endif
                                        @if ($nextPermalink)
                                            <div class="">
                                                <a href="{{ $nextPermalink }}" class="btn btn-default">Next Blog Post <i class="fas fa-angle-double-right ml-1"></i></a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @include('frontend.partials.blog.article-carousel')
                </div>
                <div class="col-lg-3">

                    @include('frontend.partials.forexSignal.recent-closed-trades')
                    
                    @include('frontend.layouts.includes.side-advertise')
                    
                    @include('frontend.partials.blog.latest-blog')

                    @include('frontend.layouts.includes.side-advertise')

                    @include('frontend.partials.blog.related-blog-post')

                    @include('frontend.layouts.includes.side-advertise')

                    @include('frontend.layouts.includes.need-help')

                    @include('frontend.layouts.includes.side-advertise')

                    @include('frontend.layouts.includes.small-advertisement')

                    @include('frontend.layouts.includes.side-advertise')

                    @include('frontend.partials.tags.analysis-tags')
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modal-image" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img class="img-fluid" src="{{ asset('/blog/images/1200x630-'.$blog->feature_image) }}" alt="">
                </div>
            </div>
        </div>
    </div>

    
@endsection
