
@extends('layout.sidebar')

@section('content')

    <div class="content">
    <div class="card">
       <div class="card-header">
        <div class="text">
        <h1>product categories</h1>
        <a href="{{ route(' categories') }}">
            <h3 class=" float-end">Back</h3>
        </a>
        </div>
            <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" id="trigger"  role="alert">
            {{ session('success') }}
            </div>
           @endif
           @if (session('error'))
            <div class="alert alert-danger" id="trigger"  role="alert">
            {{ session('error') }}
            </div>
           @endif
           @if ($errors->any())
                <div class="alert alert-danger" id="trigger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
           @endif
                <div class="row">

                    <form class="row gx-3 gy-2 align-items-center" action="{{ url('/category') }}" method="post" >
                        @csrf 

                        <div class="col-sm-3">
                            <label class="visually-hidden" for="specificSizeInputName">Name</label>
                            <input type="text" name="name" class="form-control" id="specificSizeInputName" placeholder="enter your category name">
                        </div>
                        
                        <div class="col-sm-3">
                            <label class="visually-hidden" for="status">Status</label>
                            <select class="form-select" name="status" id="specificSizeSelect">
                            <option selected>make a choice...</option>
                            <option value="1">True</option>
                            <option value="2">False</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection