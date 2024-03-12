<?php

namespace App\Exports;

use App\Models\PurchaseDetail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UnsubscriberUserDataExport implements FromView
{
    public function view() : View
    {
        $unsubscribers = PurchaseDetail::where('unsubscribed', 1)->with('Subscriber')->latest()->get();
        return view('backend.pages.user.excel.unsub_excel', [
            'unsubscribers'=>$unsubscribers
        ]);
    }
}
