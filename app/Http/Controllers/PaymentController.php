<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
 
class PaymentController extends Controller
{
    public $gateway;
    public $completePaymentUrl;
 
    public function __construct()
    {
        $this->gateway = Omnipay::create('Stripe\PaymentIntents');
        $this->gateway->setApiKey('sk_test_2RXreohy8sNIrd2jJMgp4woo');
        $this->completePaymentUrl = url('confirm');
    }
 
    public function index()
    {
        return view('payment');
    }
 
    public function charge(Request $request)
    {
        if($request->input('stripeToken'))
        {
            $token = $request->input('stripeToken');
 
            $response = $this->gateway->authorize([
                'amount' => $request->input('amount'),
                'currency' => 'usd',
                'description' => 'This is a X purchase transaction.',
                'token' => $token,
                'returnUrl' => $this->completePaymentUrl,
                'confirm' => true,
            ])->send();
 
            if($response->isSuccessful())
            {
                $response = $this->gateway->capture([
                    'amount' => $request->input('amount'),
                    'currency' => 'usd',
                    'paymentIntentReference' => $response->getPaymentIntentReference(),
                ])->send();
 
                $arr_payment_data = $response->getData();
 
                
 
                return redirect("payment")->with("success", "Payment is successful with simple card. Your payment id is: ". $arr_payment_data['id']);
            }
            elseif($response->isRedirect())
            {
                session(['payer_email' => $request->input('email')]);
                $response->redirect();
            }
            else
            {
                return redirect("payment")->with("error", $response->getMessage());
            }
        }
    }
 
    public function confirm(Request $request)
    {
        $response = $this->gateway->confirm([
            'paymentIntentReference' => $request->input('payment_intent'),
            'returnUrl' => $this->completePaymentUrl,
        ])->send();
         
        if($response->isSuccessful())
        {
            $response = $this->gateway->capture([
                'amount' => $request->input('amount'),
                'currency' => 'usd',
                'paymentIntentReference' => $request->input('payment_intent'),
            ])->send();
 
            $arr_payment_data = $response->getData();
 
            
 
            return redirect("payment")->with("success", "Payment is successful with 3d card. Your payment id is: ". $arr_payment_data['id']);
        }
        else
        {
            return redirect("payment")->with("error", $response->getMessage());
        }
    }
 
    
}