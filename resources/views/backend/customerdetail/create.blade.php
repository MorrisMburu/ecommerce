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
			<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('customerdetail.store')}}">
										{{ csrf_field() }}

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="f-name">First Name<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="string" id="f_name" required="required" name="f_name" class="form-control "> 
						</div>
				</div>

											

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="l_name">Last name<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="l_name" required="required" name="l_name" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="company_name">company_name<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="company_name" required="required" name="company_name" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">Phone<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="phone" required="required" name="phone" class="form-control "> 
						</div>
				</div>


				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">email<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="email" required="required" name="email" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="country">country<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="country" required="required" name="country" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="address">address<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="address" required="required" name="address" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="postcode">postcode<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="postcode" required="required" name="postcode" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="town">town<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="town" required="required" name="town" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="notes">Other Notes<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<textarea id="other_notes" required="required" class="form-control" name="other_notes" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10">

								
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