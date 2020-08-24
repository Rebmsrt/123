<?php

namespace App\Http\Controllers;

use App\Events;
use App\Notifications\AddMan;
use App\Notifications\DelMan;
use App\Notifications\RepliedToThread;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(User $user)
    {
        $events = Events::all();
        $events = $events->sortBy('date');
        $users = User::all();
        //      $events = DB::table('events')->get(); //Это второй способ обращения к базе данных. В этом случае добавляем: use Illuminate\Support\Facades\DB;
        return view('admin.index', ['events' => $events, 'users' => $users ]);
    }
    //создаем событие
    public function store(Request $request)
    {
        Events::create($request->all());
        return redirect()->back();

    }
    //удаление
    public function destroy($id)
    {
        Events::destroy($id);
        return back();
    }
    //изменение всех сразу
    public function update_all(Request $request)
    {
        $users=User::all();
        $events = Events::all();
        foreach ($events as $event) {
            if ($request->has($event->id)) {
                $data = Events::find($event->id);
                //проверяем всех пользователей на условие и отправляем уведомление
                foreach ($users as $user){
                    if ($user->id==$data->manager){
                        $user->notify(new DelMan($user));
                    }
                }
                $data->manager = $request->input($event->id);
                $data->save();
                //проверяем всех пользователей на условие и отправляем уведомление
                foreach ($users as $user){
                    if ($user->id==$data->manager){
                    $user->notify(new AddMan($user));
                    }
                }

            }
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $users=User::all();
        $event = Events::find($id);
        //проверяем всех пользователей на условие и отправляем уведомление
        foreach ($users as $user){
            if ($user->id==$event->manager){
                $user->notify(new DelMan($user));
            }
        }
        $event ->fill($request->all());
        $event->save();
        //проверяем всех пользователей на условие и отправляем уведомление
        foreach ($users as $user){
            if ($user->id==$event->manager){
                $user->notify(new AddMan($user));
            }
        }
        return back();
    }



}
