@extends('admin.app')
@section('title')
Puja Service
 @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Add Puja Service</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">
                Puja Service
                {{-- {{ $subTitle }} --}}
                    {{-- <span class="top-form-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Category</button>
                        <a class="btn btn-secondary" href=""><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span> --}}
                </h3>
                <hr>
                <form action="{{ route('admin.puja-service.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="puja">Puja <span class="m-l-5 text-danger"> *</span></label>
                            <select class="form-control @error('pujaId') is-invalid @enderror"
                                name="pujaId" id="pujaId" value="{{ old('pujaId') }}">
                                <option selected disabled>Select One</option>
                                @foreach ($pujas as $puja)
                                    <option value="{{ $puja->id }}">{{ $puja->name_in_english }}</option>
                                @endforeach
                            </select>
                            @error('categoryId')
                                <span class="invalid-feedback" role="alert">
                                    <strong>('$puja') {{ $message ?? '' }} </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="service_name">Service Name<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('service_name') is-invalid @enderror" type="text" name="service_name" id="service_name" value="{{ old('service_name') }}"/>
                            @error('service_name') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="price">Price<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('price') is-invalid @enderror" type="text" name="price" id="name_in_english" value="{{ old('price') }}"/>
                            @error('price') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="image">Image<span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" value="{{ old('image') }}"/>
                            @error('image') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Puja Service</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.puja-service.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection