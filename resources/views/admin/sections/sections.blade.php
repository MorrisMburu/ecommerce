@extends('layouts.admin_layouts.main');
@section('content')

<div class="x_panel">
	<h2>Sections</h2>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box table-responsive">
					<div id="datatable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
						<div class="row">
							<div class="col-sm-12">
								<table id="sections" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="datatable_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 152px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Name</th>
											<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 235px;" aria-label="Position: activate to sort column ascending">ID</th>
											<th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">Status</th>
										</tr>
									</thead>


									<tbody>
										@foreach($sections as $section)
											<tr role="row" class="odd">
												<td class="sorting_1">{{$section->name}}</td>
												<td>{{$section->id}}</td>
												<td>
													@if($section->status==1)
														<a class="updateSectionStatus" id="section-{{$section->id}}" section_id="{{$section->id}}" href="javascript:void(0)">Active</a>
													@else
														<a class="updateSectionStatus" id="section-{{$section->id}}" section_id="{{$section->id}}" href="javascript:void(0)">Inactive</a>
													@endif
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