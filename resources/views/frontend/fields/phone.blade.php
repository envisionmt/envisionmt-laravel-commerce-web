<div class="form-group">
    <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="phone" placeholder="Phone Number" value="{{ old('phone') }}">
    @if ($errors->has('phone'))
        <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
    @endif
</div>
