
@extends('layout.sidebar')

@section('content')

    <div class="content">
    <div class="card">
       <div class="card-header">
        <div class="text">
        <h1>Doctors List</h1>
      
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add
        </button>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="{{ url('/doctors/create/store') }}" method="post" >
                        @csrf
                            <div class="mb-3">                       
                            <label for="name" class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="name" placeholder="enter first name">
                            </div>
                            <div class="mb-3">                       
                            <label for="name" class="form-label">last Name</label>
                            <input type="text" name="lastname" class="form-control" id="name" placeholder="enter first name">
                            </div>
                            <div class="mb-3">                       
                            <label for="name" class="form-label">Phone number</label>
                            <input type="text" name="phone_no" class="form-control" id="name" placeholder="enter first name">
                            </div>
                            <div class="mb-3">                       
                            <label for="name" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="name" placeholder="enter first name">
                            </div>
                            <div class="mb-3">                       
                            <label for="name" class="form-label">Role</label>
                            <input type="text" name="role" class="form-control" id="name" placeholder="enter first name">
                            </div> 
                            
                            <div class="modal-footer mt-5">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>                        
                        </form>                       
                    </div>
                </div>
                
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/doctors/create/store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" name="firstname" class="form-control" id="firstname"  >
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Enter last name">
                    </div>
                    <div class="mb-3">
                        <label for="phone_no" class="form-label">Phone Number</label>
                        <input type="text" name="phone_no" class="form-control" id="phone_no" placeholder="Enter phone number">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" name="role" class="form-control" id="role" placeholder="Enter role">
                    </div>
                    <div class="modal-footer mt-5">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>

                @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->firstname}} </td>
                    <td>{{ $item->lastname}}</td>
                    <td>{{ $item->phone_no}}</td>
                    <td>{{ $item->email}}</td>
                    <td>{{ $item->role }}</td>
                    
                    <td>
                        <a href="">
                        <button type="submit" class="btn btn-success" >Show</button>
                        </a>
                        
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-Modal">
                            Edit
                        </button>
                        <form action="" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Delete</button>
                        </form>
                    </td>
                    
                </tr>
              @endforeach
            </tbody> 
        </table>
       </div>
            </div>
        </div>
    </div>
    </div>
@endsection