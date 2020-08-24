@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Сообщение</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-md-2 text-center">
                                <h6> {{ $message->user->last_name }} {{ $message->user->name }} </h6>
                                <img class="img-thumbnail" src="{{ $message->user->photo }}"
                                     alt="{{ $message->user->name }} ">
                            </div>
                            <div class="col col-md-10">
                                <div class="row ml-1">
                                    <small>Создано: {{date("d.m.Y",strtotime($message->created_at))}}</small>&nbsp&nbsp
                                    <small>Изменено:</small>
                                </div>
                                <div class="row mt-4 ml-1">
                                    {{ $message->message }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
