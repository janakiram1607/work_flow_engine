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
            $userDetail = User::find($user);
            $mailArray = array('status'=>$userDetail->workFlow, 'uName'=>$userDetail->FullName);      
            Mail::to($userDetail->email, $userDetail->FullName)->send(new SendMailNotify($mailArray));
            if((Response::HTTP_OK == 200) || (Response::HTTP_OK == 202)){
                $info = 'Status Updated and Notification Sent.';
            }else{
                $info = 'Process Failed. Please Try Again.';
            }
        return redirect('/dashboard')->with('message', $info);
        }
    }
}

