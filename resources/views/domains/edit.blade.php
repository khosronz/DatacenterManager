@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Domain')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($domain, ['route' => ['domains.update', $domain->id], 'method' => 'patch']) !!}

                        @include('domains.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection