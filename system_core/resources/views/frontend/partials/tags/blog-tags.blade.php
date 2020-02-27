<div class="position-relative mt-2">
    <h4 class="trading-session-header mt-1-half border-radius-top-3">Tags</h4>
    <div class="tag-container">
        @foreach($tags as $tag)
        <a href="javascript:void(0)" class="tags">
            {{ $tag->name }}
        </a>
        @endforeach
    </div>
</div>