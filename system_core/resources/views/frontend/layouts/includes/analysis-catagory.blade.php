<div id="accordion" class="faq_content left_menu mb-2">
  <div class="heading-card">
      <span>Analysis Category</span>
  </div>
  @foreach($categories as $key => $category)
  <div class="card">
      <div class="card-header" id="headingOne_{{ $key }}">
          <h6 class="mb-0"> <a class="collapse collapsed" data-toggle="collapse" href="#collapseOne_{{ $key }}" aria-expanded="true" aria-controls="collapseOne_{{ $key }}">{{ $category->name }}</a> </h6>
      </div>
      <div id="collapseOne_{{ $key }}" class="collapse" aria-labelledby="headingOne_{{ $key }}" data-parent="#accordion">
          <div class="card-body">
              <ul>
                  <li class="active"><a href="javascript:void(0)">All Post</a></li>
                  @foreach($category->childrens as $children)
                      <li><a href="{{ $children->permalink }}">{{ $children->name }}</a></li>
                  @endforeach
              </ul>
          </div>
      </div>
  </div>
  @endforeach            
</div>