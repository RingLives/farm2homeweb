@extends('layouts.app',[
    'title' => ''. config('app.name', 'MSME Type'),
    'content_header' => '',
    ])

@section('content')
	<div class="container">
		<div class="card">
	        <div class="card-body">
	        	<style type="text/css">
	        		.elementor img {
	        			height: 300px !important;
    					width: 300px !important;
	        		}
	        	</style>
	        	@error('iscorrect')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		        		@if(isset($data->id_msmetype) && !empty($data->id_msmetype))
				    		<form role="form" action="{{Route('msmetype_edit_action',$data->id_msmetype)}}" method="post">
				    		<input type="hidden" name="id_msmetype" value="{{ isset($data->id_msmetype) ? $data->id_msmetype : 0 }}" id="id_msmetype">
				    	@else
		        			<form action="{{route('msmetype_create_action')}}" method="post">
						@endif
		        			@csrf
			        			<div class="card-body">
				        			<div class="form-group">
							          	<label for="type">Type Name</label>
							          	<input type="text" class="form-control" name="type" id="type" placeholder="type name" value="{{ (isset($data->type) && !empty($data->type)) ? $data->type : old('type') }}">
	    		        				@error('type')
	    	                                <span class="invalid-feedback" role="alert">
	    	                                    <strong>{{ $message }}</strong>
	    	                                </span>
	    	                            @enderror
							        </div>
			        				<div class="form-group">
			        					<label for="type">Status</label>
				        				<select
				        					class="form-control @error('is_active') is-invalid @enderror"
				        					{{-- style="width: 78.8%;" --}}
				        					name="is_active"
				        					id="is_active"
				        					autocomplete="is_active"
				        					value ="{{trim(old('is_active'))}}"
				        				>
				        					<option value="1" {{isset($data->is_active) && $data->is_active == "1" ? 'selected' : ''}}>Enable</option>
				        					<option value="2" {{isset($data->is_active) && $data->is_active == "2" ? 'selected' : ''}}>Disable</option>
				        				</select>
				        				@error('is_active')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>	
			        			<div class="card-footer">
			        				<button type="submit" class="btn btn-primary" style="margin-right:-19px; color: #fff;" id="saveBtn">Save</button>
			        			</div>
				        </form>			        	
					</div>    	
			</div>
		</div>
	</div>
@endsection