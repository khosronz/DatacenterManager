@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    @include('adminlte-templates::common.errors')
                </div>

                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                               <h3 class="profile-username text-center">{{\Illuminate\Support\Facades\Auth::user()->name}}</h3>

                                <p class="text-muted text-center">{{\Illuminate\Support\Facades\Auth::user()->desc}}</p>
                                {!! Form::open(['route' => 'software.showdetails','method'=>"GET"]) !!}
                                @include('software.fields-select')

                                {!! Form::close() !!}
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">@lang('About Software')</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-book margin-r-5"></i> @lang('Connections')</strong>
                                @if(!empty($software))

                                    <p class="text-muted">
                                        @if(!empty($software->connections))
                                            <span class="label label-success">
                                            @php
                                                foreach ($software->connections as $connection){


                                            @endphp
                                                {{$connection->connectiontype->title . ':'. $connection->port . ' / ' }}
                                                @php
                                                    }
                                                @endphp
                                        </span>
                                        @else
                                            <span class="label label-danger">@lang('Not Found Connection')</span>
                                        @endif
                                    </p>
                                @endif


                                <hr>

                                <strong><i class="fa fa-map-marker margin-r-5"></i> @lang('Location')</strong>

                                <p class="text-muted">
                                    @if(!empty($software))
                                        <span class="label label-success">
                                            {{ $software->location->title . ' / ' }}
                                        </span>
                                    @endif
                                </p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> @lang('Users')</strong>

                                <p>
                                    @if(!empty($software))
                                        @if(count($software->softwareUsers)!=0)
                                            @php
                                                foreach ($software->softwareUsers as $u){
                                            @endphp
                                                    <span class="label label-success">{{$u->softwareUsers->name . ':'. $u->title . ' / ' }}</span>
                                            @php
                                                }
                                            @endphp
                                        @else
                                            <span class="label label-danger">@lang('Not Found User')</span>
                                        @endif
                                    @endif
                                </p>
                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> @lang('Domain')</strong>

                                <p>
                                    @if(!empty($software))
                                        <span class="label label-success">{{$software->domain->url }}</span>
                                    @else
                                        <span class="label label-danger">@lang('Not Found Domain')</span>
                                    @endif
                                </p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> @lang('OS')</strong>

                                <p>
                                    @if(!empty($software))
                                        <span class="label label-success">{{$software->os->title }}</span>
                                    @endif
                                </p>

                                <hr>

                                <strong><i class="fa fa-pencil margin-r-5"></i> @lang('Webaddresses')</strong>

                                <p>
                                    @if(!empty($software))
                                        @if(count($software->webaddresses)!=0)
                                            @php
                                                foreach ($software->webaddresses as $webaddress){
                                            @endphp
                                                    <span class="label label-success">{{$webaddress->title}}</span>
                                                    <span class="label label-success">{{$webaddress->url}}</span>
                                                    <hr>
                                            @php
                                                }
                                            @endphp
                                        @else
                                            <span class="label label-danger">@lang('Not Found Webaddress')</span>
                                        @endif
                                    @endif
                                </p>

                                <hr>

                                <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim
                                    neque.</p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
                                <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                                <li><a href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                 src="{{asset("img/user_image.png")}}" alt="user image">
                                            <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>
                                        <ul class="list-inline">
                                            <li><a href="#" class="link-black text-sm"><i
                                                            class="fa fa-share margin-r-5"></i> Share</a></li>
                                            <li><a href="#" class="link-black text-sm"><i
                                                            class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                            </li>
                                            <li class="pull-right">
                                                <a href="#" class="link-black text-sm"><i
                                                            class="fa fa-comments-o margin-r-5"></i> Comments
                                                    (5)</a></li>
                                        </ul>

                                        <input class="form-control input-sm" type="text"
                                               placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                 src="{{asset("img/user_image.png")}}" alt="User Image">
                                            <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                            <span class="description">Sent you a message - 3 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <form class="form-horizontal">
                                            <div class="form-group margin-bottom-none">
                                                <div class="col-sm-9">
                                                    <input class="form-control input-sm" placeholder="Response">
                                                </div>
                                                <div class="col-sm-3">
                                                    <button type="submit"
                                                            class="btn btn-danger pull-right btn-block btn-sm">Send
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                 src="{{asset("img/user_image.png")}}" alt="User Image">
                                            <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row margin-bottom">
                                            <div class="col-sm-6">
                                                <img class="img-responsive" src="{{asset("img/user_image.png")}}"
                                                     alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="{{asset("img/user_image.png")}}"
                                                             alt="Photo">
                                                        <br>
                                                        <img class="img-responsive" src="{{asset("img/user_image.png")}}"
                                                             alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-responsive" src="{{asset("img/user_image.png")}}"
                                                             alt="Photo">
                                                        <br>
                                                        <img class="img-responsive" src="{{asset("img/user_image.png")}}"
                                                             alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <ul class="list-inline">
                                            <li><a href="#" class="link-black text-sm"><i
                                                            class="fa fa-share margin-r-5"></i> Share</a></li>
                                            <li><a href="#" class="link-black text-sm"><i
                                                            class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                                            </li>
                                            <li class="pull-right">
                                                <a href="#" class="link-black text-sm"><i
                                                            class="fa fa-comments-o margin-r-5"></i> Comments
                                                    (5)</a></li>
                                        </ul>

                                        <input class="form-control input-sm" type="text"
                                               placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <ul class="timeline timeline-inverse">

                                        @if(!empty($software))
                                            @if(count($software->descs)!=0)
                                                @php
                                                    foreach ($software->descs as $desc){
                                                @endphp
                                                <!-- timeline time label -->
                                                    <li class="time-label">
                                                        <span class="bg-red">
                                                          {{jdate($desc->desc_date)->getYear().'/'.jdate($desc->desc_date)->getMonth().'/'.jdate($desc->desc_date)->getDay()}}
                                                        </span>
                                                    </li>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                    <li>
                                                        <i class="fa fa-envelope bg-blue"></i>

                                                        <div class="timeline-item">
                                                            <span class="time"><i class="fa fa-clock-o"></i> {{jdate($desc->desc_date)->getHour().':'.jdate($desc->desc_date)->getMinute().':'.jdate($desc->desc_date)->getSecond()}}</span>

                                                            <h3 class="timeline-header"><a href="#">{{$desc->user->name}}</a> @lang('sent you an email')</h3>

                                                            <div class="timeline-body">
                                                                {{$desc->desc}}
                                                            </div>
                                                            <div class="timeline-footer">
                                                                <a class="btn btn-primary btn-xs">Read more</a>
                                                                <a class="btn btn-danger btn-xs">Delete</a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <!-- END timeline item -->
                                                @php
                                                    }
                                                @endphp
                                            @else
                                                <span class="label label-danger">@lang('Not Found Desc')</span>
                                        @endif
                                    @endif
                                        <!-- timeline time label -->
                                        <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                                        </li>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <li>
                                            <i class="fa fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new
                                                    photos</h3>

                                                <div class="timeline-body">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                    <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                </div>
                                            </div>
                                        </li>
                                        <!-- END timeline item -->
                                        <li>
                                            <i class="fa fa-clock-o bg-gray"></i>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName"
                                                       placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                       placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName"
                                                       placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputExperience"
                                                   class="col-sm-2 control-label">Experience</label>

                                            <div class="col-sm-10">
                                                    <textarea class="form-control" id="inputExperience"
                                                              placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills"
                                                       placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and
                                                            conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->

        </div>
    </div>
    <div class="content-wrapper"></div>
@endsection
