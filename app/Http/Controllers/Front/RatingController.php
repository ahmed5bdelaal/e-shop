<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function addRating(Request $request,$id)
    {
        $product = Product::findOrfail($id);
        $rating = Rating::where('prod_id',$id)->get();
        $stars_rated = $request->rate;
        $user = Rating::where('user_id',Auth::id())->where('prod_id',$id)->first();
        if($user){
            $user->stars_rated = $stars_rated;
            $user->update();
        }else{
            Rating::create([
                'user_id' => Auth::id(),
                'prod_id' => $id,
                'stars_rated' => $stars_rated,
                'sub' => $request->sub ,
                'desc' =>$request->desc,
            ]); 
        }
        $rating = Rating::where('prod_id',$id)->get();
        $rating_sum = Rating::where('prod_id',$id)->sum('stars_rated');
        if($rating->count() > 0){
            $product->rate = $rating_sum / $rating->count();
            $product->update();
        }
        return redirect()->back()->with('status','Product rated successfully');
    }
}
