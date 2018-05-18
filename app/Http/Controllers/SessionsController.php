<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\requests;
use Auth;

class SessionsController extends Controller
{
    public function __construct(){
        $this->middleware('guest', [
            'only'=>['create']
        ]);
    }

    public function create(){
        return view('sessions.create');
    }

    public function store(Request $request){
        $credentials = $this->validate($request, [
            'email'=>'required|email|max:255',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials, $request->has('remember'))){
            session()->flash('success', 'お帰りなさい！');
            return redirect()->intended(route('users.show', [Auth::user()]));
        }else{
            session()->flash('danger', 'パスワードが正しくありません');
            return redirect()->back();
        }
    }

    public function destroy(){
        Auth::logout();
        session()->flash('success', 'ログアウトされました。');
        return redirect('login');
    }
}
