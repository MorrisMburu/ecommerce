@extends('layouts.admin_layouts.main')

@section('content')
	<h3>Admin Settings</h3>
	<div class="col-md-12 col-sm-12 ">
					<div class="x_content">
						<br>
						@if(Session::has('error_message'))
					                <div class="alert alert-danger alert-dismissible fade show" role="alert">
					                    {{Session::get('error_message')}}
		        			        </div>
	              		@endif
	              		@if(Session::has('success_message'))
					                <div class="alert alert-success alert-dismissible fade show" role="alert">
					                    {{Session::get('success_message')}}
		        			        </div>
	              		@endif
						<form id="updatePasswordForm" name="updatePasswordForm" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="post" action="{{url('/admin/update-current-pwd')}}" >@csrf
				            

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Admin Email
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input  value="{{$adminDetails->email}}" readonly="" class="form-control " >
        
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="password">Current Password<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="password" id="current_pwd" name="current_pwd" required="" class="form-control">
									<span id="chkCurrentPwd"></span>
								</div>
							</div>
							<div class="item form-group">
								<label for="password" class="col-form-label col-md-3 col-sm-3 label-align">New password </label>
								<div class="col-md-6 col-sm-6 ">
									<input id="new_pwd" class="form-control" required="" type="password" name="new_pwd">
								</div>
							</div>
							<div class="item form-group">
								<label for="password" class="col-form-label col-md-3 col-sm-3 label-align"> Confirm New password </label>
								<div class="col-md-6 col-sm-6 ">
									<input id="confirm_pwd" class="form-control" type="password" required="" name="confirm_pwd">
								</div>
							</div>

							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
			

@endsection