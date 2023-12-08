<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/products.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Name En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_en', __('models/products.fields.name_en').':') !!}
    {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
</div>