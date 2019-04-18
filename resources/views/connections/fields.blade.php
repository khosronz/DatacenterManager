<!-- Username Field -->
<div class="form-group col-sm-3">
    {!! Form::label('username', __('Username').':') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-3">
    {!! Form::label('password', __('Password').':') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Port Field -->
<div class="form-group col-sm-3">
    {!! Form::label('port', __('Port').':') !!}
    {!! Form::number('port', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- Connectiontype Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('connectiontype_id', __('Connectiontype Id').':') !!}
    {!! Form::select('connectiontype_id', \App\Models\Connectiontype::pluck('title','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Software Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('software_id', __('Software Id').':') !!}
    {!! Form::select('software_id', \App\Models\Software::pluck('server_name','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('connections.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
