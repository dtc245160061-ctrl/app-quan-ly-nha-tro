<?php

namespace App\Http\Controllers\Motel;

use App\Http\Controllers\Controller;
use App\Models\Motel\Contract;
use App\Models\Motel\Invoice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(): View
    {
        return view('motel.invoices.index', [
            'invoices' => Invoice::with(['contract.room', 'contract.tenant'])->orderBy('id', 'desc')->get(),
        ]);
    }

    public function create(?Contract $contract = null): View
    {
        return view('motel.invoices.create', [
            'contracts' => Contract::active()->with(['room', 'tenant'])->orderBy('id', 'desc')->get(),
            'selectedContract' => $contract?->load(['room', 'tenant']),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'contract_id' => ['required', 'exists:motel_contracts,id'],
            'issued_date' => ['required', 'date'],
            'amount' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'in:unpaid,paid'],
        ]);

        Invoice::create($data);

        return redirect()->route('motel.invoices.index')->with('success', 'Tao invoice thanh cong.');
    }
}
