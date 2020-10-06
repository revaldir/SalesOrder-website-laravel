<div class="form-group row">
    <div class="col-md-6">
        <label for="proyek">Project</label>
        {!! Form::text('proyek', null, ['placeholder' => 'Project Name', 'class' => $errors->has('proyek') ? 'form-control is-invalid' :
        'form-control', 'required', 'autofocus']) !!}
        @if ($errors->has('proyek'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('proyek') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="form-group">
    <label for="month">Bulan</label>
    {!! Form::select('month_id', $options['month'], null, ['placeholder' => 'Select Month', 'class' => $errors->has('month') ? 'form-control is-invalid' : 'form-control', 'required', 'autofocus']) !!}
    @if ($errors->has('month'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('month') }}</strong>
    </span>
    @endif
</div>
<div class="form-group row">
    <div class="col-md-4">
        <label for="category_id">Kategori </label>
        {!! Form::select('category_id', $options['category'], null, ['placeholder' => 'Select Category', 'class' => $errors->has('category_id') ? 'form-control is-invalid' :
        'form-control', 'required', 'autofocus', 'id' => 'category']) !!}
        @if ($errors->has('category'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('category') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-md-4">
        <label for="out_value">Biaya (Rp.) </label>
        {!! Form::text('out_value', null, ['placeholder' => 'Enter Amount', 'class' => $errors->has('out_value') ? 'form-control is-invalid' :
        'form-control', 'required', 'autofocus', 'id' => 'out_value']) !!}
        @if ($errors->has('out_value'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('out_value') }}</strong>
        </span>
        @endif
    </div>
</div>

@section('js')
<script>
    $(document).ready(function() {
        let value = $('#out_value')
        let comas = addCommas(value.val())
        value.empty().val(comas)

        $('#out_value').on('keyup', function(e) {
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
