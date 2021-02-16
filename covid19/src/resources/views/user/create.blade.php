@extends('layouts.app',[
    'title' => ''. config('app.name', 'E-Haque'),
    'content_header' => '',
    ])

@section('content')
	<div class="container">
		<div class="card">
	        <div class="card-body">
	        	@error('iscorrect')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

		        	<div class="shadow-sm p-3 mb-5 bg-white rounded" id="question_">
		        		@if(isset($data->id) && !empty($data->id))
				    		<form role="form" action="{{Route('user_edit_action',$data->id)}}" method="post">
				    		<input type="hidden" name="id" value="{{ isset($data->id) ? $data->id : 0 }}" id="id">
				    	@else
		        			<form action="{{route('user_create_action')}}" method="post">
						@endif
		        			@csrf
			        		
		        			<div class="row col-offset-md-2">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">First Name :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('first_name') is-invalid @enderror"
				        					style="width: 78.8%;"
				        					name="first_name"
				        					id="first_name"
				        					autocomplete="first_name"
				        					value ="{{$data->first_name ?? trim(old('first_name'))}}"
				        				/>
				        				@error('first_name')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>
			        		
		        			<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Last Name :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('last_name') is-invalid @enderror"
				        					style="width: 78.8%;"
				        					name="last_name"
				        					id="last_name"
				        					autocomplete="last_name"
				        					value ="{{$data->last_name ?? trim(old('last_name'))}}"
				        				/>
				        				@error('last_name')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>
			        		
			        		<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">National ID :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('national_id') is-invalid @enderror"
				        					type="number"
				        					style="width: 78.8%;"
				        					name="national_id"
				        					id="national_id"
				        					autocomplete="national_id"
				        					value ="{{$data->national_id ?? trim(old('national_id'))}}"
				        				/>
				        				@error('national_id')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>
			        		
			        		<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Mobile No :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('mobile_no') is-invalid @enderror"
				        					style="width: 78.8%;"
				        					type="text"
				        					name="mobile_no"
				        					id="mobile_no"
				        					autocomplete="mobile_no"
				        					value ="{{$data->mobile_no ?? trim(old('mobile_no'))}}"
				        				/>
				        				@error('mobile_no')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>
			        		
			        		<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Email :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('email') is-invalid @enderror"
				        					style="width: 78.8%;"
				        					name="email"
				        					id="email"
				        					autocomplete="email"
				        					value ="{{$data->email ?? trim(old('email'))}}"
				        				/>
				        				@error('email')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>
			        		
			        		<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">{{__('Password :')}}</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('password') is-invalid @enderror"
				        					style="width: 78.8%;"
				        					name="password"
				        					id="password"
				        					autocomplete="password"
				        				/>
				        				@error('password')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>
			        		
			        		<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">{{ __('Confirm Password :') }}</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('password') is-invalid @enderror"
				        					style="width: 78.8%;"
				        					name="password"
				        					id="password"
				        					autocomplete="password"
				        				/>
				        				@error('password')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>


			        		<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Role :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<select
				        					class="form-control @error('role_id') is-invalid @enderror"
				        					style="width: 78.8%;"
				        					name="role_id"
				        					id="role_id"
				        					autocomplete="role_id"
				        					value ="{{trim(old('role_id'))}}"
				        				>
				        				<option>--Select--</option>
				        					@if(count($rolelists) > 0)
					        					@foreach($rolelists as $rolelist)
					        						<option value="{{ $rolelist->id_role }}" {{isset($data->role_id) && $data->role_id == $rolelist->id_role ? 'selected' : ''}}>{{ $rolelist->name }}</option>
					        					@endforeach
				        					@endif
				        				</select>
				        				@error('role_id')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>

		        			<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Status :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<select
				        					class="form-control @error('is_active') is-invalid @enderror"
				        					style="width: 78.8%;"
				        					name="is_active"
				        					id="is_active"
				        					autocomplete="is_active"
				        					value ="{{trim(old('is_active'))}}"
				        				>
				        					<option value="1" {{isset($data->is_active) && $data->is_active == "1" ? 'selected' : ''}}>Enable</option>
				        					<option value="2" {{isset($data->is_active) && $data->is_active == "2" ? 'selected' : ''}}>Disable</option>
				        				</select>
				        				@error('status')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>
				        		<div class="row">
				        		<div class="col-5"></div>
				        		<div class="col-2" style="margin-left: -15px;">
				        			<div class="form-group">
				        				<button type="submit" class="btn btn-primary form-control" style="margin-right:-19px;" id="saveBtn">Save</button>
				        			</div>
				        		</div>
				        		<div class="col-2"></div>
				        	</div>
		        			</div>		        			
				        </form>			        	
					</div>    	
			</div>
		</div>
	</div>
@endsection