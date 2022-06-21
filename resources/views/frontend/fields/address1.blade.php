<div class="form-group">
    <input type="text" name="address1" class="form-control {{ $errors->has('address1') ? 'is-invalid' : '' }}" id="address1" placeholder="Address line 01" value="{{ old('address1') }}">
    @if ($errors->has('address1'))
        <span class="error invalid-feedback">{{ $errors->first('address1') }}</span>
    @endif
</div>
