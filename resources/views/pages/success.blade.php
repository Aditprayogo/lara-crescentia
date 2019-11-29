@extends('layouts.success')

@section('title')

    Success Checkout
    
@endsection

@section('content')

<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/ic_mail.png') }}" alt="">
            <h1>Yeay Success</h1>
            <p>
                we've send you email for trip instruction

                <br>

                Please Read it as well
            </p>
            <a href="{{route('home.index')}}" class="btn btn-home-page mt-3 px-5">
                Homepage
            </a>
        </div>
    </div>
</main>
    
@endsection