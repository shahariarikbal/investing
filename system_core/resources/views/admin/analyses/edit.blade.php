<div class="modal fade editAnalysisModal" id="editAnalysisModal"  name="editAnalysis" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="position: relative;" id="editAnalysisForm">
        <div id="edit_form-loading" style="display: none">
            <i class="fa fa-spinner fa-pulse fa-5x fa-fw" aria-hidden="true"></i>
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <h2> Edit Analysis </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body m-t-35">
                <form action="" name="editAnalysis" method="post" class="form-horizontal login_validator" onsubmit = "return(validate());" id="updateAnalysisForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="analysisId" name="id">
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="required" class="col-form-label">Category Name *</label>
                        </div>
                        <div class=" cat_id col-xl-9">
                            <select class="form-control chzn-select" name="category_id" id="ecategory" tabindex="2">
                                <option value="">[ Select one Category ]</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <small class="help-block error" style="color: red" id="edit_category_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="required" class="col-form-label">Sub Category Name </label>
                        </div>
                        <div class="col-xl-9">
                            <select class="form-control chzn-select" name="subcategory_id" id="esubcategory" tabindex="2">
                                <option>Select Sub category</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="title" class="col-form-label">Title *</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" id="etitle" name="title" placeholder="Enter Your Blog Title...." class="form-control">
                            <small class="help-block error" style="color: red" id="edit_title_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="email" class="col-form-label">Body</label>
                        </div>
                        <div class="col-xl-9">
                            <textarea id="ebody" name="body" class="form-control analysisEditor" cols="50" rows="5" placeholder="Enter Your Analysis Description...."></textarea>
                            <small class="help-block error" style="color: red" id="edit_body_error"></small>
                        </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-xl-3 text-xl-right">
                        <label for="status" class="col-form-label">Status </label>
                    </div>
                    <div class="col-xl-9">
                        <select class="form-control" name="status" id="estatus">
                            <option value="" selected>Select a Status</option>
                            <option value="inactive">Draft</option>
                            <option value="publish">Publish</option>
                        </select>
                        <small class="help-block error" style="color: red" id="edit_status_error"></small>
                    </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="orders" class="col-form-label">Orders</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control" id="eorders" name="orders" placeholder="Order number here...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Analysis Image <p>(You can skip for draft)</p></label>
                        </div>
                        <div class="col-xl-9">
                            <img src="" id="prev-img" style="height: 100px;" width="100px" />
                            <input type="file" id="eimage" name="feature_image" onchange="preview(event)" accept="image/*" class="form-control">
                        </div>
                    </div>

                    <h3 style="margin-left: 200px;">Seo Section</h3>
                    <br/>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Seo Title</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control form-control-sm" id="edit_analysis_seo_title" name="seo_title" placeholder="leave blank for auto capturing url">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Seo Keyword</label>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" class="form-control form-control-sm" id="edit_analysis_seo_keyword" name="seo_keyword" placeholder="leave blank for title as keyword">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-3 text-xl-right">
                            <label for="image" class="col-form-label">Seo Description</label>
                        </div>
                        <div class="col-xl-9">
                            <textarea class="form-control" name="seo_description" id="edit_analysis_seo_description" placeholder="leave blank to get auto description"></textarea>
                        </div>
                    </div>
                    <small id="errorMassage" style="color: red; font-size: 18px; text-align: center; margin-left: 150px;"></small>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" id="submitAnalysis" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

    // Image Preview

    function preview(event)
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
<!--Validation End-->