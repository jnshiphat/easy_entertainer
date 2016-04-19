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
						
				    	@include('admin.layout.dashboardcontent')
						@include('admin.layout.rgtsidebar')

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
	 <script src="{{URL::to('../resources/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>

	 <!-- Page Level Scripts -->
	 <script src="{{URL::to('../resources/assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/admin/layout4/scripts/layout.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/admin/layout2/scripts/quick-sidebar.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/admin/layout4/scripts/demo.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/admin/pages/scripts/index3.js')}}" type="text/javascript"></script>
	 <script src="{{URL::to('../resources/assets/admin/pages/scripts/tasks.js')}}" type="text/javascript"></script>
	 <script>
		 jQuery(document).ready(function() {
			 Metronic.init(); // init metronic core componets
			 Layout.init(); // init layout
			 Demo.init(); // init demo features
			 QuickSidebar.init(); // init quick sidebar
			 Index.init(); // init index page
			 Tasks.initDashboardWidget(); // init tash dashboard widget
		 });
	 </script>
</body>

</html>