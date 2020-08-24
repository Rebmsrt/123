{{--Модальное окно добавления нового мероприятия--}}
<div class="modal" tabindex="-1" role="dialog" id="modal_01">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Новое мероприятие</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{  route ('create_event') }}" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Наименование') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name='name'
                                   value="{{ isset($events->name) }}" placeholder="Введите наименование мероприятия"
                                   autofocus required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date"
                               class="col-md-4 col-form-label text-md-right">{{ __('Дата проведения') }}</label>
                        <div class="col-md-6">
                            <input id="date" type="date" class="form-control" name='date'
                                   value="{{ isset($events->date) }}" placeholder="Введите дату" autofocus required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-my">Добавить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
