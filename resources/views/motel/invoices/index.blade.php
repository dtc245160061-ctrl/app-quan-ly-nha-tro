@extends('motel.layout')

@section('title', 'Invoice')

@section('content')
    <div class="header">
        <div>
            <h1>Invoice</h1>
            <div class="muted">Invoice phai thuoc contract</div>
        </div>
        <a class="button" href="{{ route('motel.invoices.create') }}">Tao invoice</a>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Contract</th>
                    <th>Phong</th>
                    <th>Khach</th>
                    <th>Ngay lap</th>
                    <th>So tien</th>
                    <th>Trang thai</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>#{{ $invoice->contract->id }}</td>
                        <td>{{ $invoice->contract->room->name }}</td>
                        <td>{{ $invoice->contract->tenant->name }}</td>
                        <td>{{ optional($invoice->issued_date)->format('Y-m-d') }}</td>
                        <td>{{ number_format($invoice->amount, 0, ',', '.') }}</td>
                        <td>{{ $invoice->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Chua co invoice.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
