<?php

namespace App\Http\Controllers;

use App\Models\TaskInput;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create(User $user)
    {
        return view('todolist',[
            'user'=>$user,
            'taskinputs'=>$user->taskinputs->sortDesc(),
        ]);
    }

    public function destroy(User $user,TaskInput $taskinput)
    {
        $taskinput->delete();
        return redirect('/users/'.$user->username)->with('success', 'Congratulations on accomplishing the task '.ucwords($taskinput->body));
    }


}

