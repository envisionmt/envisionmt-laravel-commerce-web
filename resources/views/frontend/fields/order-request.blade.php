<div class="form-group">
    <textarea name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" id="description" placeholder="Order Request"  rows="1">{{ old('description') }}</textarea>
    @if ($errors->has('description'))
        <span class="error invalid-feedback">{{ $errors->first('description') }}</span>
    @endif
</div>
