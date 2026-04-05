<?php

namespace App\Http\Controllers\Motel;

use App\Http\Controllers\Controller;
use App\Models\Motel\Invoice;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RevenueController extends Controller
{
    public function index(Request $request): View
    {
        $month = (int) $request->input('month', now()->month);
        $year = (int) $request->input('year', now()->year);

        $invoices = Invoice::with(['contract.room', 'contract.tenant'])
            ->whereYear('issued_date', $year)
            ->whereMonth('issued_date', $month)
            ->orderByDesc('issued_date')
            ->get();

        return view('motel.revenue.index', [
            'month' => $month,
            'year' => $year,
            'invoices' => $invoices,
            'totalRevenue' => $invoices->sum('amount'),
        ]);
    }
}
