<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionProcessController extends Controller
{
    public function processSubscription(Request $request, $plan)
    {
        return "Subscription Process";
    }
}
