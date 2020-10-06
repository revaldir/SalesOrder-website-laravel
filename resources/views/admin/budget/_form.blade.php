<div class="form-group">
    <label for="month_id">Bulan</label>
    {!! Form::selectMonth('month_id', null, [
        'placeholder' => 'Select Month', 'class' => $errors->has('month_id') ? 'form-control is-invalid' :
    'form-control', 'required', 'autofocus', 'id' => 'month_id']) !!}
    @if ($errors->has('month_id'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('month_id') }}</strong>
    </span>
    @endif
</div>
<div class="form-group row">
    <div class="col-md-4">
        <label for="category_id">Kategori</label>
        {!! Form::select('category_id', $option['category'], null, ['placeholder' => 'Select Category', 'class' => $errors->has('category_id') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus', 'id' => 'category']) !!}
        @if($errors->has('category'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('category') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-md-4">
        <label for="value">Nominal (Rp.) </label>
        {!! Form::text('value', null, ['placeholder' => 'Enter Amount', 'class' => $errors->has('value') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus', 'id' => 'value']) !!}
        @if ($errors->has('value'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('value') }}</strong>
        </span>
        @endif
    </div>
</div>
@section('js')
<script>
    $(document).ready(function() {
        let value = $('#value')
        let comas = addCommas(value.val())
        value.empty().val(comas)

        $('#value').on('keyup', function(e) {
            e.preventDefault()

            if(event.which >= 37 && event.which <= 40) return;

            $(this).val(function(index, value) {
                return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            });
        })

        function addCommas(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    });
</script>
@endsection
