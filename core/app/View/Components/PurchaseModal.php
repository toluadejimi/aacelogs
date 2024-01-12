<?php

namespace App\View\Components;

use App\Constants\Status;
use App\Models\WalletCurrency;
use Illuminate\View\Component;
use App\Models\GatewayCurrency;

class PurchaseModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $gatewayCurrency = WalletCurrency::whereHas('method', function ($gate) {
            $gate->where('status', Status::ENABLE);
        })->with('method')->orderby('method_code')->get();

        return view('components.purchase-modal', compact('gatewayCurrency'));
    }
}
