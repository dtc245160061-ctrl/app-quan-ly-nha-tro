<?php

namespace App\Http\Controllers\Motel;

use App\Http\Controllers\Controller;
use App\Models\Motel\Contract;
use App\Models\Motel\Invoice;
use App\Models\Motel\Room;
use App\Models\Motel\Tenant;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('motel.dashboard', [
            'totalRooms' => Room::count(),
            'occupiedRooms' => Room::where('status', 'occupied')->count(),
            'totalTenants' => Tenant::count(),
            'monthlyRevenue' => Invoice::whereYear('issued_date', now()->year)
                ->whereMonth('issued_date', now()->month)
                ->sum('amount'),
            'activeContracts' => Contract::with(['room', 'tenant'])->active()->latest()->take(10)->get(),
        ]);
    }
}
