@extends('backend.templates.main')

@section('content')
<div class="col-md-12 col-sm-12 ">
	<div class="x_panel">
		<div class="x_title">
			<h2> Create Product Category</h2>
		
							<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br>
									<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('productcategory.store')}}">
										@csrf

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="brand-name"> Brand Name <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="string" id="brand_name" required="required" name="brand_name" class="form-control "> 
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<button class="btn btn-primary" type="button">Cancel</button>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
@endsection