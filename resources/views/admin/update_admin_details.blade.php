@extends('layouts.admin_layouts.main')

@section('content')
	<h3>Admin Details</h3>
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

	              		@if($errors->any())
                        	<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        	    <ul>
                        	      @foreach($errors->all() as $error)
                        	      <li>{{$error}}</li>
                        	      @endforeach
                        	    </ul>
                        	</div>
                       @endif
						<form id="updateAdminDetails" name="updateAdminDetails" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="post" action="{{url('/admin/update-admin-details')}}" enctype="multipart/form-data">@csrf
				            

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Admin Email
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input  value="{{Auth::guard('admin')->user()->email}}" readonly="" class="form-control " >
        
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Admin Name 
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input  value="{{Auth::guard('admin')->user()->name}}" id="admin_name" name="admin_name" class="form-control " >
        
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="mobile">Current Phone<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="admin_mobile" value="{{Auth::guard('admin')->user()->mobile}}"name="admin_mobile" required="" class="form-control">
								</div>
							</div>

							<div class="item form-group">
								<label for="admin_image" class="col-form-label col-md-3 col-sm-3 label-align">Image</label>
								<div class="col-md-6 col-sm-6 ">
									<input id="admin_image" class="form-control"  type="file" name="admin_image" accept="image/*">
									@if(!empty(Auth::guard('admin')->user()->image))
										<a href="{{url('images/admin_images/admin_photos/' . Auth::guard('admin')->user()->image )}}" target="_blank">View Image</a>
										<input type="hidden" name="current_admin_image" value="{{Auth::guard('admin')->user()->image}}">
									@endif
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