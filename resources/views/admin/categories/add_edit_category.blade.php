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

								<form  name="categoryForm" @if(empty($categorydata['id'])) action="{{url('admin/add-edit-category')}}" @else action="{{url('admin/add-edit-category/'.$categorydata['id'] )}}" @endif id="categoryForm" method="post" enctype="multipart/form-data">@csrf
									<div class="form-row">
										<div class="form-group col-md-8">
											<div class=" col-md-8 ">
												<label for="category_name">Category Name</label>
												<input  type="text" id="category_name" name="category_name" required="required" class="form-control " placeholder="Category Name" 
												@if(!empty($categorydata['category_name']))
												value="{{$categorydata['category_name']}}" 
												@else 
												value="{{old('category_name')}}" 
												@endif>

											</div>
										</div>
									</div>

									<div class="form-row">
										<div class="form-group col-md-8">
											<div class=" col-md-8 ">
												<label for="sections">Sections</label>
												<select id="section_id" name="section_id" class="custom-select">
													<option value="">Section</option>
													@foreach($getSections as $section)
													<option value="{{$section->id}}" 
														@if(!empty($categorydata['section_id']) &&$categorydata['section_id'] ==$section->id) selected @endif>{{$section->name}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>
										<div id="appendCategoriesLevel">
											@include('admin.categories.append_categories_level')
										</div>

										<div class="form-row">
											<div class="form-group col-md-8">
												<div class=" col-md-8 ">
													<label for="category_image">Category Image</label>
													<input type="file" name="category_image" id="category_image"  class="form-control " placeholder="Category Image">
												</div>
												@if(!empty($categorydata['category_image']))
												<div>
													<img style="width: 80px; margin-top:5px" src="{{asset('images/category_images/' .$categorydata['category_image'])}}" alt="">

													<a class="confirmDelete" href="javascript:void(0)" record="category-image" recordid="{{$categorydata['id']}}">
														<?php /* href="{{url('admin/delete-category-image/'.$categorydata['id'])}}"*/ ?>
														Delete Image
												    </a>
												</div>
												@endif
											</div>
										</div>



										<div class="form-row">
											<div class="form-group col-md-8">
												<div class=" col-md-8 ">
													<label for="category_discount">Category Discount</label>
													<input type="text" id="category_discount" name="category_discount"  class="form-control " placeholder="Category Discount"
													@if(!empty($categorydata['category_discount']))
													value="{{$categorydata['category_discount']}}"
													@else
													value="{{old('category_discount')}}" 
													@endif>
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-8">
												<div class=" col-md-8 ">
													<label for="category_url">Category URL</label>
													<input type="text" id="url"  name="url"  class="form-control " placeholder="URL" 
													@if(!empty($categorydata['url']))
													value="{{$categorydata['url']}}" 
													@else 
													value="{{old('url')}}" 
													@endif>
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-8">
												<div class=" col-md-8 ">
													<label for="description"> Description</label>
													<textarea type="text" id="description" name="description"  class="form-control " placeholder="Category Description">
														@if(!empty($categorydata['description'])) 
														{{$categorydata['description']}} 
														@else 
														{{old('description')}} 
														@endif
													</textarea>
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-8">
												<div class=" col-md-8 ">
													<label for="meta_title">Meta Title</label>
													<textarea type="text" id="meta_title" name="meta_title"  class="form-control " placeholder="Meta Title">
														@if(!empty($categorydata['meta_title'])) 
														{{$categorydata['meta_title']}}
														@else 
														{{old('meta_title')}} 
														@endif
													</textarea>
												</div>
											</div>
										</div>	

										<div class="form-row">
											<div class="form-group col-md-8">
												<div class=" col-md-8 ">
													<label for="meta_description">Meta Description</label>
													<textarea type="text" id="meta_description" name="meta_description" required="required" class="form-control " placeholder="Meta Description">
														@if(!empty($categorydata['meta_description'])) 
														{{$categorydata['meta_description']}}
														@else 
														{{old('meta_description')}}
														@endif
													</textarea>
												</div>
											</div>
										</div>

										<div class="form-row">
											<div class="form-group col-md-8">
												<div class=" col-md-8 ">
													<label for="meta_keywords">Meta Keywords</label>
													<textarea type="text" id="meta_keywords" name="meta_keywords" required="required" class="form-control" placeholder="Meta Keywords">
														@if(!empty($categorydata['meta_keywords'])) 
														{{$categorydata['meta_keywords']}} 
														@else 
														{{old('meta_keywords')}}
														@endif
													</textarea>
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
	@endSection