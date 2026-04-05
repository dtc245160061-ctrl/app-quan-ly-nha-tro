<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chi tiet phong</title>
    <style>
        body { margin: 0; font-family: Georgia, "Times New Roman", serif; background: #f6f3ee; color: #1d1d1b; }
        .shell { width: min(920px, calc(100% - 32px)); margin: 0 auto; padding: 28px 0 48px; }
        .back { display: inline-block; margin-bottom: 20px; color: #8d451f; text-decoration: none; font-weight: 700; }
        .card { background: #fffdf8; border: 1px solid #e7dccb; border-radius: 28px; padding: 32px; box-shadow: 0 18px 40px rgba(67, 43, 18, 0.08); }
        h1 { margin: 0 0 8px; font-size: 44px; }
        .muted { color: #6f695d; }
        .grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 18px; margin-top: 24px; }
        .item { padding: 18px; border-radius: 18px; background: #f8f2e9; }
        .item strong { display: block; margin-bottom: 6px; }
        .cta { margin-top: 24px; padding: 20px; border-radius: 20px; background: #b65a2a; color: #fff; }
        @media (max-width: 720px) { .grid { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    <div class="shell">
        <a class="back" href="{{ route('public.home') }}">&larr; Quay lai danh sach phong</a>
        <div class="card">
            <p class="muted">Phong {{ $room->room_id }}</p>
            <h1>{{ $room->room_name }}</h1>
            <p class="muted">Chi tiet phong trong he thong quan ly nha tro.</p>
            <div class="grid">
                <div class="item">
                    <strong>Loai phong</strong>
                    <span>{{ optional($room->roomType)->room_type_name ?? 'Chua phan loai' }}</span>
                </div>
                <div class="item">
                    <strong>Gia thue</strong>
                    <span>{{ number_format(optional($room->roomType)->room_type_price ?? 0, 0, ',', '.') }} VND / thang</span>
                </div>
                <div class="item">
                    <strong>Suc chua</strong>
                    <span>{{ $room->quantity }}/{{ $room->occupancy }} nguoi</span>
                </div>
                <div class="item">
                    <strong>Trang thai</strong>
                    <span>{{ ucfirst($room->status) }}</span>
                </div>
            </div>
            <div class="cta">
                <strong>Lien he dat phong</strong>
                <div>So dien thoai: 0900 123 456</div>
                <div>Email: nhatrok23@example.com</div>
            </div>
        </div>
    </div>
</body>
</html>
