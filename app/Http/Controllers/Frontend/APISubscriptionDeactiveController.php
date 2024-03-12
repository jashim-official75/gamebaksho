<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PurchaseDetail;
use Illuminate\Http\Request;

class APISubscriptionDeactiveController extends Controller
{
    public function deactive(Request $request){
        $data = $request->all();
        $acr = $data['deactivatedSubscriptions'][0]['acr'];
        $subscriberDetails = PurchaseDetail::where('customer_reference', $acr)->latest()->first();

        if($subscriberDetails){
            $subscriberDetails->end_time = now()->setTimezone("Asia/Dhaka")->timestamp;
            $subscriberDetails->unsubscribed = 1;
            if($subscriberDetails->update()){
                $sendData = [
                    'status' => 'success',
                    'acr' => $acr
                ];
                
                return json_encode($sendData);
            }
        }
        $sendData = [
            'status' => 'error',
        ];
        
        return json_encode($sendData);

    }
}
