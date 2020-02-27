<section class="market-analysis">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="header-content">
            <div>
              <span>Related Blog Posts</span>
            </div>
            <div>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch39" onclick="relatedBlogPost()">
                <label class="custom-control-label" for="customSwitch39"></label>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body" id="relatedBlogPost">
          <div class="body-content row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              @foreach($related_blog as $related)
              <div class="media">
                <img src="{{ asset('blogs/images/40x40-'.$related->feature_image) }}" alt="{{ $related->title }}">
                <div class="media-body">
                  <h5 class="mt-0">
                    <a href="{{ $related->permalink }}" target="_blank">{{ substr($related->title,0,30) }}...</a>
                  </h5>
                  <div class="details">
                    <p>{{ strip_tags($related->body) }}...</p>
                  </div>
                  <div class="action-details">
                    <div class="likeComment">
                    <span class="bp-view">
                      <span><i class="fas fa-comments"></i></span>
                      <span id="ip_view"> <span class="fb-comments-count" data-href="{{ $related->permalink }}"></span></span>
                    </span>
                        {{-- <span class="bp-view">
                      <i class="fa fa-eye mr10"></i>
                      <span id="ip_view"> 2453</span>
                      </span>
                        <span class="bp-view">
                        <i class="fa fa-thumbs-up mr10"></i>
                        <span id="ip_view">{{ $related->likes_count }}</span>
                        </span>
                        <span class="bp-view">
                        <i class="fa fa-star mr10"></i>
                        <span id="ip_view"> 5</span>
                        </span> --}}
                    </div>
                    <div>
                      <span class="badge">2 days ago</span>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>