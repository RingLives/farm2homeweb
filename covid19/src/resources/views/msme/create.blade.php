@extends('layouts.app',[
    'title' => ''. config('app.name', 'E-Haque'),
    'content_header' => '',
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

                <div class="shadow-sm p-3  bg-white rounded" id="question_">

                    @if(isset($data->id_farmer) && !empty($data->id_farmer))
                        <form role="form" action="{{Route('msme_create',$data->id_farmer)}}" method="post">
                            <input type="hidden" name="id_farmer" value="{{ isset($data->id_farmer) ? $data->id_farmer : 0 }}" id="id_farmer">
                            @else
                                <form action="{{route('msme_create')}}" method="post">
                                    @endif
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="col-md-6"><h4>Basic Information:</h4></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Name of the owner :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="name"
                                                            id="name"
                                                            autocomplete="name"
                                                            value ="{{$data->name ?? trim(old('name'))}}"
                                                        />
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Father's name :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input
                                                            class="form-control @error('father_name') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="father_name"
                                                            id="father_name"
                                                            autocomplete="father_name"
                                                            value ="{{$data->father_name ?? trim(old('father_name'))}}"
                                                        />
                                                        @error('father_name')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">National id :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input
                                                            class="form-control @error('national_id') is-invalid @enderror"
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

                                            <input hidden
                                                   name="type"
                                                   id="type"
                                                   value ="1"
                                            />

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right"> Msme Type :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <select
                                                            class="form-control @error('msme_type') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="msme_type"
                                                            id="msme_type"
                                                            autocomplete="msme_type"
                                                            value ="{{trim(old('msme_type'))}}"
                                                        >

                                                        @foreach($msme_type as $msme)
                                                            <option value="{{$msme->type}}" {{isset($data->msme_type) && $data->msme_type == $msme->type ? 'selected' : ''}}>{{$msme->type}}</option>

                                                        @endforeach

                                                        </select>
                                                        @error('msme_type')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        <div class="row">
                                            <div class="col-md-12"><h4>Living Address with GPS location:</h4></div>
                                        </div>
                                        <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Address Details :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                        <textarea
                                            class="form-control @error('living_address_details') is-invalid @enderror"
                                            style="width: 78.8%;"
                                            name="living_address_details"
                                            id="living_address_details"
                                            autocomplete="living_address_details"
                                            value ="{{$data->living_address_details ?? trim(old('living_address_details'))}}"
                                        >{{$data->living_address_details ?? trim(old('living_address_details'))}}</textarea>
                                                        @error('living_address_details')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">District Name :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <select
                                                            class="form-control @error('living_district_name') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="living_district_name"
                                                            id="living_district_name"
                                                            autocomplete="living_district_name"
                                                            value ="{{trim(old('living_district_name'))}}"
                                                        >
                                                            @foreach($districts as $district)
                                                                <option value="{{$district->id}}" {{isset($data->living_district_name) && $data->living_district_name == $district->id ? 'selected' : ''}}>{{$district->district_name_eng}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('living_district_name')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Select Type :</p></strong>
                                                </div>

                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <select
                                                            class="form-control @error('living_type') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="living_type"
                                                            id="living_type"
                                                            autocomplete="living_type"
                                                            value ="{{trim(old('living_type'))}}"
                                                        >
                                                            <option value="1" >Zilla</option>
                                                            <option value="2" >Upzilla</option>
                                                        </select>
                                                        @error('living_type')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Select Zilla :</p></strong>
                                                </div>

                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <select
                                                            class="form-control @error('Zilla') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="living_type_id"
                                                            id="living_type_id"
                                                            autocomplete="living_type_id"
                                                            value ="{{trim(old('Zilla'))}}"
                                                        >
                                                            <option value="1" >Zilla</option>
                                                            <option value="2" >Upzilla</option>
                                                        </select>
                                                        @error('Zilla')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Latitude :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input
                                                            class="form-control @error('living_latitude') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="living_latitude"
                                                            id="living_latitude"
                                                            autocomplete="living_latitude"
                                                            value ="{{$data->living_latitude ?? trim(old('living_latitude'))}}"
                                                        />
                                                        @error('living_latitude')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Longitude :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input
                                                            class="form-control @error('living_longitude') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="living_longitude"
                                                            id="living_longitude"
                                                            autocomplete="living_longitude"
                                                            value ="{{$data->living_longitude ?? trim(old('living_longitude'))}}"
                                                        />
                                                        @error('living_longitude')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="row">
                                                <div class="col-md-12"><h4>Production house/ show room physical address with GPS location:</h4></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Organization name</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input
                                                            class="form-control @error('physical_organization_name') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="physical_organization_name"
                                                            id="physical_organization_name"
                                                            autocomplete="physical_organization_name"
                                                            value ="{{$data->physical_organization_name ?? trim(old('physical_organization_name'))}}"
                                                        />
                                                        @error('physical_organization_name')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Address Details :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                        <textarea
                                            class="form-control @error('physical_address_details') is-invalid @enderror"
                                            style="width: 78.8%;"
                                            name="physical_address_details"
                                            id="physical_address_details"
                                            autocomplete="physical_address_details"
                                            value ="{{$data->physical_address_details ?? trim(old('physical_address_details'))}}"
                                        >{{$data->physical_address_details ?? trim(old('physical_address_details'))}}</textarea>
                                                        @error('physical_address_details')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">District Name :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <select
                                                            class="form-control @error('physical_district_name') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="physical_district_name"
                                                            id="physical_district_name"
                                                            autocomplete="physical_district_name"
                                                            value ="{{trim(old('physical_district_name'))}}"
                                                        >
                                                            @foreach($districts as $district)
                                                                <option value="{{$district->id}}" {{isset($data->physical_district_name) && $data->physical_district_name == $district->id ? 'selected' : ''}}>{{$district->district_name_eng}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('physical_district_name')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Select Type :</p></strong>
                                                </div>

                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <select
                                                            class="form-control @error('physical_type') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="physical_type"
                                                            id="physical_type"
                                                            autocomplete="physical_type"
                                                            value ="{{trim(old('physical_type'))}}"
                                                        >
                                                            <option value="1" >Zilla</option>
                                                            <option value="2" >Upzilla</option>
                                                        </select>
                                                        @error('physical_type')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Select Zilla :</p></strong>
                                                </div>

                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <select
                                                            class="form-control @error('Zilla') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="living_type_id"
                                                            id="living_type_id"
                                                            autocomplete="living_type"
                                                            value ="{{trim(old('Zilla'))}}"
                                                        >
                                                            <option value="1" >Zilla</option>
                                                            <option value="2" >Upzilla</option>
                                                        </select>
                                                        @error('Zilla')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Latitude :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input
                                                            class="form-control @error('physical_latitude') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="physical_latitude"
                                                            id="physical_latitude"
                                                            autocomplete="physical_latitude"
                                                            value ="{{$data->physical_latitude ?? trim(old('physical_latitude'))}}"
                                                        />
                                                        @error('physical_latitude')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Longitude :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input
                                                            class="form-control @error('physical_longitude') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="physical_longitude"
                                                            id="physical_longitude"
                                                            autocomplete="physical_longitude"
                                                            value ="{{$data->physical_longitude ?? trim(old('physical_longitude'))}}"
                                                        />
                                                        @error('physical_longitude')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Mobile Number :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input
                                                            class="form-control @error('mobile_no') is-invalid @enderror"
                                                            style="width: 78.8%;"
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
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Photo :</p></strong>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <input
                                                            class="form-control @error('photo') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="photo"
                                                            id="photo"
                                                            autocomplete="photo"
                                                            value ="{{$data->photo ?? trim(old('photo'))}}"
                                                            type="file"
                                                        />
                                                        @error('photo')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" style="margin-top: 8px;">
                                                    <strong><p class="text-right">Select Status :</p></strong>
                                                </div>

                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <select
                                                            class="form-control @error('status') is-invalid @enderror"
                                                            style="width: 78.8%;"
                                                            name="status"
                                                            id="status"
                                                            autocomplete="status"
                                                            value ="{{trim(old('status'))}}"
                                                        >
                                                            <option value="1" {{isset($data->status) && $data->status == "1" ? 'selected' : ''}}>Enable</option>
                                                            <option value="2" {{isset($data->status) && $data->status == "2" ? 'selected' : ''}}>Disable</option>
                                                        </select>
                                                        @error('Zilla')
                                                        <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
                                                        @enderror
                                                    </div>
                                                </div>

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

                                </form>

                </div>

            </div>
        </div>
    </div>

@endsection
