<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', __('models/takeTheJobs.fields.title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-6">
    {!! Form::label('content', __('models/takeTheJobs.fields.content').':') !!}
    {!! Form::text('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', __('models/takeTheJobs.fields.image').':') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', __('models/takeTheJobs.fields.created_by').':') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', __('models/takeTheJobs.fields.active').':') !!}
    {!! Form::text('active', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/takeTheJobs.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>