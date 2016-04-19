<html>
@include('admin.layout.header')
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo page-sidebar-closed-hide-logo">

@include('admin.layout.topbar')

<div class="page-container">

	{{-- @include('admin.layout.lftsidebar') --}}
	@include('admin.layout.lftsidebar_tmp')

	<div class="page-content-wrapper">
		@if (Session::get('role_id') === 1)

			<div class="page-content">
				{{-- @include('admin.layout.dashboardcontent') --}}
				@include('admin.layout.manageadmin')
				{{-- @include('admin.layout.rgtsidebar') --}}

			</div>

		@elseif (Session::get('role_id') === 2)
			<center>
				<h2>Normal Admin Dashboard</h2>
				<a href="{{URL::to('admin/logout')}}">Logout</a>
			</center>
		@endif
	</div>

</div>
@include('admin.layout.footer')
<!-- Page Level Plugins -->
<script type="text/javascript" src="{{URL::to('../resources/assets/global/plugins/select2/select2.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('../resources/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{URL::to('../resources/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>

<!-- Page Level Scripts -->
<script src="{{URL::to('../resources/assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{URL::to('../resources/assets/admin/layout4/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{URL::to('../resources/assets/admin/layout4/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{URL::to('../resources/assets/admin/pages/scripts/table-editable.js')}}"></script>
<script>
	jQuery(document).ready(function() {
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Demo.init(); // init demo features
		TableEditable.init();
	});
</script>
</body>

</html>