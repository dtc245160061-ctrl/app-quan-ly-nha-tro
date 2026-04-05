@extends('motel.layout')

@section('title', 'Tenant')

@section('content')
    <div class="header">
        <div>
            <h1>Tenant</h1>
            <div class="muted">CRUD khach thue</div>
        </div>
        <a class="button" href="{{ route('motel.tenants.create') }}">Them khach</a>
    </div>

    <div class="card">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ten</th>
                    <th>So dien thoai</th>
                    <th>Email</th>
                    <th>CCCD</th>
                    <th>Thao tac</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tenants as $tenant)
                    <tr>
                        <td>{{ $tenant->id }}</td>
                        <td>{{ $tenant->name }}</td>
                        <td>{{ $tenant->phone }}</td>
                        <td>{{ $tenant->email }}</td>
                        <td>{{ $tenant->id_card }}</td>
                        <td>
                            <div class="actions">
                                <a class="button secondary" href="{{ route('motel.tenants.edit', $tenant) }}">Sua</a>
                                <form method="POST" action="{{ route('motel.tenants.destroy', $tenant) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button danger" type="submit">Xoa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Chua co khach thue.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
