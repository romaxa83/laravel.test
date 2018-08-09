<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\VerifyMail;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    //трейт для регистрации пользователя
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

//    public function verify($token)
//    {
//        if(!$user = User::where('verify_token',$token)->first()){
//            return redirect()->route('login')
//                ->with('error','Извените мы не можем вас идентифицировать');
//        }
//
//        if($user->status !== User::STATUS_WAIT){
//            return redirect()->route('login')
//                ->with('error','Вы уже верифицированы');
//        }
//
//        $user->status = User::STATUS_ACTIVE;
//        $user->verify_tokrn = null;
//        $user->save();
//
//        return redirect()->route('login')
//            ->with('success','Ваш email потвержден.Можете залогиниться');
//    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
//            'password' => bcrypt($data['password']), //можно и так хешировать
            'verify_token' => Str::random(),
//            'status' => User::STATUS_WAIT,
        ]);
        //отправка письма для потверждения регистрации
//        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }

//    protected function registered(Request $request, $user)
//    {
//        $this->guard()->logout();
//
//        return redirect()->route('login')
//            ->with('success','Верефецируйтесь на своей почте');
//    }
}
