<section class="market-analysis">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="header-content">
            <div>
              <span>Latest Blog</span>
            </div>
            <div>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch3" onclick="marketAnalysis()">
                <label class="custom-control-label" for="customSwitch3"></label>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body" id="marketAnalysis">
          <div class="body-content row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              {{-- @dd($blogs) --}}
              @foreach($blogs as $blog)
              <div class="media">
                <img src="{{ asset('/blogs/images/40x40-'.$blog['feature_image']) }}" alt="{{ $blog['title'] }}">
                <div class="media-body">
                  <h5 class="mt-0">
                    <a href="{{ $blog['permalink'] }}" target="_blank">{{ substr($blog['title'],0,50) }}....</a>
                  </h5>
                  <div class="details">
                    <p>{{ strip_tags(substr($blog['body'],0,60)) }}</p>
                  </div>
                  <div class="action-details">
                    <div class="likeComment">
                    <span class="bp-view">
                      <span><i class="fas fa-comments"></i></span>
                      <span id="ip_view"> <span class="fb-comments-count" data-href="{{ $blog['permalink'] }}"></span></span>
                    </span>
                        {{-- <span class="bp-view">
                      <i class="fa fa-eye mr10"></i>
                      <span id="ip_view"> 2453</span>
                      </span>
                        <span class="bp-view">
                        <i class="fa fa-thumbs-up mr10"></i>
                        <span id="ip_view">{{ $blog->likes_count }}</span>
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