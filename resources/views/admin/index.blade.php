@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white"><h5>Панель администратора</h5></div>

                    <div class="card-body">
                        <h3>Мероприятия</h3>
                        <hr>
                        <a href="" class="btn btn-md btn-outline-dark mb-3 float-right" role="button" data-toggle="modal"
                           data-target="#modal_01">Добавить новое</a>
                        <br>
                        @if (count($events) > 0)
                            <form action="{{ route('update_events') }}" method="POST" class="form-horizontal">
                                @csrf
                                @method('PATCH')
                                <table class="table  table-striped table-responsive-sm" id="filter-table">
                                    <tbody>
                                    <tr>
                                        <th valign="top">
                                            Наименование мероприятия
                                        </th>
                                        <th valign="top">
                                            Дата проведения
                                        </th>
                                        <th valign="top">
                                            Менеджер
                                        </th>
                                        <th valign="top">
                                        </th>
                                    </tr>
                                    <tr class='table-filters'>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Поиск...">
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    @foreach($events as $event)
                                        <tr class='table-data'>
                                            <td  valign="top">
                                                {{ $event->name }}
                                            </td>
                                            <td width="20%" valign="top">
                                                {{ date("d.m.Y",strtotime($event->date)) }}
                                            </td>
                                            <td valign="top">
                                                <select class="form-control" name="{{ $event->id }}">
                                                    <option value="">Не выбран</option>
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}"
                                                                @if ($user->id == old('manager', $event->manager))
                                                                selected="selected"
                                                            @endif>{{ $user->name}} {{$user->last_name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td valign="top" class="float-right">
                                                <a href="#" class="btn btn-md btn-outline-dark" data-toggle="modal"
                                                   data-target="#modal_02" data-content="{{ $event }}">
                                                    <i class="fa fa-pencil fa-fw"></i>
                                                </a>
                                                <a href="{{ route('delete_event', ['events_id' => $event->id]) }}"
                                                   class="btn btn-md btn-outline-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <button class="btn btn-my">Сохранить изменения</button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('modal.newEvent')
    @include('modal.editEvent')

@endsection

