<ul class="profile-list">
    @foreach($blogs as $blog)
        <li>
            <div class="analysis-icon">
                <img src="{{ asset('/blog/images/40x40-'.$blog->feature_image) }}" alt="..." class="pro-img">
            </div>
            <div class="analysis-discription">
                <div class="right-info-container">
                    <h4 class="profile-name conurl"><a href="{{ $blog->permalink }}" target="_blank">{{ substr($blog->title,0,50) }}....</a></h4>
                    <p class="discription">{{ strip_tags(substr($blog->body,0,60)) }}...</p>
                    <p class="vc-num">
                      <span class="bp-view">
                      <i class="fa fa-comments mr10"></i>
                      <span id="ip_view">{{ $blog->approved_comments_count }}</span>
                      </span>
                        <span class="bp-view">
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
                        </span>
                    </p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
