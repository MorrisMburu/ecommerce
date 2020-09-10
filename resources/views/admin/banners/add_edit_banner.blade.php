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

							<form  name="bannerForm" @if(empty($banner['id'])) action="{{url('admin/add-edit-banner')}}" @else action="{{url('admin/add-edit-banner/'.$banner['id'] )}}" @endif id="bannerForm" method="post" enctype="multipart/form-data">@csrf
								<div>	
									<div class="col-md-6">

										<div class="form-group">
											<label for="image">Banner Image</label>
											<input type="file" name="image" id="image"  class="form-control " placeholder="Main Image">
											<div>Recommended Image Siźe: Width:1170px, Height:480px</div>
											@if(!empty($banner['image']))
											<div>
												<img style="width: 80px; margin-top:5px" src="{{asset('images/banner_images/' .$banner['image'])}}" alt="">
											</div>
											@endif
										</div>

										<div class="form-group">
											<label for="link">Banner Link</label>
											<input  type="text" id="link" name="link" required="required" class="form-control " placeholder="Banner Link" 
											@if(!empty($banner['link']))
											value="{{$banner['link']}}" 
											@else 
											value="{{old('link')}}" 
											@endif>
										</div>

										
									</div>

									<div class="col-md-6">
										
										<div class="form-group">
											<label for="title">Banner Title</label>
											<input  type="text" id="title" name="title" required="required" class="form-control " placeholder="Title" 
											@if(!empty($banner['title']))
											value="{{$banner['title']}}" 
											@else 
											value="{{old('title')}}" 
											@endif>
										</div>
										<div class="form-group">
											<label for="alt">Banner Alt</label>
											<input  type="text" id="alt" name="alt" required="required" class="form-control " placeholder="Alt" 
											@if(!empty($banner['alt']))
											value="{{$banner['alt']}}" 
											@else 
											value="{{old('alt')}}" 
											@endif>
										</div>

									</div>
									
								</div>

								<div class="form-group">
									<div class="col-md-9 col-sm-9">
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
@endSection