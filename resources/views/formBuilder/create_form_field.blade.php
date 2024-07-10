
<div class="container mt-4">
    <div class="row">
        <div class="col-12 mb-3">
            <label for="question" class="form-label">{{ __('Question Name') }}</label>
            <input type="text" name="question[]" class="form-control" required>
        </div>
        <div class="col-12 mb-3">
            <label for="type" class="form-label">{{ __('Field Type') }}</label>
            <select name="fieldTypes[]" class="form-control select2" id="choices-multiple1" required>
                @foreach($fieldTypes as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary btn-sm" id="btn-submit">Submit</button>
    </div>
</div>
