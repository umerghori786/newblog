<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stripe\StripePlan;
use App\Models\User;
use Carbon\Carbon;
use App\Models\StripeEmail;
use App\Notifications\RemainderSubscription;

class SubscriptionController extends Controller
{
    public function index() {

        $stripe = new \Stripe\StripeClient(
          'sk_test_51IiCdWKVTXdRaMhE6DT6sxet32tliKIrWJKjTunIFIPXudNNiN9SgzmvI63hHGySkb2LXDhfA85g25IWfIfiRR3f00SPYwEbdu'
        );

        
        /*$user_subscriptions = User::whereNotNull('stripe_id')->get();
        if($user_subscriptions->count() > 0){
            foreach ($user_subscriptions as $key => $user) {
                $current_period_end = $user->subscription()->asStripeSubscription()->current_period_end;
                $current_period_end = Carbon::createFromTimeStamp($current_period_end);
                $date = $current_period_end->toFormattedDateString();
                $target_date = $current_period_end->subDays(28)->toFormattedDateString();
                //dd($target_date);
                //check email send only one time in one month
                $check = StripeEmail::where([
                    ['user_id',$user->id],
                    ['remainder_date',$target_date],
                ])->first();
                if ($target_date == Carbon::now()->toFormattedDateString() && is_null($check)) {

                    StripeEmail::create(['user_id'=>$user->id,'remainder_date'=> $target_date]);
                    //here logic of sending email
                    $user->notify(new RemainderSubscription($date));
                }
            }
        }*/
        

        //dd(auth()->user()->subscription('default'));
        //dd(auth()->user()->subscribed('default')->active());
        //dd(auth()->user()->upcomingInvoice());
        //dd(auth()->user()->subscribed('default'));
        //dd(auth()->user()->subscription());
        /*$current_period_end = auth()->user()->subscription()->asStripeSubscription();
        dd($current_period_end);
        dd(Carbon::createFromTimeStamp($current_period_end)->toFormattedDateString());

        if(auth()->user()->subscribed('default') && auth()->user()->subscriptions()->active()->first()){
             $stripe_plan = StripePlan::where('plan_id',auth()->user()->subscriptions()->active()->first()->stripe_price)->first()->name;
             if($stripe_plan == "abc"){
                $check_subscription_status = FALSE;
             }else{
                $check_subscription_status = TRUE;
             }
         }

         dd($check_subscription_status);
         */

        /*to cancel subscription*/
        //dd(auth()->user()->subscription('default')->cancel());
        /*end*/

        /*these below are importan for cancelation subscription*/

        //dd(auth()->user()->subscription('default')->canceled());
        //dd(auth()->user()->subscription('default')->onGracePeriod());
        //dd(auth()->user()->subscription('default')->ended());
        //dd(auth()->user()->invoices());
        //dd($stripe->products->all());
        $user = User::where('email','kabirumer@gmail.com')->first();
        dd($user->subscription('default')->active());
        dd($stripe->customers->all());

        /*end*/



       /* $current_period_end = auth()->user()->subscription()->asStripeSubscription()->current_period_end;
        $current_period_end = Carbon::createFromTimeStamp($current_period_end);
        $date = $current_period_end->toFormattedDateString();
        $target_date = $current_period_end->subDays(28)->toFormattedDateString();*/
        $plans = StripePlan::get();

        return view('subscriptions.plans', compact('plans'));
    }
}
