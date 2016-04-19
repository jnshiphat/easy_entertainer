<!-- BEGIN PAGE HEAD -->
<div class="page-head">
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
		<h1>Create Admin</h1>
	</div>
	<!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD -->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
	<li>
		<a href="{{URL::to('admin/admindashboard')}}">Dashboard</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="#">Admins</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="#">Create Admin</a>
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN VALIDATION STATES-->
					<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Create Admin Form
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<a href="javascript:;" class="reload">
								</a>
							</div>
						</div>
						<div class="portlet-body form">
							@if(Session::has('createadmin_message'))
								<div class="alert alert-info">{{ Session::get('createadmin_message') }}</div>
						    @endif
						    @if(Session::has('error_message'))
								<div class="alert alert-info">{{ Session::get('error_message') }}</div>
						    @endif
							<!-- BEGIN FORM-->
							<form action="{{URL::to('admin/admincreate')}}" id="form_sample_1" class="form-horizontal" method="post">
								<input type="hidden" value="{{csrf_token()}}" name="_token" />
								<div class="form-body">
									<div class="alert alert-danger display-hide">
										<button class="close" data-close="alert"></button>
										You have some form errors. Please check below.
									</div>
									<div class="alert alert-success display-hide">
										<button class="close" data-close="alert"></button>
										Your form validation is successful!
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">User Name<span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="text" name="username" data-required="1" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Password <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input type="password" name="password" data-required="1" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">First Name <span class="required">
										</span>
										</label>
										<div class="col-md-4">
											<input type="text" name="first_name" data-required="1" class="form-control"/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Last Name<span class="required">
										</span>
										</label>
										<div class="col-md-4">
											<input type="text" name="last_name" data-required="1" class="form-control"/>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Email <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<input name="email" type="text" class="form-control" required/>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Admin Type <span class="required">
										* </span>
										</label>
										<div class="col-md-4">
											<select class="form-control" name="role_id"  required>
												<option value="">Select...</option>
												<option value="1">Super Admin</option>
												<option value="2">Admin</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn green">Submit</button>
											<button type="button" class="btn default">Cancel</button>
										</div>
									</div>
								</div>
							</form>
							<!-- END FORM-->
						</div>
					</div>
					<!-- END VALIDATION STATES-->
				</div>
			</div>