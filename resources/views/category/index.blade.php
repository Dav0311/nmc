
@extends('layout.sidebar')

@section('content')
    <div class="content">
    <div class="card">
       <div class="card-header">
        <div class="text">
        <h1>Product categories</h1>
        <a href="{{ route('create_categories') }} ">
            <h6 class=" float-end">Add category</h6 >
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
           <br>

                <div class="row">

                <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Category Status</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @if (!$categories)
                    <p>There is no data in the database</p>

                        @else 
                        @foreach ($categories as $category)
                            <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }} </td>
                            <td>
                                @if($category->Status == 1)
                                    true 
                                @else
                                    False
                                @endif
                            </td>
                                <td>
                                   
                                    <a href="{{ route('edit_categories', $category->id ) }}">
                                    <button type="submit" class="btn btn-info" >Edit</button>
                                    </a>
                                    <form action="{{ route('delete_categories', $category->id ) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" >Delete</button>
                                    </form>
                                </td>
                            
                            </tr>
                        @endforeach
                    @endif
            </tbody> 
        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection