@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Успешная регистрация!</div>

                    <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                Вы успешно зарегистрировалист! Теперь можно <a href="/login"> войти в систему</a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
