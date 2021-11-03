<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailNotify;
use Symfony\Component\HttpFoundation\Response;
class AdminController extends Controller
{
    public function processUser($user,$type, Request $request){
        $status = User::where('id',$user)->update(['work_flow_engine' => $type]);
        if($status){
            $mailArray = User::find($user);          
            Mail::to('janakiram1607@gmail.com', "Testing")->send(new SendMailNotify($mailArray));
            if((Response::HTTP_OK == 200) || (Response::HTTP_OK == 202)){
                return redirect()->route('dashboard');
            }else{
                dd('failed');
            }
        }
    }
}

