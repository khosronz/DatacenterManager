<!-- Server Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('server_name', __('Server Name').':') !!}
    {!! Form::text('server_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    {!! Form::select('status', ['1'=>'فعال','0'=>'غیرفعال'], null, ['class' => 'form-control']) !!}
</div>

<!-- Os Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('os_id', __('Os Id').':') !!}
    {!! Form::select('os_id', \App\Models\Os::pluck('title','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- Ip Field -->
<div class="form-group col-sm-3">
    {!! Form::label('ip', __('Ip').':') !!}
    {!! Form::text('ip', null, ['class' => 'form-control']) !!}
</div>

<!-- Domain Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('domain_id', __('Domain Id').':') !!}
    {!! Form::select('domain_id', \App\Models\Domain::pluck('url','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- Location Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('location_id', __('Location Id').':') !!}
    {!! Form::select('location_id', \App\Models\Location::pluck('title','id') ,null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('software.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
