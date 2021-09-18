<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $link->id }}</p>
</div>

<!-- Original Field -->
<div class="col-sm-12">
    {!! Form::label('original', 'Original:') !!}
    <p>{{ $link->original }}</p>
</div>

<!-- Masked Field -->
<div class="col-sm-12">
    {!! Form::label('masked', 'Masked:') !!}
    <p>{{ $link->masked }}</p>
</div>

<!-- Valid Field -->
<div class="col-sm-12">
    {!! Form::label('valid', 'Valid:') !!}
    <p>{{ $link->valid }}</p>
</div>

<!-- Password Field -->
<div class="col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $link->password }}</p>
</div>

<!-- Expiration Date Field -->
<div class="col-sm-12">
    {!! Form::label('expiration_date', 'Expiration Date:') !!}
    <p>{{ $link->expiration_date }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $link->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $link->updated_at }}</p>
</div>

