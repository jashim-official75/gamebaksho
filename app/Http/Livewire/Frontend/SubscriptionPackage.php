<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SubscriptionPackage extends Component
{
    public function daily()
    {
        dd("Daily Package");
    }

    public function weekly()
    {
        dd("Weekly Package");
    }

    public function monthly()
    {
        dd("Monthly Package");
    }



    public function render(Request $request)
    {
        return view('livewire.frontend.subscription-package');
    }
}
