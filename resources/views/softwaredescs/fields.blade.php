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

<!-- Desc Date Field -->
<div class="form-group col-sm-3">
    {!! Form::label('desc_date', __('Desc Date').':') !!}
{{--    {!! Form::date('desc_date', null, ['class' => 'form-control']) !!}--}}
    <input class="percal form-control" name="desc_date" id="desc_date">
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
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
    <a href="{!! route('softwaredescs.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
