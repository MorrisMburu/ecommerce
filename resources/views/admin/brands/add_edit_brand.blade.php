@extends('layouts.admin_layouts.main')
@section('content')

<div class="x_panel">
	<div class="row">
		<h3>{{$title}}</h3>
	</div>
	<div class="row ">
		<div class="col-sm-12">
			<div class="card-box table-responsive ">
				<div  class="container-fluid ">
					<div class="row">
						<div class="col-sm-12">
							<section class="container " style="overflow: hidden;">
								
								@if($errors->any())
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<ul>
										@foreach($errors->all() as $error)
										<li>{{$error}}</li>
										@endforeach
									</ul>
								</div>
								@endif

								@if(Session::has('success_message'))
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									{{Session::get('success_message')}}
								</div>
								@endif

								<form  name="brandForm" @if(empty($brand['id'])) action="{{url('admin/add-edit-brand')}}" @else action="{{url('admin/add-edit-brand/'.$brand['id'] )}}" @endif id="brandForm" method="post" >@csrf
									<div class="form-row">
										<div class="form-group col-md-8">
											<div class=" col-md-8 ">
												<label for="brand_name">brand Name</label>
												<input  type="text" id="brand_name" name="brand_name" required="required" class="form-control " placeholder="brand Name" 
												@if(!empty($brand['name']))
												value="{{$brand['name']}}" 
												@else 
												value="{{old('brand_name')}}" 
												@endif>

											</div>
										</div>
									</div>

										<div class="ln_solid"></div>
										<div class="form-group">
											<div class="col-md-9 col-sm-9  offset-md-3">
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>
									</form>
								</section>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endSection