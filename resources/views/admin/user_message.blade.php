<html>
@include('admin.layout.header')
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">

@include('admin.layout.topbar')

<div class="page-container">

	{{-- @include('admin.layout.lftsidebar') --}}
	@include('admin.layout.lftsidebar_tmp')

	<div class="page-content-wrapper">
		@if ((Session::get('role_id') === 1) || (Session::get('role_id') === 2))

			<div class="page-content">
				{{-- @include('admin.layout.dashboardcontent') --}}
						<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
				<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

				<!-- BEGIN PAGE HEADER-->
				<!-- BEGIN PAGE HEAD -->
				<div class="page-head">
					<!-- BEGIN PAGE TITLE -->
					<div class="page-title">
						<h1>Manage Users' Message <small> List of Users' Message</small></h1>
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
						<a href="#">User Messages</a>
						<i class="fa fa-circle"></i>
					</li>
					<li>
						<a href="#">Manage User Messages</a>
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
									<i class="fa fa-edit"></i>Users' Message List
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
										</div>
									</div>
								</div>
								<form id="form_sample_1" class="form-horizontal" method="post"> <!-- AJAX Form -->
									<input type="hidden" value="{{csrf_token()}}" name="_token" />
									<table class="table table-striped table-hover table-bordered" id="sample_editable_1">
										<thead>
										<tr>
											<th>Subject</th>
											<th>Email Address</th>
											<th>Phone Number</th>
											<th>Description</th>
											<th>Date Time</th>
											<th>Reply</th>
											<th>Delete</th>
										</tr>
										</thead>
										<tbody>
										@foreach($usermassage as $key=>$value)
											<tr data-id = "{{$value->mid}}" id="{{$value->mid}}">
												<td>
													{{$value->m_sub}}
												</td>
												<td>
													{{$value->u_email}}
												</td>
												<td>
													{{$value->u_phone}}
												</td>
												<td>
													{{$value->description}}
												</td>
												<td>
													{{$value->m_date}}
												</td>
												<td>
													Reply Button
												</td>
												<td>
													<a class="getDelId btn default" onclick="delIdSend({{$value->mid}})" data-toggle="modal" href="#delete-model">
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
								<h4 class="modal-title">Delete Message</h4>
							</div>
							<div class="modal-body">
								Are you sure you want to delete the message?
							</div>
							<div class="modal-footer">
								<button type="button" class="btn default" data-dismiss="modal">Close</button>
								<button type="button" id="confirmDeleteButton" data-dismiss="modal" class="btn blue">Sure, Delete!</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->
				{{-- @include('admin.layout.rgtsidebar') --}}

			</div> {{-- End Page Content --}}
		@endif
	</div>

</div>
@include('admin.layout.footer')
<!-- Page Level Plugins -->
<script src="{{URL::to('../resources/assets/admin/pages/scripts/table-usermessagelist.js')}}"></script>
<script type="text/javascript" src="{{URL::to('../resources/assets/global/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('../resources/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('../resources/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>

<!-- Page Level Scripts -->
<script src="{{URL::to('../resources/assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{URL::to('../resources/assets/admin/layout4/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{URL::to('../resources/assets/admin/layout4/scripts/demo.js')}}" type="text/javascript"></script>
{{--<script src="{{URL::to('../resources/assets/admin/pages/scripts/adminlist-table.js')}}"></script>--}}
<script>
	jQuery(document).ready(function() {
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Demo.init(); // init demo features
		TableEditable.init();
	});
	function delIdSend(id) {
		$('#confirmDeleteButton').attr("delId",id);
	}
</script>
</body>

</html>