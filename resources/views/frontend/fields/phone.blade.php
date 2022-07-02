<div class="form-group">
    <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="phone" placeholder="{{ __('message.phone_number') }}" value="{{ old('phone') }}">
    @if ($errors->has('phone'))
        <span class="error invalid-feedback">{{ $errors->first('phone') }}</span>
    @endif
</div>
