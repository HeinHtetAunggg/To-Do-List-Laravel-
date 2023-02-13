<?php

namespace App\Http\Controllers;

use App\Models\TaskInput;
use App\Models\User;
use Illuminate\Http\Request;

class TaskInputController extends Controller
{
    public function store(User $user)
    {
        request()->validate([
            'body'=>['required','min:1']
        ],[
            'body'=>'Please Input At Least 1 Character To Add Task To Your List'
        ]);
        $user->taskinputs()->create([
            'body'=>request('body'),
            'user_id'=>auth()->id(),
        ]);
        return redirect('/users/'.$user->username);
    }
}
