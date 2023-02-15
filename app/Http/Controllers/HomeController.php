<?php

namespace App\Http\Controllers;

use App\Mail\Order as MailOrder;
use App\Models\Order;
use App\Models\setting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\File; 
use Kutia\Larafirebase\Facades\Larafirebase;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\SettingsRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('/home');
    }

    public function settings(){
        $data=setting::first();
        return view('admin.settings')->with('data',$data);
    }

    public function settingsUpdate(SettingsRequest $request){
        $set=setting::first();
        if(!$set || Auth::user()->role_as == 1){
            $data=$request->validated();
            if($request->hasFile('logo')){
                $path='assets/images/logo';
                $filename=Helper::uplodePhoto($request->logo,$path);
                $data['logo'] = $filename;
            }
            if(!$set){
                $status=Setting::create($data);
                $admin = new User;
                $admin->name = $request->firstname .' '.$request->lastname;
                $admin->email = $request->emailUser;
                $admin->role_as = 1;
                $admin->password = Hash::make($request->password);
                if($request->hasFile('photo')){
                    $path='assets/images/users';
                    $filename=Helper::uplodePhoto($request->photo,$path);
                    $admin->photo = $filename;
                }
                $user = $admin->save();
                Auth::login($admin);
                if($status && $user){
                    return redirect('/dashboard')->with('status','Setting successfully updated');
                }
            }else{
                if($request->hasFile('logo')){
                    $pathDelete = 'assets/images/logo/'.$set->logo;
                    if(File::exists($pathDelete)){
                        File::delete($pathDelete);
                    }
                }
                $status=$set->update($data);
                if($status){
                    return redirect()->back()->with('status','Setting successfully updated');
                }else{
                    return redirect()->back()->with('error','Please try again');
                }
            }
        }
    }
    
    public function downloadPDF($id)
    {
        $order = Order::find($id);
  
        $pdf = PDF::loadView('admin.order.pdf', compact('order'));
        return $pdf->download($order->tracking_no .'.pdf');
  
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
            Larafirebase::withTitle($request->title)
                ->withBody($request->message)
                ->sendMessage($fcmTokens);
    
            return redirect()->back()->with('status','Notification Sent Successfully!!');
    
        }catch(\Exception $e){
            report($e);
            return redirect()->back()->with('error','Something goes wrong while sending notification.');
        }
    }

    public function removeContact($id)
    {
        $contact=Contact::firstOrFill($id);
        $status=$contact->delete();
        if($status){
            return redirect()->back()->with('status','contact deleted Successfully!!');
        }else{
            return redirect()->back()->with('error','Something goes wrong try again.');
        }
    }

    public function contacts()
    {
        $contacts=Contact::all();
        return view('admin.contacts',compact('contacts'));
    }
}
