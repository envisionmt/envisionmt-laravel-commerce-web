<div class="form-group">
    <label for="stock_status">Stock Status</label>
    <select class="form-control select-two {{ $errors->has('stock_status') ? 'is-invalid' : '' }}" name="stock_status" id="stock-status">
        @foreach($stockStatusNames as $key => $stockStatusName)
            <option value="{{ $key }}" {{ old('ward', $item->stock_status) === $key ? 'selected' : '' }}>
                {{ $stockStatusName }}
            </option>
        @endforeach
    </select>

    @if ($errors->has('stock_status'))
        <span class="error invalid-feedback">{{ $errors->first('stock_status') }}</span>
    @endif
</div>
