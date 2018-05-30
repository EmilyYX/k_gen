<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;
use Mail;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth',[
            'except'=>['show', 'create', 'store', 'index', 'confirmEmail']
        ]);
        $this->middleware('guest', [
            'only'=>['create']
        ]);
    }

    public function index(){
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create(){
        return view('users.create');
    }

    public function show(User $user){
        return view('users.show', compact('user'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $this->sendEmailConfirmationTo($user);
        session()->flash('success', 'アカウントが作成されました！メールアドレスをご確認ください。');

        return redirect()->route('/');
    }

    public function edit(User $user){
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request){
        $this->validate($request, [
            'name'=>'required|max:50',
            'password'=>'nullable|confirmed|min:6'
        ]);

        $data=[];
        $data['name']=$request->name;
        if($request->password){
            $data['password']=bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', 'プロフィールを更新しました');

        return redirect()->route('users.show', $user->id);

    }

    public function destroy(User $user){
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', 'アカウントを削除しました。');
        return back();
    }

    protected function sendEmailConfirmationTo($user){
        $view = 'emails.confirm';
        $data = compact('user');
        $to = $user->email;
        $subject = "うちのSNSを使ってありがとうございます。メールアドレスをご確認ください。";

        Mail::send($view, $data, function($message) use ($to, $subject){
            $message->to($to)->subject($subject);
        });
    }

    public function confirmEmail($token){
        $user = User::where('activation_token', $token)->firstOrFail();

        $user->activated = true;
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', 'アカウントのアクティベーションが完了しました。');
    }
}
