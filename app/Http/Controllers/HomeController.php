<?php

namespace App\Http\Controllers;

use App\Mail\Order as MailOrder;
use App\Models\Order;
use App\Models\setting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use Mail;
use Kutia\Larafirebase\Facades\Larafirebase;
use App\Mail\OrderMail;
use Barryvdh\DomPDF\Facade\Pdf;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');
    }

    public function settings(){
        $data=setting::first();
        return view('admin.settings')->with('data',$data);
    }

    public function settingsUpdate(Request $request){
        $this->validate($request,[
            'name'=>'required|string',
            'short_des'=>'required|string',
            'description'=>'required|string',
            'photo'=>'required',
            'logo'=>'required',
            'address'=>'required|string',
            'email'=>'required|email',
            'phone'=>'required|string',
            'facebock'=>'required|string',
            'twitter'=>'required|string',
            'google'=>'required|string',
            'instagram'=>'required|string',
        ]);
        $data=$request->all();
        if($request->hasFile('logo')){
            $path='assets/images/logo';
            $filename=Helper::uplodePhoto($request->logo,$path);
            $data['logo'] = $filename;
        }
        if($request->hasFile('photo')){
            $path='assets/images/logo';
            $filename=Helper::uplodePhoto($request->photo,$path);
            $data['photo'] = $filename;
        }
        $settings=Setting::first();
        $status=$settings->update($data);
        if($status){
            return redirect()->back()->with('status','Setting successfully updated');
        }
        else{
            return redirect()->back()->with('error','Please try again');
        }
    }
    public function downloadPDF($id)
    {
        $order = Order::find($id);
  
        $pdf = PDF::loadView('admin.order.pdf', compact('order'));
        return $pdf->download($order->tracking_no .'.pdf');
  
    }

    public function sendmail($id)
    {
        $order = Order::find($id);
        Mail::to($order->email)->send(new OrderMail($order));
        return redirect()->back()->with('status','order mail has been sent to'.$order->name);
    }

    public function updateToken(Request $request){
        try{
            $request->user()->update(['fcm_token'=>$request->token]);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }

    public function notification(Request $request){
        $request->validate([
            'title'=>'required',
            'message'=>'required'
        ]);
    
        try{
            $fcmTokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();
    
            //Notification::send(null,new SendPushNotification($request->title,$request->message,$fcmTokens));
    
            /* or */
    
            //auth()->user()->notify(new SendPushNotification($title,$message,$fcmTokens));
    
            /* or */
    
            Larafirebase::withTitle($request->title)
                ->withBody($request->message)
                ->sendMessage($fcmTokens);
    
            return redirect()->back()->with('status','Notification Sent Successfully!!');
    
        }catch(\Exception $e){
            report($e);
            return redirect()->back()->with('error','Something goes wrong while sending notification.');
        }
    }
}
