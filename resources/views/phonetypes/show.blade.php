@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Phonetype')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('phonetypes.show_fields')
                    <div class="container">
                        <div class="col-sm-12">
                            <a href="{!! route('phonetypes.index') !!}" class="btn btn-default">@lang('Back')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
