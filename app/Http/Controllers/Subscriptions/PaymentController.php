<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stripe\StripePlan;


class PaymentController extends Controller
{
    public function index() {
        $data = [
            'intent' => auth()->user()->createSetupIntent()
        ];

        return view('subscriptions.payment')->with($data);
    }

    public function store(Request $request) {

         $this->validate($request, [
            'paymentMethod' => 'required'
        ]);
         /*coupons*/
        $stripe = new \Stripe\StripeClient(
          'sk_test_51IiCdWKVTXdRaMhE6DT6sxet32tliKIrWJKjTunIFIPXudNNiN9SgzmvI63hHGySkb2LXDhfA85g25IWfIfiRR3f00SPYwEbdu'
        );


        /*$array = $stripe->coupons->all()['data'];
        $valid = '';
        $c = 'friend20';
        if(count($array) > 0){
        foreach ($array as $key => $value) {
            if($c == $value['name'] && $value['valid'] == true){
                $valid =  $value['id'];
            }

        }
        }*/
        //dd($valid);
        //$apply = array_filter($valid, function($v) { return !is_null($v); });
        /*end*/
        $plan = StripePlan::where('plan_id', 'plan_JyzUQ7KSrVbSrY')
            ->first();
        $paymentMethod =    $request->paymentMethod;
        $request->user()->newSubscription('default', $plan->plan_id)
        ->create($paymentMethod);

        return redirect('/');

    }
}

