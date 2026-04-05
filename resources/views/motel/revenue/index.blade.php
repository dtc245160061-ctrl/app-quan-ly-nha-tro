@extends('motel.layout')

@section('title', 'Revenue')

@section('content')
    <div class="header">
        <div>
            <h1>Doanh thu</h1>
            <div class="muted">Xem doanh thu theo thang va nam</div>
        </div>
    </div>

    <div class="card">
        <form method="GET" action="{{ route('motel.revenue.index') }}">
            <div class="grid">
                <div class="field">
                    <label>Thang</label>
                    <input type="number" min="1" max="12" name="month" value="{{ $month }}">
                </div>
                <div class="field">
                    <label>Nam</label>
                    <input type="number" min="2000" max="3000" name="year" value="{{ $year }}">
                </div>
            </div>
            <div class="actions" style="margin-top: 16px;">
                <button type="submit">Xem</button>
            </div>
        </form>
    </div>

    <div class="card">
        <h2>Tong doanh thu: {{ number_format($totalRevenue, 0, ',', '.') }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Ngay lap</th>
                    <th>Contract</th>
                    <th>Phong</th>
                    <th>Khach</th>
                    <th>So tien</th>
                    <th>Trang thai</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($invoices as $invoice)
                    <tr>
                        <td>{{ optional($invoice->issued_date)->format('Y-m-d') }}</td>
                        <td>#{{ $invoice->contract->id }}</td>
                        <td>{{ $invoice->contract->room->name }}</td>
                        <td>{{ $invoice->contract->tenant->name }}</td>
                        <td>{{ number_format($invoice->amount, 0, ',', '.') }}</td>
                        <td>{{ $invoice->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Khong co du lieu doanh thu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
