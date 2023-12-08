<div class="table-responsive">
    <table class="table" id="takeTheJobs-table">
        <thead>
        <tr>
            <th>@lang('models/takeTheJobs.fields.id')</th>
        <th>@lang('models/takeTheJobs.fields.title')</th>
        <th>@lang('models/takeTheJobs.fields.content')</th>
        <th>@lang('models/takeTheJobs.fields.image')</th>
        <th>@lang('models/takeTheJobs.fields.created_by')</th>
        <th>@lang('models/takeTheJobs.fields.active')</th>
        <th>@lang('models/takeTheJobs.fields.description')</th>
            <th colspan="3">@lang('crud.action')</th>
        </tr>
        </thead>
        <tbody>
         @foreach($takeTheJobs as $takeTheJobs)
            <tr>
                <td>{{ $takeTheJobs->id }}</td>
            <td>{{ $takeTheJobs->title }}</td>
            <td>{{ $takeTheJobs->content }}</td>
            <td>{{ $takeTheJobs->image }}</td>
            <td>{{ $takeTheJobs->created_by }}</td>
            <td>{{ $takeTheJobs->active }}</td>
            <td>{{ $takeTheJobs->description }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['takeTheJobs.destroy', $takeTheJobs->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('takeTheJobs.show', [$takeTheJobs->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('takeTheJobs.edit', [$takeTheJobs->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
</div>
