<!-- Software Id Field -->
<div class="profile-username text-center">
    {!! Form::label('software_id', __('User Related Id').':') !!}
    {!! Form::select('software_id', \App\Models\Software::pluck('server_name','id'), null, ['class' => 'form-control']) !!}
</div>
<br>
{!! Form::submit(__('Details'), ['class' => 'btn btn-primary btn-block']) !!}