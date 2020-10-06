@if(isset($showOnly))
    @if($showOnly != true)
    {!! Form::model($model, ['url' => $delete_url, $model->id, 'method' => 'DELETE']) !!}

    <a href="{{ $show_url }}" class="btn btn-sm btn-outline-info" style="padding-bottom: 0px; padding-top: 0px;">
        Show
        <span class="btn-label btn-label-right"><i class="fa fa-eye"></i></span>
    </a>
    <a href="{{ $edit_url }}" class="btn btn-sm btn-outline-warning" style="padding-bottom: 0px; padding-top: 0px;">
        Edit
        <span class="btn-label"><i class="fa fa-edit"></i></span>
    </a>
    <button class="btn btn-sm btn-outline-danger" type="submit" style="padding-bottom: 0px; padding-top: 0px;" onclick="return confirm('Are you sure you want to delete this item?');">
        Delete
        <span class="btn-label"><i class="fa fa-trash"></i></span>
    </button>
    @else
    <a href="{{ $show_url }}" class="btn btn-sm btn-outline-info" style="padding-bottom: 0px; padding-top: 0px;">
        Show
        <span class="btn-label"><i class="fa fa-eye"></i></span>
    </a>
    {!! Form::close() !!}
    @endif
@endif

@if(isset($editDelete))
    {!! Form::model($model, ['url' => $delete_url, $model->id, 'method' => 'DELETE']) !!}
    <a href="{{ $edit_url }}" class="btn btn-sm btn-outline-warning" style="padding-bottom: 0px; padding-top: 0px;">
        Edit
        <span class="btn-label"><i class="fa fa-edit"></i></span>
    </a>
    <button class="btn btn-sm btn-outline-danger" type="submit" style="padding-bottom: 0px; padding-top: 0px;" onclick="return confirm('Are you sure you want to delete this item?');">
        Delete
        <span class="btn-label"><i class="fa fa-trash"></i></span>
    </button>
    {!! Form::close() !!}
@endif
