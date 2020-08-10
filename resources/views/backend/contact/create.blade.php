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
			<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('contact.store')}}">
										{{ csrf_field() }}

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="location">Location<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="string" id="location" required="required" name="location" class="form-control "> 
						</div>
				</div>

											

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">email<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="email" required="required" name="email" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="address">address<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="address" required="required" name="address" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="phone">phone<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="phone" required="required" name="phone" class="form-control "> 
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