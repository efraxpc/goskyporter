<?php

namespace App\Exports;

use App\Customer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CustomersExport implements FromView
{
    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
    public function view(): View
    {
        $customers = Customer::select([
            'customers.id',
            'customers.first_name',
            'customers.last_name',
            'customers.indian_number',
            'customers.email',
            'customers.created_at',
        ])
            ->whereBetween('customers.created_at', [$this->from, $this->to])
            ->orderBy('id')
            ->groupBy('customers.id')
            ->get();

        return view('exports.customers', [
            'customers' => $customers
        ]);
    }
}
