
@extends('layout.sidebar')

@section('content')

    <div class="content">
    <div class="card">
       <div class="card-header">
        <div class="text">
        <h1>point of Sales</h1>
        <a href="">
            <h3 class=" float-end">Add</h3>
        </a>
        </div>
            <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
            {{ session('success') }}
            </div>
           @endif
           @if (session('error'))
            <div class="alert alert-danger" role="alert">
            {{ session('error') }}
            </div>
           @endif
                <div class="table">
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection