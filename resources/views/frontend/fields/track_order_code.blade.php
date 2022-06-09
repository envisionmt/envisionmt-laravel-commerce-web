@if ($errors->has('track_order_code'))
    <span class="error invalid-feedback d-block">{{ $errors->first('track_order_code') }}</span>
@endif
<input type="text" class="form-control border-secondary bg-transparent" name="track_order_code" placeholder="Your tracking number">

