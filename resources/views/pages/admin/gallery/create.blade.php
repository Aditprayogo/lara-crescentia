@extends('layouts.admin')



@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Travel Gallery</h1>  
    </div>



    <div class="row">
        <div class="col-lg">           
            <div class="card shadow">
                <div class="card-body">

                    {{-- form --}}
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title" class="col-md-2 col-form-label ">{{ __('Paket Travel') }}</label>

                            <div class="col-md">
                                <select name="travel_packages_id" required class="form-control">
                                    <option value="">Pilih Paket Travel</option>
                                    @foreach ($travel_packages as $travel_package)

                                        <option value="{{ $travel_package->id }}">
                                            {{ $travel_package->title }}
                                        </option>
                                        
                                    @endforeach
                                </select>

                                @error('travel_packages_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-md-2 col-form-label ">{{ __('Paket Travel') }}</label>

                            <div class="col-md">
                                
                                <input type="file" name="image" class="form-control">

                                @error('image')
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

