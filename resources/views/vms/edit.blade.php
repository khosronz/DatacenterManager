@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Vm')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vm, ['route' => ['vms.update', $vm->id], 'method' => 'patch']) !!}

                        @include('vms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection