<div class="form-group">
    <input type="text" name="city" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" id="city" placeholder="Town/City" value="{{ old('city') }}">
    @if ($errors->has('city'))
        <span class="error invalid-feedback">{{ $errors->first('city') }}</span>
    @endif
</div>
