<div class="modal fade editBlogModal" id="updateBlogModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="position: relative;" id="editBlogForm">
        <div id="edit_blog-loading" style="display: none" >
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Blog</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                    <form action="" method="post" name="blogEditForm" onsubmit="return editBlogValidation();"  class="form-horizontal login_validator updateBlogModal" id="form_inline_validator" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="blogId" name="id">
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="required" class="col-form-label">Category Name *</label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control chzn-select" name="category_id" id="ecategory" tabindex="2">
                                <option value="">Select a Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <small class="help-block error" style="color: red" id="edit_category_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="required" class="col-form-label">Sub Category Name *</label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control chzn-select" name="subcategory_id" id="esubcategory" tabindex="2">
                                <option>Select Sub category</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="required" class="col-form-label">Title *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" id="etitle" name="title" placeholder="Enter Your Blog Title...." class="form-control">
                            <small class="help-block error" style="color: red" id="edit_title_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="body" class="col-form-label">Body</label>
                        </div>
                        <div class="col-xl-9">
                            <textarea id="ebody" name="body" class="form-control contenteditor" cols="50" rows="5" placeholder="Enter Your Blog Description...."></textarea>
                            <small class="help-block error" style="color: red" id="edit_body_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="status" class="col-form-label">Status </label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control" name="status" id="estatus">
                                <option value="">Select a Status</option>
                                <option value="inactive">Draft</option>
                                <option value="publish">Publish</option>
                            </select>
                            <small class="help-block error" id="edit_status_error" style="color: red;"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="orders" class="col-form-label">Orders</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control form-control-sm" id="eorders" name="orders" placeholder="Order number here...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Blog Image <small>(You can skip for draft)</small> </label>
                        </div>
                        <div class="col-xl-9">
                            <img src="{{ asset('/assets/default.jpg') }}" id="prev-img" style="height: 100px;" width="100px" />
                            <input type="file" id="eimage" onchange="image_preview(event)" name="feature_image" accept="image/*" class="form-control">
                        </div>
                    </div>
                    <br/>
                    <h3 style="margin-left: 200px;">Seo Section</h3>
                    <br/>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Seo Title</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control form-control-sm" id="edit_seo_title" name="seo_title" placeholder="leave blank for auto capturing url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Seo Keyword</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control form-control-sm" id="edit_seo_keyword" name="seo_keyword" placeholder="leave blank for title as keyword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Seo Description</label>
                        </div>
                        <div class="col-xl-9">
                            <textarea class="form-control" name="seo_description" id="edit_seo_description" placeholder="leave blank to get auto description"></textarea>
                        </div>
                    </div>
                    <div id="errorMassage" style="color: red;"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" id="editBlog" name="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    function image_preview(event)
    {
        var reader = new FileReader();
        reader.onload = function ()
        {
            var output = document.getElementById('prev-img');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>