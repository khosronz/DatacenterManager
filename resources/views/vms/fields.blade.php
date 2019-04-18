<!-- Username Field -->
<div class="form-group col-sm-3">
    {!! Form::label('username', __('Username').':') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-3">
    {!! Form::label('password', __('Password').':') !!}
    <input type="password" class="form-control" name="password" placeholder={{__('Password')}}>
</div>

<!-- Ip Field -->
<div class="form-group col-sm-3">
    {!! Form::label('ip', __('Ip').':') !!}
    {!! Form::text('ip', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- Vmtype Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('vmtype_id', __('Vmtype Id').':') !!}
    {!! Form::select('vmtype_id', \App\Models\Vmtype::pluck('title','id'), null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('vms.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
