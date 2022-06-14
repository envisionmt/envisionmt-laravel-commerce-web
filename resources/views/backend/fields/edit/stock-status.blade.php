<div class="form-group">
    <label for="stock_status">Stock Status</label>
    <input type="text" name="stock_status" class="form-control {{ $errors->has('stock_status') ? 'is-invalid' : '' }}"
           id="stock-status" placeholder="Enter Stock Status" value="{{ old('stock_status', $item->stock_status) }}">
    @if ($errors->has('stock_status'))
        <span class="error invalid-feedback">{{ $errors->first('stock_status') }}</span>
    @endif
</div>
