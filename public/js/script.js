let _URL = window.location.origin; // определени доменного имени текущего сайта


$(document).ready(function () {

    //Фильтр по наименованиям мероприятий
    $('.table-filters input').on('input', function () {
        filterTable($(this).parents('table'));
    });
    function filterTable($table) {
        let $filters = $table.find('.table-filters td');
        let $rows = $table.find('.table-data');
        $rows.each(function (rowIndex) {
            let valid = true;
            $(this).find('td').each(function (colIndex) {
                if ($filters.eq(colIndex).find('input').val()) {
                    if ($(this).html().toLowerCase().indexOf($filters.eq(colIndex).find('input').val().toLowerCase()) == -1) {
                        valid = valid && false;
                    }
                }
            });
            if (valid === true) {
                $(this).css('display', '');
            } else {
                $(this).css('display', 'none');
            }
        });
    }

    // при открытии модального окна редактирования event (панель администратора)
    $('#modal_02').on('show.bs.modal', function (event) {
        // получить кнопку, которая его открыло
        let button = $(event.relatedTarget);
        // извлечь информацию из атрибута data-content
        let content = button.data('content');
        let id = content.id;
        let old_name = content.name;
        let old_date = content.date;
        let old_manager = content.manager;

        console.log(content);
        console.log(old_manager);

        $(this).find('#edit_form').attr('action', 'admin/events/' + id + '/update');
        $(this).find('#name').val(old_name);
        $(this).find('#date').val(old_date);
    });


    //////////// Устанавить / удалить чекбоксы в таблице Access
    $('#access_table').hide(500); //при открытии окна access_table скрываем
    $("#status").change(function () { //при изменении select
        if ($(this).val() == 3) { //если статус темы "закрытая" ( id==3 )
            $('#access_table').show(500); // открываем access_table
            $('input[type=checkbox]').each(function () { //начинаем перебирать все чекбокмы
                if ($(this).prop("disabled") == false) //если элемент цикла (чекбокс) не закрыт disabled
                {
                    $(this).removeAttr('checked'); // то снимаем чекбокс
                }
            })
        } else {
            $('.access').attr('checked', true); //иначе ставим для всех чекбоксы
            $('#access_table').hide(500); //скрываем access_table

        }
    });

// при открытии модального окна добавления темы
    $('#modal_03').on('show.bs.modal', function (event) {
        // получить кнопку, которая его открыло
        let button = $(event.relatedTarget);
        // извлечь информацию из атрибута data-content
        let id = button.data('content');
        console.log(id);
        $(this).find('#add_theme_form').attr('action', 'events/' + id + '/themes'); //устанавливаем для аттрибута action новое значение
    });

//Добавление нового message
   $('#btnAddMessage').click(function () {
       let theme_id = $('#theme_id').val();
       $.ajax({
           method: 'POST',
           url: `/messages`,
           data: $('#addMessage').serialize(),
           success: function (data) {
               $('#tag_container').empty();
                $('#tag_container').html(data);

                $.ajax({
                    method: 'GET',
                    url: `/themes_ajax/${theme_id}`,
                    success: function (data) { //Подлучаем из ответа номер последней страницы пагинатора
                       getData(data.last_page); //Переход на указанную страницу пагинатора
                    }
                });
            return false;
           }
       });
       return false;

   });

});

//Пагинация

$(window).on('hashchange', function () {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        } else {
            getData(page);
        }
    }
});

$(document).ready(function () {
    $(document).on('click', '.pagination a', function (event) {
        event.preventDefault();

        $('li').removeClass('active');
        $(this).parent('li').addClass('active');

        var myurl = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1];

        getData(page);
    });

});

function getData(page) {
    $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function (data) {
        $("#tag_container").empty().html(data);
        location.hash = page;
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}

// при открытии модального окна "Поделиться"
$(document).on('show.bs.modal', '#URLForMessage', function (event) {
    // получить кнопку, которая его открыло
    let button = $(event.relatedTarget);
    // извлечь информацию из атрибута data-content
    let id = button.data('content'); //получаем id ссобщения из кнопки
    let new_url = `<textarea>${_URL}/messages/${id}</textarea>`;
    $(this).find('.message_id').html(new_url);
});

