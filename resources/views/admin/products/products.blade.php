@extends('layouts.admin_layouts.main');
@section('content')

<div class="x_panel">
	<div class="row">
		<h3>Products</h3>
		<button class="btn bg-transparent" style="margin-left: auto"><a href="{{url('admin/add-edit-product')}}" >Add Product</a></button>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box table-responsive">
				@if(Session::has('success_message'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					{{Session::get('success_message')}}
				</div>
				@endif
				<div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
					<div class="row">
						<div class="col-sm-12">
							<table id="products" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
								<thead>
									<tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Product Name</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Product Code</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 52px;" aria-label="Position: activate to sort column ascending">Color</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 52px;" aria-label="Position: activate to sort column ascending">Category</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 52px;" aria-label="Position: activate to sort column ascending">Section</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 56px;" aria-label="Office: activate to sort column ascending">Status</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 56px;" aria-label="Office: activate to sort column ascending">Actions</th>
									</tr>
								</thead>


								<tbody>
									@foreach($products as $product)
									@if(!isset($product->parentproduct->product_name))
									<?php $parent_product = "Root" ?>
									@else
									<?php $parent_product = $product->parentproduct->product_name ?>
									@endif
									<tr role="row" class="odd">
										<td class="sorting_1">{{$product->id}}</td>
										<td>{{$product->product_name}}</td>
										<td>{{$product->product_code}}</td>
										<td>{{$product->product_color}}</td>
										<td>{{$product->category->category_name}}</td>
										<td>{{$product->section->name}}</td>
										<td>
											@if($product->status==1)
											<a class="updateProductStatus" id="product-{{$product->id}}" product_id="{{$product->id}}" href="javascript:void(0)">Active</a>
											@else
											<a class="updateProductStatus" id="product-{{$product->id}}" product_id="{{$product->id}}" href="javascript:void(0)">Inactive</a>
											@endif
										</td>
										<td>
											<a href="{{url('admin/add-edit-product/'. $product->id)}}">Edit</a>
											&nbsp;
											<a class="confirmDelete" href="javascript:void(0)" record="product" recordid="{{$product->id}}" <?php /* href="{{url('admin/delete-product/'. $product->id)}}"*/ ?> >Delete</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection