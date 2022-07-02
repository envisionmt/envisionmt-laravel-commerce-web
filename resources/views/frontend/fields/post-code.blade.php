<div class="form-group">
    <input type="text" name="post_code" class="form-control {{ $errors->has('post_code') ? 'is-invalid' : '' }}" id="post-code" placeholder="{{ __('message.postcode_zip') }}" value="{{ old('post_code') }}">
    @if ($errors->has('post_code'))
        <span class="error invalid-feedback">{{ $errors->first('post_code') }}</span>
    @endif
</div>
