<section class="market-analysis">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="header-content">
            <div>
              <span>Related Analysis</span>
            </div>
            <div>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch33" onclick="relatedAnalysis()">
                <label class="custom-control-label" for="customSwitch33"></label>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body" id="relatedAnalysis">
          <div class="body-content row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              @foreach($related_analysis as $related)
              <div class="media">
                <img src="{{ url('storage/analysis/40x40-'.$related->feature_image) }}" alt="...">
                <div class="media-body">
                  <h5 class="mt-0">
                    <a href="{{ $related->permalink }}" target="_blank">{!! $related->title !!}</a>
                  </h5>
                  <div class="details">
                    <p>{{ strip_tags($related->body) }}</p>
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
                        <span id="ip_view">{{ $related->likes_count }}</span>
                      </div> --}}
                    </div>
                    <!-- <div>
                      <span class="badge">2 days ago</span>
                    </div> -->
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