@extends('motel.layout')

@section('title', 'Contract')

@section('content')
    <div class="header">
        <div>
            <h1>Contract</h1>
            <div class="muted">Tao contract va tra phong</div>
        </div>
        <a class="button" href="{{ route('motel.contracts.create') }}">Tao contract</a>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Phong</th>
                    <th>Khach</th>
                    <th>Ngay thue</th>
                    <th>Ngay ket thuc</th>
                    <th>Trang thai</th>
                    <th>Invoice</th>
                    <th>Thao tac</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contracts as $contract)
                    <tr>
                        <td>{{ $contract->id }}</td>
                        <td>{{ $contract->room->name }}</td>
                        <td>{{ $contract->tenant->name }}</td>
                        <td>{{ optional($contract->start_date)->format('Y-m-d') }}</td>
                        <td>{{ optional($contract->end_date)->format('Y-m-d') }}</td>
                        <td>{{ $contract->status }}</td>
                        <td>{{ $contract->invoices->count() }}</td>
                        <td>
                            <div class="actions">
                                @if ($contract->status === 'active')
                                    <a class="button secondary" href="{{ route('motel.invoices.create', $contract) }}">Tao invoice</a>
                                    <form method="POST" action="{{ route('motel.contracts.checkout', $contract) }}">
                                        @csrf
                                        <button type="submit">Tra phong</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Chua co contract.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
