@extends('layout.sidebar')

@section('content')
      
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-primary text-light">
                            <h3> Form : {{ $form->name }}
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
                                <form action="{{ url('formBuilder/form/store_response/'.$form->id) }}" method="post">
                                    @csrf
                                    <div class="card-body px-md-5 py-5">  
                                        @if($formFields && $formFields->count() > 0)
                                            @foreach($formFields as $objField)
                                                <div class="form-group">
                                                    @if($objField->type == 'text')
                                                        <label for="field-{{ $objField->id }}" class="form-label">{{ __($objField->question) }}</label>
                                                        <input type="text" name="field[{{ $objField->id }}]" id="field-{{ $objField->id }}" class="form-control" required>
                                                    @elseif($objField->type == 'select')
                                                        <label for="field-{{ $objField->id }}" class="form-label">{{ __($objField->question) }}</label>
                                                        <select name="field[{{ $objField->id }}]" id="field-{{ $objField->id }}" class="form-control select2" required>
                                                            @foreach($objField->options as $value => $label)
                                                                <option value="{{ $value }}">{{ $label }}</option>
                                                            @endforeach
                                                        </select>
                                                    @elseif($objField->type == 'textarea')
                                                        <label for="field-{{ $objField->id }}" class="form-label">{{ __($objField->question) }}</label>
                                                        <textarea name="field[{{ $objField->id }}]" id="field-{{ $objField->id }}" class="form-control" required></textarea>
                                                    @elseif($objField->type == 'date')
                                                        <label for="field-{{ $objField->id }}" class="form-label">{{ __($objField->question) }}</label>
                                                        <input type="date" name="field[{{ $objField->id }}]" id="field-{{ $objField->id }}" class="form-control" required>
                                                    @elseif($objField->type == 'email')
                                                        <label for="field-{{ $objField->id }}" class="form-label">{{ __($objField->question) }}</label>
                                                        <input type="email" name="field[{{ $objField->id }}]" id="field-{{ $objField->id }}" class="form-control" required>
                                                    @elseif($objField->type == 'number')
                                                        <label for="field-{{ $objField->id }}" class="form-label">{{ __($objField->question) }}</label>
                                                        <input type="number" name="field[{{ $objField->id }}]" id="field-{{ $objField->id }}" class="form-control" required>
                                                    @endif
                                                </div>
                                            @endforeach
                                           
                                        @endif
                                        <div class="mb-3 mt-5">
                                            <button type="submit" class="btn btn-primary btn-sm" id="btn-submit">Submit Form</button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
@endsection
