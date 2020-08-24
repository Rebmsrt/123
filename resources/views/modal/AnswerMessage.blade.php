{{--Модальное окно ответа на сообщение --}}
<div class="modal" tabindex="-1" role="dialog" id="modal_07">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ответ на сообщение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('store_answer',['id' =>$message->id])}}" method="post" class="form-horizontal" >
                    @csrf
                    @method('post')
                    <div class="form-group row">

                        <label name="body"
                               class="col-md-4 col-form-label text-md-right">{{ __('Ответ') }}</label>
                        <div class="col-md-6">

                            <textarea id="body" name="body"  rows="1" class="form-control mb-3" type="text"
                                      required></textarea>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-my">Ответить</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
