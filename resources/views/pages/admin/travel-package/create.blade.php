@extends('layouts.admin')

@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Travel Package</h1>  
    </div>



    <div class="row">
        <div class="col-lg">           
            <div class="card shadow">
                <div class="card-body">
                    {{-- form --}}
                    <form action="{{ route('travel-package.store') }}" method="POST">
                        @csrf

                        <div class="form-group ">
                            <label for="title" class="col-md-2 col-form-label ">{{ __('Title') }}</label>

                            <div class="col-md">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  autocomplete="title" autofocus placeholder="">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="location" class="col-md-2 col-form-label ">{{ __('location') }}</label>

                            <div class="col-md">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}"  autocomplete="location" autofocus placeholder="">

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="type" class="col-md-2 col-form-label ">{{ __('type') }}</label>

                            <div class="col-md">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}"  autocomplete="type" autofocus placeholder="">

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="foods" class="col-md-2 col-form-label ">{{ __('foods') }}</label>

                            <div class="col-md">
                                <input id="foods" type="text" class="form-control @error('foods') is-invalid @enderror" name="foods" value="{{ old('foods') }}"  autocomplete="foods" autofocus placeholder="">

                                @error('foods')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="featured_event" class="col-md-2 col-form-label ">{{ __('event') }}</label>

                            <div class="col-md">
                                <input id="featured_event" type="text" class="form-control @error('featured_event') is-invalid @enderror" name="featured_event" value="{{ old('featured_event') }}"  autocomplete="featured_event" autofocus placeholder="">

                                @error('featured_event')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="departure_date" class="col-md-2 col-form-label ">{{ __('departure date') }}</label>

                            <div class="col-md">
                                <input id="departure_date" type="date" class="form-control @error('departure_date') is-invalid @enderror" name="departure_date" value="{{ old('departure_date') }}"  autocomplete="departure_date" autofocus placeholder="">

                                @error('departure_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="duration" class="col-md-2 col-form-label ">{{ __('Duration') }}</label>

                            <div class="col-md">
                                <input id="duration" type="text" class="form-control @error('duration') is-invalid @enderror" name="duration" value="{{ old('duration') }}"  autocomplete="duration" autofocus placeholder="">

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label for="price" class="col-md-2 col-form-label ">{{ __('price') }}</label>

                            <div class="col-md">
                                <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}"  autocomplete="price" autofocus placeholder="$..">

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label for="language" class="col-md-2 col-form-label ">{{ __('language') }}</label>

                            <div class="col-md">
                                <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ old('language') }}"  autocomplete="language" autofocus placeholder="">

                                @error('language')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="about" class="col-md-2 col-form-label ">{{ __('about') }}</label>

                            <div class="col-lg">
                                <textarea name="about" id="" cols="30" rows="10" class="d-block w-100 form-control @error('about') is-invalid @enderror">{{ old('about') }}</textarea>

                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-primary shadow-sm btn-block">Tambah</button>
                        </div>
                        


                    </form>
                    {{-- end form --}}
                </div>
            </div>
        </div>
    </div>

   

  </div>
  <!-- /.container-fluid -->
    
@endsection