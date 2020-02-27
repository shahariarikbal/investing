<section class="market-analysis">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="header-content">
            <div>
              <span>Latest Analysis</span>
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
              @foreach($analyses as $analysis)
              <div class="media">
                <img src="{{ url('storage/analysis/40x40-'.$analysis->feature_image) }}" alt="...">
                <div class="media-body">
                  <h5 class="mt-0">
                    <a href="{{ $analysis->permalink }}" target="_blank">{{ substr( $analysis->title,0,30 ) }}....</a>
                  </h5>
                  <div class="details">
                    <p>{{ strip_tags(substr( $analysis->body,0,30 )) }}</p>
                  </div>
                  <div class="action-details">
                    <div class="likeComment">
                      <div class="bp-view">
                        <span><i class="fas fa-comments"></i></span>
                        <span id="ip_view"> <span class="fb-comments-count" data-href="{{ $analysis->permalink }}"></span></span>
                      </div>
                      {{-- <div class="bp-view">
                        <span><i class="fas fa-eye"></i></span>
                        <span id="ip_view">2453</span>
                      </div>
                      <div class="bp-view">
                        <span><i class="fas fa-eye"></i></span>
                        <span id="ip_view">{{ $analysis->likes_count }}</span>
                      </div> --}}
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