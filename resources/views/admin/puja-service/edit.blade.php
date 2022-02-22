@extends('admin.app')
@section('title')Puja Service @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Edit Puja Service</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Edit Puja Service</h3>
                <form action="{{ route('admin.puja-service.update',$pujaService->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                     <div class="tile-body"><img src="{{asset($pujaService->image)}}" width="100" /></div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="image">Image <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" />
                            <input type="hidden" name="id" value="{{ $pujaService->id }}">
                            @error('image') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group required">
                            <label for="pujaId" class="control-label">Select Puja</label>
                            <select id="pujaId" name="pujaId"
                                class="form-control @error('pujaId') is-invalid @enderror">
                                <option selected disabled>Select one</option>
                                @foreach ($pujas as $puja)
                                    <option value="{{ $puja->id }}" @if ($pujaService->pujaId == $puja->id){{ 'selected' }}@endif>
                                        {{ $puja->name_in_english }}</option>
                                @endforeach
                            </select>
                            @error('pujaId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="service_name"> Service Name <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('service_name') is-invalid @enderror" type="text" name="service_name" id="service_name" value="{{ old('service_name', $pujaService->service_name) }}"/>
                            @error('service_name') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="price">Price <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="price" value="{{ old('price', $pujaService->price) }}"/>
                            @error('price') {{ $message }} @enderror
                        </div>
                    </div>
                    
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Puja Service</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.puja.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection