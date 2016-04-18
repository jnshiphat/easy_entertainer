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
						<center>
							<h2>Manage Admins</h2>
						</center>
				    	
				    	{{-- @include('admin.layout.dashboardcontent') --}}
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
</body>

</html>