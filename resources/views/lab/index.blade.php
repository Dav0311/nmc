@extends('layout.sidebar')

@section('content')
      
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-primary text-light">
                            <h3> Laboratory
                                <div class="form float-end">
                                    <a href="{{ url('form_builder') }}" title="Form builder">
                                        <button class="btn btn-success">
                                            <i class="fa fa-eye" aria-hidden="true"></i> Back to home
                                        </button>
                                    </a>
                                </div>
                            </h3> 
                        </div>
                        <br>
                        <div class="card-body">
                            <div class="card shadow zindex-100 mb-0">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
@endsection
