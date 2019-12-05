@extends('layouts.admin')

@section('content')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaction</h1>  
        
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Travel</th>
                                    <th>User</th>
                                    <th>Visa</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->travel_package->title }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->additional_visa }}</td>
                                        <td>{{ $item->transaction_total }}</td>
                                        <td>{{ $item->transaction_status }}</td>
                                        <td>
                                            <a href="{{route('transaction.edit', [$item->id])}}" class="btn btn-info"> <i class="fa fa-pencil-alt"></i></a>
                                            
                                            <a href="{{route('transaction.show', [$item->id])}}" class="btn btn-primary"> <i class="fa fa-eye"></i></a>

                                            <form action="{{ route('transaction.destroy', [$item->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete that ?')"><i class="fa fa-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty 
                                <tr>
                                    <td colspan="7" class="text-center">Data Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ $items->links() }}
   

  </div>
  <!-- /.container-fluid -->
    
@endsection