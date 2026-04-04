@extends('motel.layout')

@section('title', 'Room')

@section('content')
    <div class="header">
        <div>
            <h1>Room</h1>
            <div class="muted">CRUD phong</div>
        </div>
        <a class="button" href="{{ route('motel.rooms.create') }}">Them phong</a>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ten phong</th>
                    <th>Gia</th>
                    <th>Suc chua</th>
                    <th>Trang thai</th>
                    <th>Thao tac</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ number_format($room->price, 0, ',', '.') }}</td>
                        <td>{{ $room->capacity }}</td>
                        <td>{{ $room->status }}</td>
                        <td>
                            <div class="actions">
                                <a class="button secondary" href="{{ route('motel.rooms.edit', $room) }}">Sua</a>
                                <form method="POST" action="{{ route('motel.rooms.destroy', $room) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button danger" type="submit">Xoa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Chua co phong.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
