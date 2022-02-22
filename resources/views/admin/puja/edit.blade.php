@extends('admin.app')
@section('title')Puja @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Edit Puja</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Edit Puja</h3>
                <form action="{{ route('admin.puja.update',$puja->id) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                     <div class="tile-body"><img src="{{asset($puja->image)}}" width="100" /></div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="image">Image <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" />
                            <input type="hidden" name="id" value="{{ $puja->id }}">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message ?? '' }} </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group required">
                            <label for="category" class="control-label">Select Category</label>
                            <select id="category" name="category"
                                class="form-control @error('category') is-invalid @enderror">
                                <option selected disabled>Select one</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($puja->categoryId == $category->id){{ 'selected' }}@endif>
                                        {{ $category->name_in_english }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message ?? '' }} </strong>
                                </span>
                            @enderror
                           
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name_in_bengali">Name in Bengali <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name_in_bengali') is-invalid @enderror" type="text" name="name_in_bengali" id="name_in_bengali" value="{{ old('name_in_bengali', $puja->name_in_bengali) }}"/>
                            @error('name_in_bengali')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name_in_english">Name in English <span class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('name_in_english') is-invalid @enderror" type="text" name="name_in_english" id="name_in_english" value="{{ old('name_in_english', $puja->name_in_english) }}"/>
                            @error('name_in_english')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                     <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="description">Description <span class="m-l-5 text-danger"> *</span></label>
                             <textarea class="form-control @error('description') is-invalid @enderror" name="description"  id="ckeditor">{{ old('description', $puja->description) }}</textarea>
                             @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Puja</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.puja.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection