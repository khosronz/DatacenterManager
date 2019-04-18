<!-- User Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- Organization Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('organization_id', __('Organization Id').':') !!}
    {!! Form::select('organization_id', \App\Models\Organization::pluck('title', 'id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Software Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('software_id', __('Software Id').':') !!}
    {!! Form::select('software_id', \App\Models\Software::pluck('server_name','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    {!! Form::select('status', ['1'=>'فعال','0'=>'غیرفعال'], null, ['class' => 'form-control']) !!}
</div>

<!-- Relation Type Field -->
<div class="form-group col-sm-3">
    {!! Form::label('relation_type', __('Relation Type').':') !!}
    {!! Form::select('relation_type', ['User' => 'استفاده کننده', 'Owner' => 'مالک'], null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('softwareorganizations.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
