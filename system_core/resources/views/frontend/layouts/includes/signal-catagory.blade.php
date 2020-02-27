<div id="accordion" class="faq_content left_menu mb-2">
    <div class="heading-card">
        <span>Signal Category</span>
    </div>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h6 class="mb-0"><a class="collapse" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Main Category1</a></h6>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <ul>
                    <li class="active"><a href="{{ url('forex-signal') }}">All Signals</a></li>
                    @foreach($category_signals as $key => $category)
                    <li><a href="{{ url('forex-signal/'.$category->slug) }}">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h6 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Signal Guide</a></h6>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <ul>
                    <li><a href="signal-instructions.html" target="_blank">Signal Instructions</a></li>
                    <li><a href="signal-risk.html" target="_blank">High Risk & Warning</a></li>
                    <li><a href="signal-privacy.html" target="_blank">Privacy & Policy</a></li>
                    <li><a href="signal-faq.html" target="_blank">Signal Faq</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>