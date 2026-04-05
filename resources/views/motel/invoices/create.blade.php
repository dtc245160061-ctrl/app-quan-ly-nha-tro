@extends('motel.layout')

@section('title', 'Create Invoice')

@section('content')
    <div class="header">
        <div>
            <h1>Tao Invoice</h1>
            <div class="muted">Invoice duoc tao tu contract</div>
        </div>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('motel.invoices.store') }}">
            @csrf
            <div class="grid">
                <div class="field">
                    <label>Contract</label>
                    <select name="contract_id">
                        <option value="">Chon contract</option>
                        @foreach ($contracts as $contract)
                            <option value="{{ $contract->id }}" @selected(old('contract_id', optional($selectedContract)->id) == $contract->id)>
                                #{{ $contract->id }} - {{ $contract->room->name }} - {{ $contract->tenant->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Ngay lap</label>
                    <input type="date" name="issued_date" value="{{ old('issued_date', now()->toDateString()) }}">
                </div>
                <div class="field">
                    <label>So tien</label>
                    <input type="number" step="0.01" name="amount" value="{{ old('amount') }}">
                </div>
                <div class="field">
                    <label>Trang thai</label>
                    <select name="status">
                        <option value="unpaid">unpaid</option>
                        <option value="paid">paid</option>
                    </select>
                </div>
            </div>
            <div class="actions" style="margin-top: 16px;">
                <button type="submit">Luu</button>
            </div>
        </form>
    </div>
@endsection
