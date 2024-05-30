
@extends('layout.sidebar')

@section('content')

    <div class="content">
    <div class="card">
       <div class="card-header">
        <div class="text">
        <h1>Products List</h1>
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
           <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Product category</th>
                    <th>Price</th>
                    
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                       <td>#</td>
                       <td>john </td>
                       <td>doe</td>
                       <td>090286309272</td>

                        <td>
                            <a href="">
                            <button type="submit" class="btn btn-success" >Show</button>
                            </a>
                            <a href="">
                            <button type="submit" class="btn btn-info" >Edit</button>
                            </a>
                            <form action="" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                        </td>
                     
                    </tr>
              
            </tbody> 
        </table>
       </div>
            </div>
        </div>
    </div>
    </div>
@endsection