<!-- Original Field -->
<div class="form-group col-sm-6">
    {!! Form::label('original', 'Original:') !!}
    {!! Form::text('original', null, ['class' => 'form-control']) !!}
</div>

<!-- Masked Field -->
<div class="form-group col-sm-6">
    {!! Form::label('masked', 'Masked:') !!}
    {!! Form::text('masked', null, ['class' => 'form-control']) !!}
</div>

<!-- Valid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valid', 'Valid:') !!}
    {!! Form::text('valid', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::text('password', null, ['class' => 'form-control']) !!}
</div>

<!-- Expiration Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expiration_date', 'Expiration Date:') !!}
    {!! Form::text('expiration_date', null, ['class' => 'form-control','id'=>'expiration_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#expiration_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush