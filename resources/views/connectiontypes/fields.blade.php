<!-- Title Field -->
<div class="form-group col-sm-3">
    {!! Form::label('title', __('Title').':') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', __('Status').':') !!}
    {!! Form::select('status', ['1'=>'فعال','0'=>'غیرفعال'], null, ['class' => 'form-control']) !!}
</div>

<!-- Standard Port Field -->
<div class="form-group col-sm-2">
    {!! Form::label('standard_port', __('Standard Port').':') !!}
    {!! Form::number('standard_port', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('connectiontypes.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
