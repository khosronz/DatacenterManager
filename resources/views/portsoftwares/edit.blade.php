@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Portsoftware')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($portsoftware, ['route' => ['portsoftwares.update', $portsoftware->id], 'method' => 'patch']) !!}

                        @include('portsoftwares.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection