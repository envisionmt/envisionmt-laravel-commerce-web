<div class="form-group">
    <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first-name" placeholder="{{ __('message.first_name') }}" value="{{ old('first_name') }}">
    @if ($errors->has('first_name'))
        <span class="error invalid-feedback">{{ $errors->first('first_name') }}</span>
    @endif
</div>
