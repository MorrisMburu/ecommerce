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

							@if(Session::has('error_message'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								{{Session::get('error_message')}}
							</div>
							@endif

							<form  name="addImageForm" id="addImageForm" action=" {{url('admin/add-images/' .$productdata['id'])}} " method="post" enctype="multipart/form-data">@csrf
								<div>	
									<div class="col-md-6">
										<div class="form-group">
											<label for="product_name">product Name: {{$productdata['product_name']}}</label>
											
										</div>
										
										<div class="form-group">
											<label for="product_code">product code: {{$productdata['product_code']}}</label>
											
										</div>

										<div class="form-group">
											<label for="product_color">product Color: {{$productdata['product_color']}}</label>
											
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<img style="width: 200px; margin-top:5px" src="{{asset('images/product_images/small/' .$productdata['main_image'])}}" alt="">
										</div>
									</div>

								</div>

								<div class="form-group">
									<div class="field_wrapper">
										<div>
											<input id="images"   type="file" name="images[]" required="" value="" multiple/>
											
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-9 col-sm-9">
										<button type="submit" class="btn btn-success">Add Images</button>
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
<div class="x_panel">
	<div class="row">
		<h3>Product Images</h3>
		
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form name="editImageForm" id="editImageForm" method="post" action=" {{url('admin/edit-images/' . $productdata['id'])}} ">@csrf
				<div class="card-box table-responsive">
					<div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
						<div class="row">
							<div class="col-sm-12">
								<table id="images" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
											<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Image</th>
											<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 75px;" aria-label="Office: activate to sort column ascending">Actions</th>
										</tr>
									</thead>


									<tbody>
										@foreach($productdata['images'] as $image)
										<input type="hidden" name="attrId[]" value="{{$image['id']}}">
										<tr role="row" class="odd">
											<td class="sorting_1">{{$image['id']}}</td>
											<td>
												<img style="width: 200px; margin-top:5px" src="{{asset('images/product_images/small/'. $image['image'])}}" alt="">
											</td>
											<td>
												@if($image['status']==1)
												<a class="updateImageStatus" id="image-{{$image['id']}}" image_id="{{$image['id']}}" href="javascript:void(0)">Active</a>
												@else($image['status']==0)
												<a class="updateImageStatus" id="image-{{$image['id']}}" image_id="{{$image['id']}}" href="javascript:void(0)">Inactive</a>
												@endif
												&nbsp;
												<a
												title="delete" 
												class="confirmDelete"
												href="javascript:void(0)" 
												record="image" 
												recordid="{{$image['id']}}"
												>
												<i class="fa fa-trash"></i>
											</a>
										</td>

									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-sm-9">
							<button type="submit" class="btn btn-success">Update images</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
@endSection