<div class="form-group">
    <input type="text" name="phone_number" class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" id="phone-number" placeholder="Phone Number" value="{{ old('phone_number') }}">
    @if ($errors->has('phone_number'))
        <span class="error invalid-feedback">{{ $errors->first('phone_number') }}</span>
    @endif
</div>
