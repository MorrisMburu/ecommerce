@extends('backend.templates.main')

@section('content')
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2> Create Product </h2>
		
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
		<br>
			<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('product.update', $product->id)}}">
										@csrf
										@method('PUT')
				<div class="item form-group ">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="product-category">Product Category<span class="required">*</span></label>
					<select class="form-control col-md-6 col-sm-6" name="product_category">
	
						@foreach($productcategory as $procat)
	
							<option value="{{$procat->id}}" name=product_category>{{$procat->brand_name}}</option>
						
						@endforeach
					</select>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="product-name">Product Name<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="string" id="product_name" value="{{$product->product_name}}"required="required" name="product_name" class="form-control "> 
						</div>
				</div>

											

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="price">Price<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="price" value="{{$product->price}}"required="required" name="price" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="desc">Description<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<textarea id="description" required="required" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10">
                             	{{$product->description}}
								
							</textarea>
						</div>
				</div>


				<div class="ln_solid"></div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 offset-md-3">
                     		<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>

			</form>
		</div>
	</div>
</div>

@endsection