<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view ('register');
    }

    public function store()
    {
        $formData=request()->validate([
            'username'=>['required',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required','min:8'],
            'avatar'=>['image'],
        ]);
        if(request()->hasFile('thumbnail'))
        {
        $formData['avatar']=request()->file('thumbnail')->store('thumbnails');
        }else{
            $formData['avatar']='thumbnails/profile.jpg';
        }
        $user=User::create($formData);
        auth()->login($user);
        return redirect('/users/'.$user->username)->with('success','Welcome Dear '.$user->username);
    }

    public function edit(User $user)
    {
        return view('edit',[
            'user'=>$user,
        ]);
    }

    public function update(User $user)
    {
        $formData=request()->validate([
            'username'=>['required',Rule::unique('users','username')->ignore($user->id)],
            'email'=>['required',Rule::unique('users','email')->ignore($user->id)],
        ]);
        $formData['avatar']=request()->file('thumbnail')?request()->file('thumbnail')->store('thumbnails'):$user->avatar;
        $user->update($formData);
        return redirect('/users/'.$user->username)->with('success',"You Have Successfully Updated Your User Profile");
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success','Good Bye');
    }

    public function login()
    {
        return view('login');
    }

    public function account_login()
    {
        $formData=request()->validate([
            'email'=>['required','email',Rule::exists('users','email')],
            'password'=>['required','min:3','max:255'],
        ]);
        if(auth()->attempt($formData))
        {
            return redirect('/users/'.auth()->user()->username)->with('success','Welcome Back');
        }
        else{
            return redirect()->back()->withErrors([
                   'email'=>'User Credentials Wrong'
            ]);
        }
        
    }
}
