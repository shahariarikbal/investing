<ul class="profile-list">
    @foreach($comments as $comment)
    <li>
        <div class="analysis-icon">
            @if($comment->member->avater)
                <img src="{{ $comment->member->avater }}" alt="..." class="pro-img">
            @else
                <img src="{{ asset('/images/avatar.jpg') }}" alt="..." class="pro-img">
            @endif
        </div>
        <div class="analysis-discription">
            <div class="right-info-container">
                <p class="discription">{{ substr(strip_tags($comment->body), 0, 40) }}</p>
            </div>
        </div>
    </li>
    @endforeach
</ul>