<?php

namespace App\Services;

class PaymentServiceFacade  extends Facade
{

	/**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'PaymentService';
    }
}