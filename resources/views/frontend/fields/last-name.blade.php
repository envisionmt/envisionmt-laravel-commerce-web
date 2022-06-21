<div class="form-group">
    <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last-name" placeholder="Last Name" value="{{ old('last_name') }}">
    @if ($errors->has('last_name'))
        <span class="error invalid-feedback">{{ $errors->first('last_name') }}</span>
    @endif
</div>
