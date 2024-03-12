<?php

namespace App\Exports;

use App\Models\Subscriber;
use App\Models\PurchaseDetail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NotSubscriberUserDataExport implements FromView, ShouldAutoSize
{
use Exportable;
    public function view(): View
    {
        $nosubscribeusers = Subscriber::whereNotIn('id', function ($query) {
            $query->select('subscriber_id')
                  ->from('purchase_details');
        })->get();
        return view('backend.pages.user.excel.no_sub_excel', [
            'nosubscribeusers' => $nosubscribeusers
        ]);
    }
}
