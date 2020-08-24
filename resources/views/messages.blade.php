@if(count($messages)>0)
    @foreach($messages as $message)
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="form-group">
                    <ul class="list-group">
                        <li class="list-group-item ">
                            <div class="row">
                                <div class="col col-md-2 text-center">
                                    <h6> {{ $message->user->last_name }} {{ $message->user->name }} </h6>
                                    <img class="img-thumbnail" src="{{ $message->user->photo }}"
                                         alt="{{ $message->user->name }} ">

                                </div>
                                <div class="col col-md-9">
                                    <div class="row ml-1">
                                        <small>id: {{ $message->id }}</small>&nbsp&nbsp&nbsp&nbsp
                                        <small>Создано: {{date("d.m.Y",strtotime($message->created_at))}}</small>&nbsp&nbsp&nbsp&nbsp
                                        <small>Изменено: {{date("d.m.Y",strtotime($message->updated_at))}}</small>
                                    </div>
                                    <div class="row mt-4 ml-1">
                                        {{ $message->message }}
                                    </div>
                                    {{--                                ответ--}}
                                    <ul class="list-group">
                                        @foreach($message->answers as $answer)
                                            <li class="list-group-item row mt-4 ml-1">
                                                {{$answer->body}}
                                            </li>



                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col col-md-1 ">
                                    <div class="float-right">
                                        <a href="#" data-toggle="modal" role="button"
                                           data-target="#URLForMessage" data-content="{{ $message->id }}">
                                            <i class="fa fa-share-alt text-secondary"></i>
                                        </a>
                                    </div>
                                    <br>
                                    <div class="float-right">
                                        <a href="#" data-toggle="modal" data-target="#modal_07" data-content="{{ $message}}" title="Ответить">
                                            <i class="fa fa-reply text-secondary"></i>
                                        </a>
                                    </div><br>

                                    <div class="float-right">

                                        <a href="#" data-toggle="modal" data-target="#modal_04" data-content="{{ $message }}" title="Редактировать">
                                            <i class="fa fa-pencil-square-o text-secondary"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    @endforeach
    <div >{{ $messages->links() }}</div>
    @include('modal.URLForMessage')
    @include('modal.editMessage')
    @include('modal.AnswerMessage')

@endif

