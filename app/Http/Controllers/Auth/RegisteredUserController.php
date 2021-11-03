<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\work_flow_engine;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailNotify;
use Symfony\Component\HttpFoundation\Response;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'dob' => 'required|string|max:255'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'dob' => $request->dob,
            'role' => $request->role
        ]);
        event(new Registered($user));
        $mailArray = array('status'=>'Processing', 'uName'=>$request->first_name);      
        Mail::to($request->email, $request->first_name)->send(new SendMailNotify($mailArray));
            if((Response::HTTP_OK == 200) || (Response::HTTP_OK == 202)){
                $info = 'Successfully registered';
            }else{
                $info = 'Registration Failed. Please Contact Admin.';
            }
        return redirect('/register')->with('message', $info);
    }
}
