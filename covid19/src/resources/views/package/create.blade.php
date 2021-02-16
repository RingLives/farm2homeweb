@extends('layouts.app',[
    'title' => 'Create Student Groups | '. config('app.name', 'E-Haque'),
    'content_header' => 'Create Student Groups',
    ])

@section('content')
	<div class="container">
		<div class="card">
	        <div class="card-body">
	        	{{-- @include("includes.form-success") --}}

	        	@error('iscorrect')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

		        	<div class="shadow-sm p-3 mb-5 bg-white rounded" id="question_">

		        		@if(isset($data->id_package) && !empty($data->id_package))
				    		<form role="form" action="{{Route('package_edit_action',$data->id_package)}}" method="post">
				    		<input type="hidden" name="id_package" value="{{ isset($data->id_package) ? $data->id_package : 0 }}" id="id_package">
				    	@else
		        			<form action="{{route('package_create_action')}}" method="post">
						@endif
		        			@csrf

		        			<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Name :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('package_name') is-invalid @enderror"
				        					name="package_name"
				        					style="width: 78.8%;"
				        					id="package_name"
				        					autocomplete="package_name"
				        					placeholder="Name"
				        				 value="{{$data->package_name ?? old('package_name')}}" />

				        				@error('package_name')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>

		        			<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Description :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('description') is-invalid @enderror"
				        					name="package_description"
				        					style="width: 78.8%;"
				        					id="package_description"
				        					autocomplete="description"
				        					placeholder="Description"
				        				 value="{{ $data->package_description ?? trim(old('package_description'))}}" />

				        				@error('package_description')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>

		        			<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Packages for :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('packages_for') is-invalid @enderror"
				        					name="packages_for"
				        					style="width: 78.8%;"
				        					id="packages_for"
				        					autocomplete="packages_for"
				        					placeholder="Packages for"
				        				 value="{{$data->packages_for ?? trim(old('packages_for'))}}" />

				        				@error('packages_for')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>

		        			<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Package Amount :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('package_amount') is-invalid @enderror"
				        					type="text"
				        					name="package_amount"
				        					style="width: 78.8%;"
				        					id="title"
				        					autocomplete="package_amount"
				        					placeholder="Packages Amount"
				        				 value="{{$data->package_amount ?? trim(old('package_amount'))}}" />

				        				@error('package_amount')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>

		        			<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Loan Amount :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('loan_amount') is-invalid @enderror"
				        					type="text"
				        					name="loan_amount"
				        					style="width: 78.8%;"
				        					id="loan_amount"
				        					autocomplete="loan_amount"
				        					placeholder="Loan Amount"
				        				 value="{{$data->loan_amount ?? trim(old('loan_amount'))}}" />

				        				@error('loan_amount')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>

		        			<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">Start Date :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('start_date') is-invalid @enderror"
				        					type="date"
				        					name="start_date"
				        					style="width: 78.8%;"
				        					id="start_date"
				        					autocomplete="start_date"
				        				 value="{{$data->start_date ?? trim(old('start_date'))}}" />

				        				@error('start_date')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>

		        			<div class="row">
			        			<div class="col-2" style="margin-top: 8px;">
			        				<strong><p class="text-right">End Date :</p></strong>
			        			</div>
			        			<div class="col-6">
			        				<div class="form-group">
				        				<input
				        					class="form-control @error('end_date') is-invalid @enderror"
				        					type="date"
				        					name="end_date"
				        					style="width: 78.8%;"
				        					id="end_date"
				        					autocomplete="end_date"
				        				 value="{{$data->end_date ?? trim(old('end_date'))}}" />

				        				@error('end_date')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
				        			</div>
			        			</div>
			        		</div>
			        		
			        			<div class="row">
				        			<div class="col-2" style="margin-top: 8px;">
				        				<strong><p class="text-right">Package for Districts :</p></strong>
				        			</div>
				        			<div class="col-6">
				        				<div class="form-group">
					        				<select
					        					class="form-control @error('package_districts') is-invalid @enderror"
					        					style="width: 78.8%;"
					        					name="package_districts"
					        					id="package_districts"
					        					autocomplete="package_districts"
					        				>
					        					<option>--Select--</option>
					        					<option value="1" {{isset($data->package_districts) && $data->package_districts == "1" ? 'selected' : ''}}>Dhaka</option>
					        					<option value="2" {{isset($data->package_districts) && $data->package_districts == "2" ? 'selected' : ''}}>Khulna</option>
					        				</select>
					        				@error('package_districts')
				                                <span class="invalid-feedback" role="alert">
				                                    <strong>{{ $message }}</strong>
				                                </span>
				                            @enderror
					        			</div>
				        			</div>
				        		</div>
			        		
			        			<div class="row">
				        			<div class="col-2" style="margin-top: 8px;">
				        				<strong><p class="text-right">Package Audience :</p></strong>
				        			</div>
				        			<div class="col-6">
				        				<div class="form-group">
					        				<select
					        					class="form-control @error('package_audience') is-invalid @enderror"
					        					style="width: 78.8%;"
					        					name="package_audience"
					        					id="package_audience"
					        					autocomplete="package_audience"
					        					value ="{{trim(old('package_audience'))}}"
					        				>
					        					<option>--Select--</option>
					        					<option value="0" {{isset($data->package_audience) && $data->package_audience == "0" ? 'selected' : ''}}>Farmer</option>
					        					@if(count($msmetypelists) > 0)
						        					@foreach($msmetypelists as $msmetypelist)
						        						<option value="{{ $msmetypelist->id_msmetype }}" {{isset($data->package_audience) && $data->package_audience == $msmetypelist->id_msmetype ? 'selected' : ''}}>{{ $msmetypelist->type }}</option>
						        					@endforeach
					        					@endif
					        				</select>
					        				@error('package_audience')
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
					        				<button type="submit" class="btn btn-primary form-control" style="margin-right:-19px; color: #fff;" id="saveBtn">Save</button>
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