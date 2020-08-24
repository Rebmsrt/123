{{--Модальное окно редактирования сообщения--}}
<div class="modal" tabindex="-1" role="dialog" id="modal_04">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Редактирование</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('update', ['id' =>$message->id])}}" method="post" class="form-horizontal" id="edit_message_form">
                    @csrf
                    @method('PATCH')
                    <div class="form-group row">
                        <label for="message"
                               class="col-md-4 col-form-label text-md-right">{{ __('Сообщение') }}</label>
                        <div class="col-md-6">

                            <textarea  rows="1" class="form-control mb-3" type="text" id="message" name="message"
                                       required></textarea>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-my">Редактировать</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
