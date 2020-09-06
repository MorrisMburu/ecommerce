@extends('layouts.admin_layouts.main');
@section('content')

<div class="x_panel">
	<div class="row">
		<h3>categories</h3>
		<button class="btn bg-transparent" style="margin-left: auto"><a href="{{url('admin/add-edit-category')}}" >Add Category</a></button>
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
							<table id="categories" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
								<thead>
									<tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">ID</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Section</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 200px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Parent Category</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 52px;" aria-label="Position: activate to sort column ascending">Name</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 56px;" aria-label="Position: activate to sort column ascending">URL</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 56px;" aria-label="Office: activate to sort column ascending">Status</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 56px;" aria-label="Office: activate to sort column ascending">Actions</th>
									</tr>
								</thead>


								<tbody>
									@foreach($categories as $category)
									@if(!isset($category->parentcategory->category_name))
										<?php $parent_category = "Root" ?>
									@else
										<?php $parent_category = $category->parentcategory->category_name ?>
									@endif
									<tr role="row" class="odd">
										<td class="sorting_1">{{$category->id}}</td>
										<td>{{$category->section->name}}</td>
										<td>{{$parent_category}}</td>
										<td>{{$category->category_name}}</td>
										<td>{{$category->url}}</td>
										<td>
											@if($category->status==1)
											<a class="updateCategoryStatus" id="category-{{$category->id}}" category_id="{{$category->id}}" href="javascript:void(0)"><i class='fa fa-toggle-on' status='Active'></i></a>
											@else
											<a class="updateCategoryStatus" id="category-{{$category->id}}" category_id="{{$category->id}}" href="javascript:void(0)"><i class='fa fa-toggle-off' status='Inactive'></i></a>
											@endif
										</td>
										<td>
											<a href="{{url('admin/add-edit-category/'. $category->id)}}"><i class='fa fa-edit' status='Inactive'></i></a>
											&nbsp;
											<a class="confirmDelete" href="javascript:void(0)" record="category" recordid="{{$category->id}}" <?php /* href="{{url('admin/delete-category/'. $category->id)}}"*/ ?> ><i class='fa fa-trash' status='Inactive'></i></a>
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