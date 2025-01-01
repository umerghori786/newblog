<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;

class PaymentServiceCotroller extends Controller
{   
    protected $service;
    public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        
        //$service = (new PaymentService())->doPayment();
        //$this->service->doPayment();  
        app('PaymentService')->doPayment();

        /*using facade*/
        //PaymentService::doPayment();
    }
}
