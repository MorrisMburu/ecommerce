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

							<form  name="productForm" @if(empty($productdata['id'])) action="{{url('admin/add-edit-product')}}" @else action="{{url('admin/add-edit-product/'.$productdata['id'] )}}" @endif id="productForm" method="post" enctype="multipart/form-data">@csrf
								<div>	
									<div class="col-md-6">
										<div class="form-group">
											<label for="product_name">product Name</label>
											<input  type="text" id="product_name" name="product_name" required="required" class="form-control " placeholder="product Name" 
											@if(!empty($productdata['product_name']))
											value="{{$productdata['product_name']}}" 
											@else 
											value="{{old('product_name')}}" 
											@endif>
										</div>

										<div class="form-group">
											<label for="brand">Select brand</label>
											<select id="brand_id" name="brand_id" class="custom-select">
												<option value="">brand</option>
												@foreach($brands as $brand)
												<option
													value="{{$brand['id']}}"
													@if(!empty($productdata['brand_id']) && $productdata['brand_id'] ==@old('brand_id'))
														selected=""  
													@elseif(!empty($productdata['brand_id']) && $productdata['brand_id'] ==$brand['id']) 
														selected="" 
													@endif>
													{{$brand['name']}}
											 	</option>
												@endforeach
											</select>
										</div>

										<div class="form-group">
											<label for="product_code">product code</label>
											<input  type="text" id="product_code" name="product_code" required="required" class="form-control " placeholder="product Code" 
											@if(!empty($productdata['product_code']))
											value="{{$productdata['product_code']}}" 
											@else 
											value="{{old('product_code')}}" 
											@endif>
										</div>

										<div class="form-group">
											<label for="product_price">product price</label>
											<input  type="text" id="product_price" name="product_price" required="required" class="form-control " placeholder="product price" 
											@if(!empty($productdata['product_price']))
											value="{{$productdata['product_price']}}" 
											@else 
											value="{{old('product_price')}}" 
											@endif>
										</div>
										<div class="form-group">
											<label for="product_weight">product Weight</label>
											<input  type="text" id="product_weight" name="product_weight" required="required" class="form-control " placeholder="product Weight" 
											@if(!empty($productdata['product_weight']))
											value="{{$productdata['product_weight']}}" 
											@else 
											value="{{old('product_weight')}}" 
											@endif>
										</div>
										<div class="form-group">
											<label for="main_image">Main Image</label>
											<input type="file" name="main_image" id="main_image"  class="form-control " placeholder="Main Image">
											<div>Recommended Image Siźe: Width:1040px, Height:1200px</div>
											@if(!empty($productdata['main_image']))
											<div>
												<img style="width: 80px; margin-top:5px" src="{{asset('images/product_images/small/' .$productdata['main_image'])}}" alt="">

												<a class="confirmDelete" href="javascript:void(0)" record="product-image" recordid="{{$productdata['id']}}">

													Delete Image
												</a>
											</div>
											@endif
										</div>
										<div class="form-group">
											<label for="washcare"> wash care</label>
											<textarea type="text" id="washcare" name="washcare"  class="form-control " placeholder="washcare">
												@if(!empty($productdata['washcare'])) 
												{{$productdata['washcare']}} 
												@else 
												{{old('washcare')}} 
												@endif
											</textarea>
										</div>

										<div class="form-group">
											<label for="fabric">Select Fabric</label>
											<select id="fabric" name="fabric" class="custom-select">
												<option 
												@if(!empty($productdata['fabric']))
												value="{{$productdata['fabric']}}" 
												@else 
												value="{{old('fabric')}}" 
												@endif>Fabric</option>
												@foreach($fabricArray as $fabric)
												<option value="{{$fabric}}">{{$fabric}}</option>
												@endforeach
											</select>
										</div>

										<div class="form-group">
											<label for="sleeve">Select Sleeve</label>
											<select id="sleeve" name="sleeve" class="custom-select">
												<option value=""></option>
												@foreach($sleeveArray as $sleeve)
												<option
												@if(!empty($productdata['sleeve']))
												value="{{$productdata['sleeve']}}" 
												@else 
												value="{{old('sleeve')}}" 
												@endif>{{$sleeve}}</option>
												@endforeach
											</select>
										</div>

										<div class="form-group">
											<label for="pattern">Select pattern</label>
											<select id="pattern" name="pattern" class="custom-select">
												<option value="">pattern</option>
												@foreach($patternArray as $pattern)
												<option
												@if(!empty($productdata['pattern']))
												value="{{$productdata['pattern']}}" 
												@else 
												value="{{old('pattern')}}" 
												@endif>{{$pattern}}</option>
												@endforeach
											</select>
										</div>

										<div class="form-group">
											<label for="meta_description">Meta Description</label>
											<textarea type="text" id="meta_description" name="meta_description" required="required" class="form-control " placeholder="Meta Description">
												@if(!empty($productdata['meta_description'])) 
												{{$productdata['meta_description']}}
												@else 
												{{old('meta_description')}}
												@endif
											</textarea>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label for="sections">Category</label>
											<select id="category_id" name="category_id" class="custom-select">
												<option value="">Category</option>
												@foreach($categories as $section)
												<optgroup label="{{$section['name']}}"></optgroup>
												@foreach($section['categories'] as $category)
												<option value="{{$category['id']}}"
												@if(!empty(@old('id')) && $category['id'] ==@old('id'))
												selected="" 
												@elseif(!empty($productdata['category_id']) && $productdata['category_id']==$category['id'])
												selected="" 
												@endif
												>&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;
												{{$category['category_name']}}
											</option>
											@foreach($category['subcategories'] as $subcategory)
											<option value="{{$subcategory['id']}}"
											@if(!empty(@old('id')) && $subcategory['id'] ==@old('id'))
											selected=""
											@elseif(!empty($productdata['category_id']) && $productdata['category_id']==$subcategory['id'])
											selected="" 
											@endif
											>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;{{$subcategory['category_name']}}</option>
											@endforeach
											@endforeach
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label for="product_color">product Color</label>
										<input  type="text" id="product_color" name="product_color" required="required" class="form-control " placeholder="product Color" 
										@if(!empty($productdata['product_color']))
										value="{{$productdata['product_color']}}" 
										@else 
										value="{{old('product_color')}}" 
										@endif>
									</div>
									<div class="form-group">
										<label for="product_discount">product Discount (%)</label>
										<input  type="text" id="product_discount" name="product_discount" required="required" class="form-control " placeholder="product Discount" 
										@if(!empty($productdata['product_discount']))
										value="{{$productdata['product_discount']}}" 
										@else 
										value="{{old('product_discount')}}" 
										@endif>
									</div>
									<div class="form-group">
										<label for="product_video">Product Video</label>
										<input type="file" name="product_video" id="product_video"  class="form-control " placeholder="Product Video">
										@if(!empty($productdata['product_video']))
										<div>
											<a href=" {{url('videos/product_videos/'.$productdata['product_video'])}} " download="">Download</a>
											|&nbsp;
											<a class="confirmDelete" href="javascript:void(0)" record="product-video" recordid="{{$productdata['id']}}">
												
												Delete Video
											</a>
										</div>
										@endif
									</div>

									<div class="form-group">
										<label for="fit">Select fit</label>
										<select id="fit" name="fit" class="custom-select">
											<option value="">fit</option>
											@foreach($fitArray as $fit)
											<option 
											@if(!empty($productdata['fit']))
											value="{{$productdata['fit']}}" 
											@else 
											value="{{old('fit')}}" 
											@endif>
											{{$fit}}
										</option>
										@endforeach
									</select>
								</div>

								<div class="form-group">
									<label for="occasion">Select occasion</label>
									<select id="occasion" name="occasion" class="custom-select">
										<option 
										@if(!empty($productdata['occasion']))
										value="{{$productdata['occasion']}}" 
										@else 
										value="{{old('occasion')}}" 
										@endif
										>
										occasion
									</option>
									@foreach($occasionArray as $occasion)
									<option value="{{$occasion}}">{{$occasion}}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label for="description"> Description</label>
								<textarea type="text" id="description" name="description"  class="form-control " placeholder="product Description">
									@if(!empty($productdata['description'])) 
									{{$productdata['description']}} 
									@else 
									{{old('description')}} 
									@endif
								</textarea>
							</div>



							<div class="form-group">
								<label for="meta_keywords">Meta Keywords</label>
								<textarea type="text" id="meta_keywords" name="meta_keywords" required="required" class="form-control" placeholder="Meta Keywords">
									@if(!empty($productdata['meta_keywords'])) 
									{{$productdata['meta_keywords']}} 
									@else 
									{{old('meta_keywords')}}
									@endif
								</textarea>
							</div>
							<div class="form-group">
								<label for="meta_title">Meta Title</label>
								<textarea type="text" id="meta_title" name="meta_title"  class="form-control " placeholder="Meta Title">
									@if(!empty($productdata['meta_title'])) 
									{{$productdata['meta_title']}}
									@else 
									{{old('meta_title')}} 
									@endif
								</textarea>
							</div>

							<div class="form-group">
								<label for="is_featured">Featured Item</label>
								<input type="checkbox" name="is_featured" id="is_featured" value="Yes"
								@if(!empty($productdata['is_featured']) && $productdata['is_featured'] =="Yes")
								checked="" 
								@endif
								>
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