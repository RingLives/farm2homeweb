@extends('web.layout')
@section('content')
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4">
			@if(Session::has('error'))
				<div class="alert alert-danger validation" style="margin: 10px;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					{{ Session::get('error') }}
				</div>
			@endif

			@if (Session::has('success'))
			  <div class="alert alert-success alert-dismissible" style="margin: 10px;">
			    <button type="button" class="close" data-dismiss="alert">&times;</button>
			    {{ Session::get('success') }}
			  </div>
			@endif

			<div class="form" style="background-color: #E8EAE0; padding: 20px; margin: 10px;">
				<div class="form-header">
					<div class="h1" style="line-height: 0.9em;">
						<p class="text-center">Home Delivery</p>
						<p class="text-center">Availability</p>
						<p class="text-center">Check</p>
					</div>

					<p class="text-center">Please enter your address.</p>
					<hr width="30%">
				</div>
				<div class="form-body" style="margin-top: 20px;margin-bottom: 20px;">
					<form method="post" action="{{route('form_store')}}">
						@csrf
					  <div class="form-group">
					    	<input
					    		type="text"
					    		class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
					    		id="address"
					    		placeholder="Street address"
					    		name="address"
					    		value="{{old('address', '')}}"
					    	/>

					    	@if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif

					    	<div class="form-check" style="margin-top: 10px; margin-bottom: 10px;">
					      		<input
					      			type="radio"
					      			class="form-check-input"
					      			id="apartment_or_condo"
					      			name="apartment_or_condo"
					      			value="1"
					      		/>
					      		<label class="form-check-label" for="apartment_or_condo">Apartment/Condo Building?</label>
					    	</div>
					  	</div>

					  	<div class="form-group">
					    	<input
					    		type="text"
					    		class="form-control{{ $errors->has('zip_code') ? ' is-invalid' : '' }}"
					    		id="zip_code"
					    		placeholder="Zip Code"
					    		name="zip_code"
					    		value="{{old('zip_code', '')}}"
					    	/>

					    	@if ($errors->has('zip_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('zip_code') }}</strong>
                                </span>
                            @endif
					  	</div>

					  	<div class="form-group">
					    	<input
					    		type="email"
					    		class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
					    		id="email"
					    		placeholder="Email Address"
					    		name="email"
					    		value="{{old('email', '')}}"
					    	/>
					    	@if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
					  	</div>
					  
					 	<center><button type="submit" class="btn btn-primary">Submit</button></center>
					</form>
				</div>	
			</div>		
		</div>
		<div class="col-4"></div>
	</div>
	
@endsection
