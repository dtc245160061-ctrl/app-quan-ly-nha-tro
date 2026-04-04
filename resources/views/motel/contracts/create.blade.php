@extends('motel.layout')

@section('title', 'Create Contract')

@section('content')
    <div class="header">
        <div>
            <h1>Tao Contract</h1>
            <div class="muted">Chon phong, chon khach, ngay thue</div>
        </div>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('motel.contracts.store') }}">
            @csrf
            <div class="grid">
                <div class="field">
                    <label>Phong</label>
                    <select name="room_id">
                        <option value="">Chon phong</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}" @selected(old('room_id') == $room->id)>{{ $room->name }} - {{ $room->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Khach thue</label>
                    <select name="tenant_id">
                        <option value="">Chon khach</option>
                        @foreach ($tenants as $tenant)
                            <option value="{{ $tenant->id }}" @selected(old('tenant_id') == $tenant->id)>{{ $tenant->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="field">
                    <label>Ngay thue</label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}">
                </div>
            </div>
            <div class="actions" style="margin-top: 16px;">
                <button type="submit">Luu</button>
            </div>
        </form>
    </div>
@endsection
