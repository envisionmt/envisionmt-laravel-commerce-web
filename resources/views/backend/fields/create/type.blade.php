<div class="form-group">
    <label for="type">Type</label>
    <input type="text" name="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}"
           id="type" placeholder="Enter Type" value="{{ old('type') }}">
    @if ($errors->has('type'))
        <span class="error invalid-feedback">{{ $errors->first('type') }}</span>
    @endif
</div>
