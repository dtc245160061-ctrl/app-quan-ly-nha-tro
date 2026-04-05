@extends('motel.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="header">
        <div>
            <h1>Dashboard</h1>
            <div class="muted">Tong quan nha tro</div>
        </div>
    </div>

    <div class="grid">
        <div class="card">
            <h2>{{ $totalRooms }}</h2>
            <div class="muted">Tong so phong</div>
        </div>
        <div class="card">
            <h2>{{ $occupiedRooms }}</h2>
            <div class="muted">Phong dang co nguoi o</div>
        </div>
        <div class="card">
            <h2>{{ $totalTenants }}</h2>
            <div class="muted">Tong khach thue</div>
        </div>
        <div class="card">
            <h2>{{ number_format($monthlyRevenue, 0, ',', '.') }}</h2>
            <div class="muted">Doanh thu thang nay</div>
        </div>
    </div>

    <div class="card">
        <h2>Contract active gan day</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Phong</th>
                    <th>Khach</th>
                    <th>Ngay thue</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($activeContracts as $contract)
                    <tr>
                        <td>{{ $contract->id }}</td>
                        <td>{{ $contract->room->name }}</td>
                        <td>{{ $contract->tenant->name }}</td>
                        <td>{{ optional($contract->start_date)->format('Y-m-d') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Chua co contract active.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
