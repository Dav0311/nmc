@extends('layout.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-light">Form Builder</div>
                <div class="card-body">
                
                    <br>
                    <div class="message">
                        @if (session('success'))
                            <div class="alert alert-success" id="trigger">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" id="trigger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <button class="btn btn-primary btn-sm" type="button" id="ajaxform">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </button>
                    <br>
                    <div class="create-form" id="createForm">   
                        <div class="modal-body">             
                            <div class="row">
                                <div class="col-12 form-group">
                                    <br>
                                    <h6>Add new form</h6>
                                    
                                    <div class="form">
                                        <form action="{{ url('formBuilder/create_form/') }}" method="post">
                                            @csrf
                                            @if(Route::currentRouteName() == 'form_builder')
                                                @include('formBuilder.create')
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                 
                    <div class="table-responsive">
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Form ID</th>
                                    <th class="text-center">Form Name</th>
                                    <th class="text-center">Form Response</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($forms->count())
                                    @foreach($forms as $form)
                                        <tr>
                                            <td class="text-center">{{ $form->id }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('formBuilder/form/response/detail/'. $form->id ) }}">
                                                    {{ $form->name }}
                                                </a> 
                                            </td>
                                            <td class="text-center">{{ $form->response->count() }}</td>
                                            <td class="text-center">
                                                <a href="#" class="cp_link" data-link="{{ url('/form/'.$form->id) }}" data-bs-toggle="tooltip" title="{{ __('Click to copy link') }}">
                                                    <button class="btn btn-info" id="copy_button">
                                                        <i class="fa fa-link" aria-hidden="true"></i> Copy
                                                    </button>
                                                </a>
                                                <a href="{{ url('/formBuilder/show_form/' . $form->id) }}" title="View form">
                                                    <button class="btn btn-success">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                                    </button>
                                                </a>
                                                <a href="{{ url('/formBuilder/edit/' . $form->id) }}" title="Edit form">
                                                    <button type="button" class="btn btn-warning" id="editForm" value="{{ $form->id }}">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                                    </button>
                                                </a>
                                                <form method="POST" action="{{ url('/formBuilder/delete/' . $form->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title="Delete form" onclick="return confirm('Confirm delete?')">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">There is no data in the database.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>         
        </div>       
    </div>
</div>
@endsection
