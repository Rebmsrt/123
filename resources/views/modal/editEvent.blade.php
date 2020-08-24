{{--Модальное окно редактирования мероприятия--}}
<div class="modal" tabindex="-1" role="dialog" id="modal_02">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование мероприятия</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal" id="edit_form">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Наименование') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name='name' placeholder="Наименование"
                                   autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date"
                               class="col-md-4 col-form-label text-md-right">{{ __('Дата проведения') }}</label>
                        <div class="col-md-6">
                            <input id="date" type="date" class="form-control" name='date' placeholder="Дата"
                                   autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Менеджер') }}</label>
                        <div class="col-md-6">
                            <select id="manager" class="form-control" name="manager">
                                <option value=""> Не выбран</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}"
                                            @if ($user->id == old('manager', "<div id='selected'></div>" ))
                                            selected='selected'
                                        @endif>{{ $user->name}} {{$user->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-my">Сохранить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

