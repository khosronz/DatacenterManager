@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Softwareorganization')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($softwareorganization, ['route' => ['softwareorganizations.update', $softwareorganization->id], 'method' => 'patch']) !!}

                        @include('softwareorganizations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection