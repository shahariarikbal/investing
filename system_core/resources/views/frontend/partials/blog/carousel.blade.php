<section class="articles wow fadeInRight" data-wow-duration="0.8s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- <div class="text-left mb-2-px ">
                    <h2>RECENT ARTICLES</h2>
                    </div> -->
                    <div class="text-center mb-5 mt-4">
                        <h2 class="font-weight-normal text-6 mb-4"><strong class="font-weight-extra-bold">RECENT </strong>ARTICLES</h2>
                        <p class="text-center">Our service at equal value but at a lower price or in a more desirable fashion
                            <br>Our service at equal value but at a lower price or in a more desirable fashion </p>
                    </div>
                    <div class="pic-carousel owl-carousel">
                    @foreach($blogs as $blog)
                        <div class="item">
                            <div class="service-box" data-value='1'>
                            <a href="{{ $blog['permalink'] }}">
                                <div class="service-inner-img zoom-img service-img1">
                                        <img src="{{ asset('blogs/images/278x180-'.$blog['feature_image']) }}" alt="{{ $blog['title'] }}">
                                    <div class="shadow"></div>
                                </div>
                            </a>
                                <div class="service-inner service-des1">
                                    <h4>{{ $blog['title'] }}</h4>
                                    <p>{!! $blog['body'] !!}</p>
                                    <a href="{{ $blog['permalink'] }}" class="btn btn-light font-weight-bold text-color-dark mb-3" data-animation="fadeInUp" data-animation-delay="0.5s">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="shape shap2 ph-fix"></div>
        <div class="shape shap1 ph-fix"></div>
</section>