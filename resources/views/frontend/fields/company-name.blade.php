<div class="form-group">
    <input type="text" name="company_name" class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" id="company-name" placeholder="Company Name" value="{{ old('company_name') }}">
    @if ($errors->has('company_name'))
        <span class="error invalid-feedback">{{ $errors->company('company_name') }}</span>
    @endif
</div>
