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
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->input('total')*100,
                "currency" => "egp",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);
        return redirect('/')->with('status','Payment has been successfully processed.');
    }
}
