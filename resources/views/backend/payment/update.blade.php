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
			<form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="{{route('payment.update', $payment->id)}}">
										@csrf
										@method('PUT')
				<div class="item form-group ">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="customerDetail">Customer Name<span class="required">*</span></label>
					<select class="form-control col-md-6 col-sm-6" name="customer_id">
	
						@foreach($customerDetail as $procat)
	
							<option value="{{$procat->id}}" name="customer_id">{{$procat->f_name}}</option>
						
						@endforeach
					</select>
				</div>

				<div class="item form-group">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="Total">Total Ammount<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 ">
							<input type="string" id="total" required="required" value="{{$payment->total}}" name="total" class="form-control "> 
						</div>
				</div>

				<div class="item form-group ">
					<label class="col-form-label col-md-3 col-sm-3 label-align" for="payment_type">Payment Type<span class="required">*</span></label>
					<select class="form-control col-md-6 col-sm-6" name="payment_type">
	
					
	
							<option value="cash" name="payment_type">Cash on Delivery</option>
							<option value="card" name="payment_type">Card</option>
						
					
					</select>
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