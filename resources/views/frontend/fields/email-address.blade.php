<div class="form-group">
    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Email Address" value="{{ old('email') }}">
    @if ($errors->has('email'))
        <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
    @endif
</div>
