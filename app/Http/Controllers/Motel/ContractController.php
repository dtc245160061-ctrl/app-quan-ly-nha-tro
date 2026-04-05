<?php

namespace App\Http\Controllers\Motel;

use App\Http\Controllers\Controller;
use App\Models\Motel\Contract;
use App\Models\Motel\Room;
use App\Models\Motel\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ContractController extends Controller
{
    public function index(): View
    {
        return view('motel.contracts.index', [
            'contracts' => Contract::with(['room', 'tenant', 'invoices'])->orderBy('id', 'desc')->get(),
        ]);
    }

    public function create(): View
    {
        return view('motel.contracts.create', [
            'rooms' => Room::orderBy('name')->get(),
            'tenants' => Tenant::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'room_id' => ['required', 'exists:motel_rooms,id'],
            'tenant_id' => ['required', 'exists:motel_tenants,id'],
            'start_date' => ['required', 'date'],
        ]);

        $hasActiveContract = Contract::active()->where('room_id', $data['room_id'])->exists();

        if ($hasActiveContract) {
            throw ValidationException::withMessages([
                'room_id' => 'Phong nay da co contract active.',
            ]);
        }

        Contract::create([
            'room_id' => $data['room_id'],
            'tenant_id' => $data['tenant_id'],
            'start_date' => $data['start_date'],
            'status' => 'active',
        ]);

        Room::whereKey($data['room_id'])->update(['status' => 'occupied']);

        return redirect()->route('motel.contracts.index')->with('success', 'Tao contract thanh cong.');
    }

    public function checkout(Contract $contract): RedirectResponse
    {
        $contract->update([
            'status' => 'ended',
            'end_date' => now()->toDateString(),
        ]);

        $contract->room()->update(['status' => 'available']);

        return redirect()->route('motel.contracts.index')->with('success', 'Tra phong thanh cong.');
    }
}
