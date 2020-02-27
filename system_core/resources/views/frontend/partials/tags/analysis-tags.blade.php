<div class="position-relative mt-2">
    <h4 class="trading-session-header mt-1-half border-radius-top-3">Tags</h4>
    <div class="tag-container">
        @if(count($tags) > 0)
        @foreach($tags as $tag)
        <a href="javascript:void(0)" class="tags">
            {{ $tag->name }}
        </a>
        @endforeach
        @else
        <div class="col-md-12 alert alert-danger">
            <p class="text-center">No TAG Found</p>
        </div>
        @endif
    </div>
</div>