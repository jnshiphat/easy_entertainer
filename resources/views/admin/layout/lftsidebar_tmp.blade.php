<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar md-shadow-z-2-i  navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			@if($menuActive == 'dashboard')
				<li class="start active">
			@else
				<li class="start">
			@endif
					<a href="{{URL::to('admin/admindashboard')}}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
				</li>

			@if (Session::get('role_id') === 1)
				@if($menuActive == 'admincreate' || $menuActive == 'adminmanage')
					<li class="active open">
				@else
					<li>
				@endif
						<a href="javascript:;">
						<i class="icon-settings"></i>
						<span class="title">Admins</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
						@if($menuActive == 'adminmanage')
							<li class="active">
						@else
							<li>
						@endif
								<a href="{{URL::to('admin/adminmanage')}}">
								Manage Admin</a>
							</li>
						@if($menuActive == 'admincreate')
							<li class="active">
						@else
							<li>
						@endif
								<a href="{{URL::to('admin/admincreate')}}">
								Create Admin</a>
							</li>
						</ul>
					</li>
			@endif
				@if($menuActive == 'usermessage')
				<li class="active open">
				@else
				<li>
				@endif
					<a href="javascript:;">
						<i class="icon-settings"></i>
						<span class="title">Users/Visitors</span>
						<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						@if($menuActive == 'usermessage')
						<li class="active">
						@else
						<li>
						@endif
						<a href="{{URL::to('admin/usermessage')}}">
							Messages</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-briefcase"></i>
					<span class="title">Data Tables</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="table_basic.html">
							Basic Datatables</a>
						</li>
						<li>
							<a href="table_tree.html">
							Tree Datatables</a>
						</li>
						<li>
							<a href="table_responsive.html">
							Responsive Datatables</a>
						</li>
						<li>
							<a href="table_managed.html">
							Managed Datatables</a>
						</li>
						<li>
							<a href="table_editable.html">
							Editable Datatables</a>
						</li>
						<li>
							<a href="table_advanced.html">
							Advanced Datatables</a>
						</li>
						<li>
							<a href="table_ajax.html">
							Ajax Datatables</a>
						</li>
					</ul>
				</li>

			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->