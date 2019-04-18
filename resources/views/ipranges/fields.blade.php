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

<!-- From Field -->
<div class="form-group col-sm-3">
    {!! Form::label('from', __('From').':') !!}
    {!! Form::text('from', null, ['class' => 'form-control']) !!}
</div>

<!-- To Field -->
<div class="form-group col-sm-3">
    {!! Form::label('to', __('To').':') !!}
    {!! Form::text('to', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('user_id', __('User Id').':') !!}
    {!! Form::text('user_id', \Illuminate\Support\Facades\Auth::id(), ['class' => 'form-control']) !!}
</div>

<!-- Location Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('location_id', __('Location Id').':') !!}
    {!! Form::select('location_id', \App\Models\Location::pluck('title','id'), null, ['class' => 'form-control']) !!}
</div>

<!-- Desc Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desc', __('Desc').':') !!}
    {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('ipranges.index') !!}" class="btn btn-default">@lang('Cancel')</a>
</div>
