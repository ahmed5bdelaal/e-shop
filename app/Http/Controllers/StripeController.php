<?php

namespace App\Http\Controllers;
use Stripe;
use Session;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function handleGet()
    {
        return view('home');
    }

    public function handlePost(Request $request)
    {   
        try{
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET','sk_test_51Lwa1mLotAv2HWJvJXSD54uE3HhZk8sTYXYwtbJFktWsiMSfQRm5urUl0IkgNpmyDtB48zxgjqEVT6aHbXZBDipY00dysWaiJ2'));
            Stripe\Charge::create ([
                    "amount" => $request->input('total')*100,
                    "currency" => "egp",
                    "source" => $request->stripeToken,
                    "description" => "Making test payment." 
            ]);
            
        }catch(\Exception $e){
            return response()->json([
                'status'=>'some error try again',
            ],500);
        }        
    }
}
