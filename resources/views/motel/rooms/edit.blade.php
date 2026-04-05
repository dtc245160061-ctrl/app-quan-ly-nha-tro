@extends('motel.layout')

@section('title', 'Edit Room')

@section('content')
    <div class="header">
        <div>
            <h1>Sua Room</h1>
            <div class="muted">Cap nhat thong tin phong</div>
        </div>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('motel.rooms.update', $room) }}">
            @csrf
            @method('PUT')
            <div class="grid">
                <div class="field">
                    <label>Ten phong</label>
                    <input type="text" name="name" value="{{ old('name', $room->name) }}">
                </div>
                <div class="field">
                    <label>Gia</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $room->price) }}">
                </div>
                <div class="field">
                    <label>Suc chua</label>
                    <input type="number" name="capacity" value="{{ old('capacity', $room->capacity) }}">
                </div>
                <div class="field">
                    <label>Trang thai</label>
                    <select name="status">
                        @foreach (['available', 'occupied', 'maintenance'] as $status)
                            <option value="{{ $status }}" @selected(old('status', $room->status) === $status)>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="actions" style="margin-top: 16px;">
                <button type="submit">Luu</button>
            </div>
        </form>
    </div>
@endsection
