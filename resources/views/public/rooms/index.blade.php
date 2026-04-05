<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phong trong</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #f4f6f8; color: #1f2937; }
        .shell { width: min(1100px, calc(100% - 32px)); margin: 0 auto; padding: 32px 0; }
        .header { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 24px; }
        .grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 16px; }
        .card { background: #fff; border: 1px solid #d6dde6; border-radius: 16px; padding: 20px; }
        .contact { margin-top: 24px; }
        .actions a { display: inline-block; padding: 10px 14px; border-radius: 10px; background: #1d4ed8; color: #fff; text-decoration: none; }
        @media (max-width: 900px) { .grid { grid-template-columns: 1fr; } .header { flex-direction: column; align-items: start; } }
    </style>
</head>
<body>
    <div class="shell">
        <div class="header">
            <div>
                <h1>Danh sach phong trong</h1>
                <p>Cac phong co the xem va lien he.</p>
            </div>
            <div class="actions">
                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('motel.dashboard') : route('public.rooms.index') }}">Trang cua toi</a>
                @else
                    <a href="{{ route('login') }}">Dang nhap</a>
                @endauth
            </div>
        </div>

        <div class="grid">
            @forelse ($rooms as $room)
                <div class="card">
                    <h2>{{ $room->name }}</h2>
                    <p>Gia: {{ number_format($room->price, 0, ',', '.') }}</p>
                    <p>Suc chua: {{ $room->capacity }}</p>
                    <p>Trang thai: {{ $room->status }}</p>
                </div>
            @empty
                <div class="card">Khong co phong trong.</div>
            @endforelse
        </div>

        <div class="card contact">
            <h2>Thong tin lien he</h2>
            <p>So dien thoai: 0900 123 456</p>
            <p>Email: nhatro@example.com</p>
            <p>Dia chi: Thai Nguyen</p>
        </div>
    </div>
</body>
</html>
