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
			<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('contactform.update', $contactForm->id)}}">
										@csrf
										@method('PUT')
				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="product-name">Name<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="string" id="name" required="required" value="{{$contactForm->name}}" name="name" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="subject">subject<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="subject" required="required" name="subject" value="{{$contactForm->subject}}" class="form-control "> 
						</div>
				</div>

											

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">email<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="text" id="email" required="required" name="email"value="{{$contactForm->email}}" class="form-control "> 
						</div>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="message_form">Message<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<textarea id="message_form" required="required" class="form-control" name="message_form" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10">
								value="{{$contactForm->message_form}}"
								
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