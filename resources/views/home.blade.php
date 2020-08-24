@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if (count($events) > 0)
            @foreach($events as $event)
                <div class="row justify-content-center mb-3">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9 text-white"><h5><i class="fa fa-calendar fa-fw"
                                                                            aria-hidden="true"></i>&nbsp;{{ $event->name }}
                                        </h5></div>
                                    <div class="col-md-3 float-right text-light">Дата проведения: <strong
                                            class="text-warning">{{ date("d.m.Y", strtotime($event->date)) }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if(count($themes)>0)


                                    @foreach($themes as $theme)
                                            @if($theme->status==1)

                                        @if($theme->events_id ==  $event->id)


                                            <div class="row justify-content-center ">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <ul class="list-group">
                                                            <a class="text-decoration-none"
                                                               href="{{ route('show_messages', ['themes_id' => $theme->id]) }}">
                                                                <li class="list-group-item list-group-item-action list-group-item-outline-secondary pointer">
                                                                    <button type="button"
                                                                            class="btn btn-outline-secondary btn-circle">
                                                                        <i class="fa fa-comments"></i></button>
                                                                    <strong> {{ $theme->name }}</strong>

                                                                    <span
                                                                        class="badge badge-secondary badge-pill float-right">
                                                                        {{ count($theme->messages) }}
                                                                    </span>
                                                                </li>
                                                            </a>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>


                                        @endif
                                        @endif
                                                @if($theme->status==3 )
                                                    @foreach($theme_accesses as $theme_access)
                                                    @if($theme->events_id ==  $event->id && $theme->id == $theme_access->theme_id && (((auth()->user()->id==$theme_access->user_id) || (Auth::user()->is_admin == 1 ) || (($event->manager) ===  Auth::user()->id))))



                                                        <div class="row justify-content-center ">

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <ul class="list-group">
                                                                        <a class="text-decoration-none"
                                                                           href="{{ route('show_messages', ['themes_id' => $theme->id]) }}">
                                                                            <li class="list-group-item list-group-item-action list-group-item-outline-secondary pointer">
                                                                                <button type="button"
                                                                                        class="btn btn-outline-secondary btn-circle">
                                                                                    <i class="fa fa-comments"></i></button>
                                                                                <strong> {{ $theme->name }}</strong>

                                                                                <span
                                                                                    class="badge badge-secondary badge-pill float-right">
                                                                        {{ count($theme->messages) }}
                                                                    </span>
                                                                            </li>
                                                                        </a>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                        </div>


                                                @break
                                                    @endif
                                    @endforeach
                                                @endif

                                                @endforeach
                                @endif

{{--                                    Кнопка "Создать тему" досупна только менеджеру мероприятия или админу--}}

                                @if(($event->manager) ===  Auth::user()->id || (Auth::user()->is_admin == 1 ))
                                    <hr>
                                    <a href="" class="btn btn-md btn-my mb-3 float-right" role="button"
                                       data-toggle="modal" data-target="#modal_03"
                                       data-content={{ $event->id }}>Создать тему</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    @include('modal.newTheme')
@endsection
