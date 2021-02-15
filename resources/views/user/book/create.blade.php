@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Add New Book</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{ route('user.book.store') }}" method="post" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">{{ __('Title') }}:</label>
                                <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}">
                                @if($errors->has('title'))
                                    <div class="alert-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('Description') }}:</label>
                                <input id="description" class="form-control" type="text" name="description" value="{{ old('lastName') }}">
                                @if($errors->has('description'))
                                    <div class="alert-danger">{{ $errors->first('description') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="cover">{{ __('Cover') }}</label>
                                <input id="cover" class="form-control" type="file" name="cover"
                                       accept=".jpg, .jpeg, .png">
                                @if($errors->has('cover'))
                                    <div class="alert-danger">{{ $errors->first('cover') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="price">{{ __('Price') }}:</label>
                                <input id="price" class="form-control" type="text" name="price" value="{{ old('price') }}">
                                @if($errors->has('price'))
                                    <div class="alert-danger">{{ $errors->first('price') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="discount">{{ __('Discount') }}:</label>
                                <input id="discount" class="form-control" type="text" name="discount" value="{{ old('discount') }}">
                                @if($errors->has('discount'))
                                    <div class="alert-danger">{{ $errors->first('discount') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="genre">{{ __('Genre') }}:</label>
                                <select class="form-control @error('genre') is-invalid @enderror" id="genre" name="genre_id" >
                                    <option value="">{{ __('Select genre') }}</option>
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre->id }}" {{ ($genre->id == old('genre_id'))? 'selected' : '' }}>{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-success" type="submit" value="{{ __('Add') }}">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
