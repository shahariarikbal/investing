<section class="article-carousel wow fadeInRight" data-wow-duration="0.8s">
    <div class="container">
        <div class="row position-relative">
            <div class="col-md-12">
                <div class="article-carousel-title">
                    <span>Recent Article</span>
                </div>
            </div>
            <div class="col-md-12 carousel-main owl-carousel">
                @foreach($blogs as $blog)
                    <div class="card mb-3">
                        <div class="image-section">
                            <a href="{{ $blog['permalink'] }}" target="_blank">
                                <img src="{{ asset('blogs/images/278x180-'.$blog['feature_image']) }}" alt="{{ $blog['title'] }}" class="card-img-top">
                            </a>
                            <div class="imgContent">
                                <span class="left">Forex article</span>
                                <span class="right">{{ $blog['created'] }}</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3>
                                <a href="{{ $blog['permalink'] }}" target="_blank">{{ $blog['title'] }}</a>
                            </h3>
                            <div>
                                <p class="line-clamp">{{ strip_tags($blog['body']) }}</p>
                            </div>
                            <a href="{{ $blog['permalink'] }}" target="_blank" class="readmore">Read More</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>