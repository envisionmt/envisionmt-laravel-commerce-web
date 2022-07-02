<div class="form-group">
    <input type="text" name="address2" class="form-control {{ $errors->has('address2') ? 'is-invalid' : '' }}" id="address2" placeholder="{{ __('message.address_line_02') }}" value="{{ old('address2') }}">
    @if ($errors->has('address2'))
        <span class="error invalid-feedback">{{ $errors->first('address2') }}</span>
    @endif
</div>
