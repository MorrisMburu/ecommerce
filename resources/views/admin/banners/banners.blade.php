@extends('layouts.admin_layouts.main');
@section('content')

<div class="x_panel">
	<div class="row">
		<h2>Banner</h2>
		<button class="btn bg-transparent" style="margin-left: auto"><a href="{{url('admin/add-edit-banner')}}" >Add Banner</a></button>
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
							<table id="brands" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
								<thead>
									<tr role="row">
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 55px;" aria-label="Position: activate to sort column ascending">ID</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Image</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Link</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Title</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Alt</th>
										<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 36px;" aria-label="Office: activate to sort column ascending">Action</th>
									</tr>
								</thead>


								<tbody>
									@foreach($banners as $banner)
									<tr role="row" class="odd">
										<td class="sorting_1">{{$banner['id']}}</td>
										<td>
											<img width="300px" src="{{asset('images/banner_images/' .$banner['image'])}}">
										</td>
										<td>{{$banner['link']}}</td>
										<td>{{$banner['title']}}</td>
										<td>{{$banner['alt']}}</td>
										<td>
											@if($banner['status']==1)
											<a class="updateBannerStatus" id="banner-{{$banner['id']}}" banner_id="{{$banner['id']}}" href="javascript:void(0)"><i class="fa fa-toggle-on" status="Active"></i></a>
											@else
											<a class="updateBannerStatus" id="banner-{{$banner['id']}}" banner_id="{{$banner['id']}}" href="javascript:void(0)"><i class="fa fa-toggle-off" status="Inactive"></i></a>
											@endif
											&nbsp;&nbsp;&nbsp;
											<a title="edit" href="{{url('admin/add-edit-banner/'. $banner['id'])}}"><i class="fa fa-edit"></i></a>&nbsp;
											<a title="delete" class="confirmDelete" href="javascript:void(0)" record="banner" recordid="{{$banner['id']}}" <?php /* href="{{url('admin/delete-banner/'. $banner->id)}}"*/ ?> ><i class="fa fa-trash"></i></a>
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