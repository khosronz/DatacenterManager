@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Phonetype')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($phonetype, ['route' => ['phonetypes.update', $phonetype->id], 'method' => 'patch']) !!}

                        @include('phonetypes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection