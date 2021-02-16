@extends('web.layout')
@section('content')
	<div class="content">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
		    	@if(isset($data['phone']) && $data['phone'])
		    		<form method="get" action="{{route('phone_verified')}}">
		    			@csrf
		    			<input type="hidden" name="lt" value="{{isset($data['lt']) ? $data['lt'] : ''}}">
			    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
			    			<div class="h2">Enter Security Code</div>
			    			<hr>
			    			<p>Please check your phone number for a message with your code. Your code is 6 digits long.</p>
			    			<div class="row">
			    				<div class="col-6">
					    			<div class="form-group">
								    	<input
								    		type="text"
								    		class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}"
								    		id="code"
								    		placeholder="Enter code"
								    		name="code"
								    		maxlength="6"
								    		value="{{old('code', '')}}"
								    		required="true"
								    	/>

								    	@if ($errors->has('code'))
				                            <span class="invalid-feedback" role="alert">
				                                <strong>{{ $errors->first('code') }}</strong>
				                            </span>
				                        @endif
								  	</div>
			    				</div>
			    				<div class="col-6">
			    					<div class="form-group text-center">
			    						<label style="font-weight: bold;">We sent your code to: {{ isset($data['phone']) ? $data['phone'] : ''}}</label>
			    					</div>
			    				</div>
			    			</div>
				    		<div class="row" style="padding: 5px;">
				    			<div class="col-6 text-left">
				    				<a href="{{route('sent_code_again', ['lt' => isset($data['lt']) ? $data['lt'] : '', 'phone' => $data['phone']])}}" style="color:blue;">Didn't get a code?</a>
				    			</div>
				    			<div class="col-6 text-right">
				    				<button type="submit" class="btn btn-primary"> Continue</button>
				    				<a href="{{url('/')}}" class="btn btn-info"> Cancel</a>
				    			</div>
				    		</div>
			    		</div>
			    	</form>
		    	@elseif(isset($data['email_verified']))
		    		@if($data['email_verified'])
			    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
			    			<center><p>Successfuly verified account.</p></center>
			    		</div>
			    	@else
			    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
			    			<center><p>Something went wrong, Please try again.</p></center>
			    		</div>
			    	@endif
		    	@elseif(isset($data['phone_verified']))
		    		@if($data['phone_verified'])
			    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
			    			<div class="h2">Verification Account.</div>
			    			<hr>
			    			<p>Successfuly verified account.</p>
			    		</div>
			    	@else
			    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
			    			<div class="h2">Verification Account.</div>
			    			<hr>
			    			<p>Something went wrong, Please try again.</p>
			    		</div>
			    	@endif
		    	@elseif(isset($data['email']) && $data['email'])
		    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
		    			<div class="h2">Verification Link.</div>
		    			<hr>
			    		<div class="">
			    			<p>Please check your email for a message with your verification link.</p>
			    		</div>
		    		</div>
		    	@else
					<div class="card" style="margin-bottom: 20px; margin-top: 20px;">
					  	<div class="card-body">

					  		@if(Session::has('error'))
					  			<div class="alert alert-danger validation">
					  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					  				{{ Session::get('error') }}
					  			</div>
					  		@endif

					  		@if(! is_null(auth()->guard('customer')->user()->email_verified_at)
					  		||! is_null(auth()->guard('customer')->user()->phone_verified_at))
					    		<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
					    			<div class="h2">Verification Account.</div>
					    			<hr>
					    			<p>Successfuly verified account.</p>
					    		</div>
			    		</div>
					    	@endif

					    	
					  	</div>
					</div>
				@endif
			</div>
			<div class="col-2"></div>
		</div>
	</div>
@endsection
