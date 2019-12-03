@extends('layouts.admin')

@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Travel Package {{ $item->title }}</h1>  
    </div>



    <div class="row">
        <div class="col-lg">           
            <div class="card shadow">
                <div class="card-body">
                    {{-- form --}}
                    <form action="{{ route('transaction.update', [$item->id]) }}" method="POST">
                        @csrf

                        @method('PUT')

                        <div class="form-group">
                            <label for="transaction_status">Status</label>
                            <select name="transaction_status" id="" class="form-control">
                                <option value="{{ $item->transaction_status }}">
                                    Jangan Ubah ({{ $item->transaction_status }})
                                </option>
                                <option value="IN_CART">in cart</option>
                                <option value="PENDING">Pending</option>
                                <option value="SUCCESS">Success</option>
                                <option value="CANCEL">Cancel</option>
                                <option value="FAILED">FAILED</option>
                            </select>
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