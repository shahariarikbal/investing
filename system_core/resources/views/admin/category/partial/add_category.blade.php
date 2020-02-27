<div class="modal fade addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="position: relative;" id="categoryForm">
        <div id="category-loading" style="display: none" >
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add Category</h2>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                <form method="post" class="form-horizontal login_validator" id="signal_form_validator">
                    @csrf
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="service" class="col-form-label">Service *</label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control" name="service" id="service" tabindex="2">
                                <option value="" selected disabled>Select</option>
                                <option value="App\Analysis">Analysis</option>
                                <option value="App\Blog">Blog</option>
                                <option value="App\Signal">Signal</option>
                                <option value="App\Knowledgebase">Knowledgebase</option>
                            </select>
                            <small class="help-block error" id="service_error"></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="service" class="col-form-label">Parent Category</label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control" name="parent_id" id="parent_id" tabindex="2">
                                <option selected>Select a Subcategory</option>
{{--                                @foreach($categories as $category)--}}
{{--                                    <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="category_name" class="col-form-label">Category Name *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control" name="name" id="name">
                            <small class="help-block error" id="name_error"></small>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary save" id="saveCategory">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





