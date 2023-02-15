<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Helpers\Helper;
use Illuminate\Support\Facades\File; 
use Hash;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_as == 1){
            return view('user.profileAdmin');
        }else{
            return view('user.profileUser');
        }
    }

    
    public function upProfile(Request $request)
    {
       $this->validate($request,[
        'name'=>'required|string',
        'email'=>'required|email',
        'phone'=>'required|string',
    ]);
    $data=$request->all();
    $user=User::where('id',auth()->id())->first();
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

        if(!Hash::check($request->o_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        $status=User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->n_password)
        ]);

        if($status){
            return redirect()->back()->with('status','Passsword successfully updated');
        }
        else{
            return redirect()->back()->with('status','Please try again');
        }        }

    public function photoUser(Request $request)
    {
        $user=User::where('id',auth()->id())->first();
        $pathDelete = 'assets/images/users/'.$user->photo;
        if(File::exists($pathDelete)){
            File::delete($pathDelete);
        }

        $path='assets/images/users';
        $filename=Helper::uplodePhoto($request->photo,$path);
        $user->photo = $filename;
        $status = $user->update();
        if($status){
            return redirect()->back()->with('status','Photo successfully updated');
        }
        else{
            return redirect()->back()->with('status','Please try again');
        }    
    }

    public function users()
    {
        $users= User::all();
        return view('admin.users',compact('users'));
    }

    public function makeAdmin($id)
    {
        $user=User::where('id',$id)->first();
        $user->role_as = 1;
        $status=$user->update();
        if($status){
            return redirect()->back()->with('status',$user->name.' is admin');
        }else{
            return redirect()->back()->with('status','Please try again');
        }    
    }

    public function removeUser($id)
    {
        $user=User::where('id',$id)->first();
        $status=$user->delete();
        if($status){
            return redirect()->back()->with('status',$user->name.' is deleted');
        }else{
            return redirect()->back()->with('status','Please try again');
        }    
    }
}