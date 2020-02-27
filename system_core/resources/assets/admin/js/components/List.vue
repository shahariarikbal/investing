
<template>
    <div class="inner bg-container">
                <div class="row">
                    <div class="col-12 data_tables">
                        <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                        <div class="card">
                            <div class="card-header bg-white">
                                <i class="fa fa-table"></i> Blogs Table
                                <button type="button" class="btn btn-success pull-right" title="Add Blog">
                                    Add Blog
                                </button>
                            </div>
                            <div class="card-body p-t-25">
                                <div class="">
                                    <div class="pull-sm-right">
                                        <div class="tools pull-sm-right"></div>
                                    </div>
                                </div>
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr style="text-align:center">
                                            <th>SL</th>
                                            <th>Category name</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Body</th>
                                            <th>Image</th>
                                            <th>Created By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:center">
                                                <button type="button" class="btn btn-info" title="Edit Blog">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger" title="Delete Blog">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE1 TABLE PORTLET-->
                        <!-- BEGIN EXAMPLE2 TABLE PORTLET-->
                        <!-- END EXAMPLE2 TABLE PORTLET-->
                        <!-- BEGIN EXAMPLE3 TABLE PORTLET-->
                        <!-- END EXAMPLE3 TABLE PORTLET-->
                        <!-- BEGIN EXAMPLE4 TABLE PORTLET-->
                    </div>
                </div>
            </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>