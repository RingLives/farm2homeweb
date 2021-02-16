@extends('web.layout')
@section('content')
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			

			<div class="shadow-sm p-3 mb-5 bg-white rounded" style="margin-top: 50px; margin-bottom: 50px;">
				<div class="form-body" style="margin-top: 20px;margin-bottom: 20px;">

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

					<div class="h2">Verify an account.</div>
					<hr>
					<form method="get" action="{{route('send_code')}}">
						@csrf

						@if ($errors->has('verify'))
						    <span class="invalid-feedback" role="alert">
						        <strong>{{ $errors->first('verify') }}</strong>
						    </span>
						@endif
						
						@if(isset($user->email))
						  	<!--<div class="form-group">-->
						   <!-- 	<div class="form-check" style="margin-top: 10px; margin-bottom: 10px;">-->
						   <!--   		<input-->
						   <!--   			type="radio"-->
						   <!--   			class="form-check-input"-->
						   <!--   			id="email"-->
						   <!--   			name="verify"-->
						   <!--   			value="{{$user->email}}"-->
						   <!--   		/>-->
						   <!--   		<label class="form-check-label" for="email">{{$user->email?? ''}}</label>-->
						   <!-- 	</div>-->
						  	<!--</div>-->
						@endif

					  	@if(isset($user->phone))
						  	<div class="form-group">
						    	<div class="form-check" style="margin-top: 10px; margin-bottom: 10px;">
						      		<input
						      			type="radio"
						      			class="form-check-input"
						      			id="phone"
						      			name="verify"
						      			value="{{$user->phone}}"
						      		/>
						      		<label class="form-check-label" for="phone">{{$user->phone?? ''}}</label>
						    	</div>
						  	</div>
						 @endif
					  
					 	<div class="form-group text-right">
					 		<button type="submit" class="btn btn-primary">Send Code</button>
					 	</div>
					</form>
				</div>	
			</div>		
		</div>
		<div class="col-3"></div>
	</div>
@endsection
