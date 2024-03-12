<?php

namespace App\Exports;

use App\Models\PurchaseDetail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SubscriberUserDataExport implements FromView
{
    public function view() : View
    {
        $subscribers = PurchaseDetail::where('unsubscribed', 0)->with('Subscriber')->latest()->get();
        return view('backend.pages.user.excel.subscriber_excel', [
            'subscribers'=>$subscribers
        ]);
    }
}
