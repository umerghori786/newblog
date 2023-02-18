<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class ProductObserver
{


    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function creating(Product $product)
    {   
        $user = User::where('email','umerfayyaz500@gmail.com')->select('id','name','email')->first()->toArray();
        $action = "product created";
        $array = [
            'model' => get_class($product),
            'user' => $user,
            'action'=>$action,
            'current_state' => $product->toArray()
        ];
        $serialized = serialize($array);
        Log::channel('globalModel_tracking')->info($serialized);


        
        $product->slug = Str::snake($product->name);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function updated(Product $product)
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        $product->comments()->delete();
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
