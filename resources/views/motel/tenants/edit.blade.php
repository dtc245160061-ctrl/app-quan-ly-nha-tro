@extends('motel.layout')

@section('title', 'Edit Tenant')

@section('content')
    <div class="header">
        <div>
            <h1>Sua Tenant</h1>
            <div class="muted">Cap nhat khach thue</div>
        </div>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('motel.tenants.update', $tenant) }}">
            @csrf
            @method('PUT')
            <div class="grid">
                <div class="field">
                    <label>Ten</label>
                    <input type="text" name="name" value="{{ old('name', $tenant->name) }}">
                </div>
                <div class="field">
                    <label>So dien thoai</label>
                    <input type="text" name="phone" value="{{ old('phone', $tenant->phone) }}">
                </div>
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', $tenant->email) }}">
                </div>
                <div class="field">
                    <label>CCCD</label>
                    <input type="text" name="id_card" value="{{ old('id_card', $tenant->id_card) }}">
                </div>
                <div class="field" style="grid-column: 1 / -1;">
                    <label>Dia chi</label>
                    <textarea name="address">{{ old('address', $tenant->address) }}</textarea>
                </div>
            </div>
            <div class="actions" style="margin-top: 16px;">
                <button type="submit">Luu</button>
            </div>
        </form>
    </div>
@endsection
