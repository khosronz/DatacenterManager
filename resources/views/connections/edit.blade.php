@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Connection')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($connection, ['route' => ['connections.update', $connection->id], 'method' => 'patch']) !!}

                        @include('connections.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection