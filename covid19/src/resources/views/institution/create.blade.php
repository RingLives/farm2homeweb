@extends('layouts.app',[
    'title' => ''. config('app.name', 'E-Haque'),
    'content_header' => '',
    ])

@section('content')
	<div class="container-fluid">
	 	<div class="row">
	 		<div class="col-md-3"></div>
			<div class="col-md-12">
			  <div class="card card-primary">
		    	@if(isset($data->id_institution) && !empty($data->id_institution))
		    		<form role="form" action="{{Route('institution_edit_action',$data->id_institution)}}" method="post">
		    		<input type="hidden" name="id_institution" value="{{ isset($data->id_institution) ? $data->id_institution : 0 }}" id="id_institution">
		    	@else
		    		<form role="form" action="{{ Route('institution_create_action') }}" method="post">
				@endif
				@csrf
			      <div class="card-body">
			        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			          	<label for="name">Name of Financial Institution</label>
			          	<input type="text" class="form-control" name="name" id="name" placeholder="Name of Financial Institution" value="{{ (isset($data->name) && !empty($data->name)) ? $data->name : old('name') }}">
			          	@if($errors->has('name'))
	                    	<span class="help-block">
		          	            <strong>
		          	            	{{ $errors->first('name') }}
		          	            </strong>
	                    	</span>
	                  	@endif
			        </div>
			        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			          	<label for="name">Address details</label>
			          	<input type="text" class="form-control" name="address_details" id="address_details" placeholder="Address details" value="{{ (isset($data->address_details) && !empty($data->address_details)) ? $data->address_details : old('address_details') }}">
			          	@if($errors->has('address_details'))
	                    	<span class="help-block">
		          	            <strong>
		          	            	{{ $errors->first('address_details') }}
		          	            </strong>
	                    	</span>
	                  	@endif
			        </div>
			        <div class="form-group">
			          <label for="district_name">District Name</label>
			          <select name="district_name" class="form-control">
			          	<option value="1" {{ (isset($data->district_name) && ($data->district_name == 1)) ? 'selected' : '' }}>Dhaka</option>
			          	<option value="0" {{ (isset($data->district_name) && ($data->district_name == 0)) ? 'selected' : '' }}>Khulna</option>
			          </select>
			        </div>
			        <div class="form-group">
			          <label for="type">Address Type</label>
			          <select name="type" class="form-control">
			          	<option value="1" {{ (isset($data->type) && ($data->type == 1)) ? 'selected' : '' }}>City Corporation</option>
			          	<option value="2" {{ (isset($data->type) && ($data->type == 2)) ? 'selected' : '' }}>UpaZila</option>
			          	<option value="3" {{ (isset($data->type) && ($data->type == 3)) ? 'selected' : '' }}>Municipality</option>
			          </select>
			        </div>
			        <div class="form-group">
			          <label for="city">City Corporation</label>
			          <select name="city" class="form-control">
			          	<option value="1" {{ (isset($data->city) && ($data->city == 1)) ? 'selected' : '' }}> Corporation 1</option>
			          </select>
			        </div>
			        <div class="form-group">
			          <label for="union">UpaZila</label>
			          <select name="union" class="form-control">
			          	<option value="1" {{ (isset($data->union) && ($data->union == 1)) ? 'selected' : '' }}> UpaZila 1</option>
			          	<option value="2" {{ (isset($data->union) && ($data->union == 2)) ? 'selected' : '' }}> UpaZila 2</option>
			          </select>
			        </div>
			        <div class="form-group">
			          <label for="word">Municipality</label>
			          <select name="word" class="form-control">
			          	<option value="1" {{ (isset($data->word) && ($data->word == 1)) ? 'selected' : '' }}> Municipality 1</option>
			          	<option value="2" {{ (isset($data->word) && ($data->word == 2)) ? 'selected' : '' }}> Municipality 2</option>
			          </select>
			        </div>
    		        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    		          	<label for="name">longitude coordinate</label>
    		          	<input type="text" class="form-control" name="longitude" id="longitude" placeholder="longitude coordinate" value="{{ (isset($data->longitude) && !empty($data->longitude)) ? $data->longitude : old('longitude') }}">
    		          	@if($errors->has('longitude'))
                        	<span class="help-block">
    	          	            <strong>
    	          	            	{{ $errors->first('longitude') }}
    	          	            </strong>
                        	</span>
                      	@endif
    		        </div>
    		        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    		          	<label for="name">latitude coordinate</label>
    		          	<input type="text" class="form-control" name="latitude" id="latitude" placeholder="latitude coordinate" value="{{ (isset($data->latitude) && !empty($data->latitude)) ? $data->latitude : old('latitude') }}">
    		          	@if($errors->has('latitude'))
                        	<span class="help-block">
    	          	            <strong>
    	          	            	{{ $errors->first('latitude') }}
    	          	            </strong>
                        	</span>
                      	@endif
    		        </div>
    		        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    		          	<label for="name">Phone</label>
    		          	<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="{{ (isset($data->phone) && !empty($data->phone)) ? $data->phone : old('phone') }}">
    		          	@if($errors->has('phone'))
                        	<span class="help-block">
    	          	            <strong>
    	          	            	{{ $errors->first('phone') }}
    	          	            </strong>
                        	</span>
                      	@endif
    		        </div>
    		        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    		          	<label for="name">Email Address</label>
    		          	<input type="text" class="form-control" name="email" id="email" placeholder="Email Address" value="{{ (isset($data->email) && !empty($data->email)) ? $data->email : old('email') }}">
    		          	@if($errors->has('email'))
                        	<span class="help-block">
    	          	            <strong>
    	          	            	{{ $errors->first('email') }}
    	          	            </strong>
                        	</span>
                      	@endif
    		        </div>
    		        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    		          	<label for="name">Mobile Number</label>
    		          	<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" value="{{ (isset($data->mobile) && !empty($data->mobile)) ? $data->mobile : old('mobile') }}">
    		          	@if($errors->has('mobile'))
                        	<span class="help-block">
    	          	            <strong>
    	          	            	{{ $errors->first('mobile') }}
    	          	            </strong>
                        	</span>
                      	@endif
    		        </div>
			        <div class="form-group">
			          <label for="is_active">Status</label>
			          <select name="is_active" class="form-control">
			          	<option value="1" {{ (isset($data->is_active) && ($data->is_active == 1)) ? 'selected' : '' }}>Active</option>
			          	<option value="0" {{ (isset($data->is_active) && ($data->is_active == 0)) ? 'selected' : '' }}>Inactive</option>
			          </select>
			        </div>
			      </div>
			      <div class="card-footer">
			        <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
			      </div>
			    </form>
			  </div>
			</div>
		</div>
	</div>
@endsection