<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE HEAD -->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Manage Admins <small> List of Admin Users</small></h1>
    </div>
    <!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD -->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Admins</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="#">Manage Admins</a>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>Admin User List
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <!--
                            <div class="btn-group">
                                <button id="sample_editable_1_new" class="btn green">
                                    Add New <i class="fa fa-plus"></i>
                                </button>
                            </div>
                            -->
                        </div>
                        <!--
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">
                                            Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        -->
                    </div>
                </div>
                <form id="form_sample_1" class="form-horizontal" method="post"> <!-- AJAX Form -->
                    <input type="hidden" value="{{csrf_token()}}" name="_token" />
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <th>
                                Username
                            </th>
                            <th>
                                First Name
                            </th>
                            <th>
                                Last Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Password
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                            <!-- <td>
                                Action
                            </td> -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($adminlogin as $key=>$value)
                                <tr data-id = "{{$value->id}}" id="{{$value->id}}">
                                    <td>
                                        {{$value->username}}
                                    </td>
                                    <td>
                                        {{$value->first_name}}
                                    </td>
                                    <td>
                                        {{$value->last_name}}
                                    </td>
                                    <td>
                                        {{$value->email}}
                                    </td>
                                    <td>
                                        {{$value->password}}
                                    </td>
                                    <td>
                                        @if($value->role_id === 1)
                                            Super Admin
                                        @else
                                            Admin
                                        @endif
                                    </td>
                                    <td>
                                        <a class="edit" href="javascript:;">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <!-- <a class="delete" href="javascript:;">
                                            Delete
                                        </a> -->
                                        <a class="getDelId btn default" onclick="delIdSend({{$value->id}})" data-toggle="modal" href="#delete-model">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </form>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE CONTENT -->

<div class="modal fade" id="delete-model" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
               Are sure - You want to delete the admin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                <!-- <button type="button" id="confirmDeleteButton" data-dismiss="modal" onclick="deleteTheRow()" class="btn blue">Sure, Delete!</button>
                -->
                <button type="button" id="confirmDeleteButton" data-dismiss="modal" class="btn blue">Sure, Delete!</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>

    function delIdSend(id) {
        $('#confirmDeleteButton').attr("delId",id);
    }
    /*
    function deleteTheRow() {
        var urlPar = $('#confirmDeleteButton').attr('delId');
        var actionUrl = APP_URL+"/admin/deleteuser/"+urlPar;  //APP_URL global variable for base URL set in footer template
        var token=$('input[name=_token]').val();
        //console.log(oTable);

        $.ajax({
            type: "GET",
            headers: {'X-CSRF-TOKEN': token},
            url: actionUrl,
            success: function (html) {
                $('#'+urlPar).remove(); //Removing Row
                $("#form_sample_1").load(location.href + " #form_sample_1");
            }
        })
    }
*/


</script>
{{--<script src="{{URL::to('../resources/assets/admin/pages/scripts/adminlist-table.js')}}"></script>--}}
<script src="{{URL::to('../resources/assets/admin/pages/scripts/adminlist-table.js')}}"></script>