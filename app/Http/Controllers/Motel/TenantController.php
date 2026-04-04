<?php

namespace App\Http\Controllers\Motel;

use App\Http\Controllers\Controller;
use App\Models\Motel\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TenantController extends Controller
{
    public function index(): View
    {
        return view('motel.tenants.index', [
            'tenants' => Tenant::orderBy('id', 'desc')->get(),
        ]);
    }

    public function create(): View
    {
        return view('motel.tenants.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'id_card' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);

        Tenant::create($data);

        return redirect()->route('motel.tenants.index')->with('success', 'Tao khach thue thanh cong.');
    }

    public function edit(Tenant $tenant): View
    {
        return view('motel.tenants.edit', [
            'tenant' => $tenant,
        ]);
    }

    public function update(Request $request, Tenant $tenant): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'id_card' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);

        $tenant->update($data);

        return redirect()->route('motel.tenants.index')->with('success', 'Cap nhat khach thue thanh cong.');
    }

    public function destroy(Tenant $tenant): RedirectResponse
    {
        $tenant->delete();

        return redirect()->route('motel.tenants.index')->with('success', 'Xoa khach thue thanh cong.');
    }
}
