<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\User;

class CheckoutController extends Controller
{

    public function charge(Request $request)
    {
        try {
            Stripe::setApiKey("sk_test_m2d8Glgfl1bDUp1nOhrXMLfN");
            $user = User::find(2);

            $charge = Charge::create(array(
                'customer' => $user->stripe_id,
                'amount' => 1999,
                'currency' => 'usd'
            ));

            return 'Charge successful, you get the course!';
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function subscribe_process(Request $request)
    {

            Stripe::setApiKey("sk_test_m2d8Glgfl1bDUp1nOhrXMLfN");

            $user = User::find(3);
            $user->newSubscription('WeWash', 'Gold')->create("tok_visa");

            return 'Subscription successful, you get the course!';


    }


}
