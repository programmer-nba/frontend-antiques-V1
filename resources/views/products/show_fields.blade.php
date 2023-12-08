<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', __('models/products.fields.id').':') !!}
    <p>{{ $products->id }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', __('models/products.fields.name').':') !!}
    <p>{{ $products->name }}</p>
</div>

<!-- Name En Field -->
<div class="col-sm-12">
    {!! Form::label('name_en', __('models/products.fields.name_en').':') !!}
    <p>{{ $products->name_en }}</p>
</div>

