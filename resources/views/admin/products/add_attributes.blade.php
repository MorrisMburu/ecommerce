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

							<form  name="addAttributeForm" id="addAttributeForm" action=" {{url('admin/add-attributes/' .$productdata['id'])}} " method="post">@csrf
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

								<div class="col-12">
									<div class="field_wrapper">
										<div>
											<input id="size"  placeholder="size" type="text" name="size[]" required="" value=""/>
											<input id="sku"  placeholder="sku" type="text" name="sku[]" required="" value=""/>
											<input id="price"  placeholder="price" type="number" name="price[]" required="" value=""/>
											<input id="stock"  placeholder="stock" type="number" name="stock[]" required="" value=""/>
											<a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-9 col-sm-9">
										<button type="submit" class="btn btn-success">Add Attributes</button>
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
		<h3>Product Attributes</h3>
		
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form name="editAttributeForm" id="editAttributeForm" method="post" action=" {{url('admin/edit-attributes/' . $productdata['id'])}} ">@csrf
				<div class="card-box table-responsive">
					<div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
						<div class="row">
							<div class="col-sm-12">
								<table id="attributes" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
											<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Size</th>
											<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">SKU</th>
											<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 50px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Price</th>
											<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 52px;" aria-label="Position: activate to sort column ascending">Stock</th>
											<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 75px;" aria-label="Office: activate to sort column ascending">Actions</th>
										</tr>
									</thead>


									<tbody>
										@foreach($productdata['attributes'] as $attribute)
										<input type="hidden" name="attrId[]" value="{{$attribute['id']}}">
										<tr role="row" class="odd">
											<td class="sorting_1">{{$attribute['id']}}</td>
											<td>{{$attribute['size']}}</td>
											<td>{{$attribute['sku']}}</td>
											<td>
												<input type="number" name="price[]" required="" value="{{$attribute['price']}}">
											</td>
											<td>
												<input type="number"  name="stock[]" required="" value="{{$attribute['stock']}}">
											</td>

											<td>
												@if($attribute['status']==1)
												<a class="updateAttributeStatus" id="attribute-{{$attribute['id']}}" attribute_id="{{$attribute['id']}}" href="javascript:void(0)">Active</a>
												@else($attribute['status']==0)
												<a class="updateAttributeStatus" id="attribute-{{$attribute['id']}}" attribute_id="{{$attribute['id']}}" href="javascript:void(0)">Inactive</a>
												@endif
												&nbsp;
												<a
													title="delete" 
													class="confirmDelete"
													href="javascript:void(0)" 
													record="attribute" 
													recordid="{{$attribute['id']}}"
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
								<button type="submit" class="btn btn-success">Update Attributes</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endSection