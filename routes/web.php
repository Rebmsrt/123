<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\RegisterController@index');

Auth::routes();

Route::get('/success', function () {
    return view('success');
});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');


//Events::

Route::get('admin/events', 'AdminController@events')->name('events')->middleware('admin'); // Список всех мероприятий

Route::post('admin/events', 'AdminController@store')->name('create_event')->middleware('admin'); // Создания

Route::get('admin/events/{events_id}/delete', 'AdminController@destroy')->name('delete_event')->middleware('admin'); //Удаление

Route::patch('admin/events/update_all', 'AdminController@update_all')->name('update_events')->middleware('admin'); //Редактирование списком

Route::patch('admin/events/{events_id}/update', 'AdminController@update')->name('update_event')->middleware('admin'); //Редактирование одного мероприятия


//Themes

Route::get('events/{events_id}/themes', 'HomeController@indexThemes')->name('themes')->middleware('auth'); // Список всех тем

Route::post('events/{events_id}/themes', 'HomeController@store')->name('create_theme')->middleware('auth'); // Создание



//Messages

Route::get('themes/{themes_id}', 'MessageController@showMessages')->name('show_messages')->middleware('auth'); // Список сообщений темы

Route::get('themes_ajax/{themes_id}', 'MessageController@ajaxMessages')->name('show_messages_ajax')->middleware('auth'); // Список сообщений темы только для запроса ajax

Route::post('themes/{id}/answer', 'MessageController@store_answer')->name('store_answer')->middleware('auth'); // создание ответа на сообщение

Route::patch('themes/messages/{id}/update', 'MessageController@update')->name('update')->middleware('auth'); // Редактирование сообщения

Route::Resource('messages', 'MessageController');
//Читает уведомления
Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});


