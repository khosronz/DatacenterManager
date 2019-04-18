<!-- User Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- User Related Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_related_id', __('User Related Id').':') !!}
    {!! Form::select('user_related_id', \App\User::pluck('name','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('role_id', __('Role Id').':') !!}
    {!! Form::select('role_id', \App\Models\Role::pluck('title','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roleusers.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
