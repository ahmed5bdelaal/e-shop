<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    public function index()
    {
       return view('admin.profile');
    }

    
    public function upProfile(Request $request)
    {
       $this->validate($request,[
        'name'=>'required|string',
        'email'=>'required|email',
        'phone'=>'required|string',
    ]);
    $data=$request->all();
    // return $data;
    $user=User::where('id',auth()->id())->first();
    // return $settings;
    $status=$user->update($data);
    if($status){
        return redirect()->back()->with('status','Profile successfully updated');
    }
    else{
        return redirect()->back()->with('status','Please try again');
    }
    }

    public function upPassword(Request $request)
    {
        $this->validate($request,[
                'o_password'=>'required',
                'n_password'=>'required',
        ]);

        $user=User::where('id',auth()->id())->first();

        if(!Hash::check($request->o_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->n_password)
        ]);

        return redirect()->back()->with('status','Password successfully updated');
    }
}