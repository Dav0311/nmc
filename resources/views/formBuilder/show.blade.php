@extends('layout.sidebar')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary text-light">Form : <h3>{{ $form->name }}</h3></div>
                
                <div class="card-body mt-5">
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

                    <button class="btn btn-primary btn-sm mb-3" type="button" id="ajaxform">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add form field
                    </button>
                    <div class="form float-end">
                        <a href="{{ url('formBuilder/form/' . $form->id) }}" title="View form">
                            <button class="btn btn-success " value="{{ $form->id }}" >
                                <i class="fa fa-eye" aria-hidden="true"></i> View form
                            </button>
                        </a>
                    </div>
                    <div class="create-form mb-3" id="createForm">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 form-group">
                                    <h3>Question Fields</h3>
                                    <form action="{{ url('formBuilder/create_form_field/'. $form->id ) }}" method="post">
                                        @csrf
                                        @include('formBuilder.create_form_field')
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                 

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Form Question</th>
                                    <th class="text-center">Form Type</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($form->formFields->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center">There is no data in the database.</td>
                            </tr>
                            @else
                            @foreach($form->formFields as $field)
                                    <tr>
                                        <td class="text-center">{{ $field->question }}</td>
                                        <td class="text-center">{{$field->type }}</td>
                                        
                                        <td class="text-center">
                                            <form method="POST" action="{{ url('/admin/formBuilder/' .  $form->id) }}" accept-charset="UTF-8" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" title="Delete form" onclick="return confirm('Confirm delete?')">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
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
