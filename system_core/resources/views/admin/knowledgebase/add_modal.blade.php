<div class="modal fade addKnowledgebaseModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="position: relative;" id="knowledgeForm">
        <div id="knowledge-loading" style="display: none" >
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create Knowledgebase</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                <form action="#" method="post" name="knowledge" class="form-horizontal login_validator" id="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="category" class="col-form-label">Category Name *</label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control chzn-select" name="category_id" id="category" tabindex="2">
                                <option value="">Select a Category Name</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <small class="help-block error" style="color: red" id="category_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="title" class="col-form-label">Title *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" id="title" name="title" placeholder="Enter Your Knowledgebase Title...." class="form-control">
                            <small class="help-block error" style="color: red" id="title_error"></small>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="body" class="col-form-label">Body</label>
                        </div>
                        <div class="col-xl-9">
                            <textarea id="body" name="body" class="form-control contenteditor" cols="50" rows="5" placeholder="Enter Your Knowledgebase Description...."></textarea>
                            <small class="help-block error" style="color: red" id="body_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="status" class="col-form-label">Status </label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control" name="status" id="status">
                                <option value="">Select a Status</option>
                                    <option value="2">Draft</option>
                                    <option value="1">Publish</option>
                            </select>
                            <small class="help-block error" style="color: red" id="status_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="orders" class="col-form-label">Orders</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="number" class="form-control form-control-sm" id="orders" name="orders" placeholder="Order number here...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Knowledge Image <p>(You can skip for draft)</p></label>
                        </div>
                        <div class="col-xl-9">
                            <img src="{{ asset('/assets/default.jpg') }}" id="prev" style="height: 50px;" width="100px" />
                            <input type="file" id="image" onchange="knowledgebase_preview_img(event)" name="feature_image" accept="image/*" class="form-control">
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
                            <input type="text" class="form-control form-control-sm" id="new_seo_title" name="seo_title" placeholder="leave blank for auto capturing url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Seo Keyword</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control form-control-sm" id="new_seo_keyword" name="seo_keyword" placeholder="leave blank for title as keyword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Seo Description</label>
                        </div>
                        <div class="col-xl-9">
                            <textarea class="form-control" name="seo_description" id="new_seo_description" placeholder="leave blank to get auto description"></textarea>
                        </div>
                    </div>
                    <small id="errorMassage" style="color: red; font-size: 18px; text-align: center"></small>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" id="addKnowledgebase" name="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    function knowledgebase_preview_img(event)
    {
        var reader = new FileReader();
        reader.onload = function ()
        {
            var output = document.getElementById('prev');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

