@extends('motel.layout')

@section('title', 'Create Room')

@section('content')
    <div class="header">
        <div>
            <h1>Tao Room</h1>
            <div class="muted">Nhap thong tin phong</div>
        </div>
    </div>

    <div class="card">
        <form method="POST" action="{{ route('motel.rooms.store') }}">
            @csrf
            <div class="grid">
                <div class="field">
                    <label>Ten phong</label>
                    <input type="text" name="name" value="{{ old('name') }}">
                </div>
                <div class="field">
                    <label>Gia</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}">
                </div>
                <div class="field">
                    <label>Suc chua</label>
                    <input type="number" name="capacity" value="{{ old('capacity', 1) }}">
                </div>
                <div class="field">
                    <label>Trang thai</label>
                    <select name="status">
                        <option value="available">available</option>
                        <option value="occupied">occupied</option>
                        <option value="maintenance">maintenance</option>
                    </select>
                </div>
            </div>
            <div class="actions" style="margin-top: 16px;">
                <button type="submit">Luu</button>
            </div>
        </form>
    </div>
@endsection
