<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quan ly nha tro</title>
    <style>
        :root {
            --bg: #f6f3ee;
            --card: #fffdf8;
            --ink: #1d1d1b;
            --muted: #6f695d;
            --accent: #b65a2a;
            --accent-dark: #8d451f;
            --line: #e7dccb;
            --good: #2f7d4a;
            --warn: #b6922e;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Georgia, "Times New Roman", serif;
            background:
                radial-gradient(circle at top left, rgba(182, 90, 42, 0.12), transparent 25%),
                linear-gradient(180deg, #f4ede3 0%, var(--bg) 60%, #efe8dc 100%);
            color: var(--ink);
        }
        a { color: inherit; text-decoration: none; }
        .shell { width: min(1120px, calc(100% - 32px)); margin: 0 auto; }
        .topbar {
            display: flex; justify-content: space-between; align-items: center; padding: 24px 0;
        }
        .brand { font-size: 28px; font-weight: 700; letter-spacing: 0.03em; }
        .brand small {
            display: block; color: var(--muted); font-size: 13px; font-weight: 400; letter-spacing: 0.08em; text-transform: uppercase;
        }
        .actions { display: flex; gap: 12px; flex-wrap: wrap; }
        .button, .button-outline {
            display: inline-flex; align-items: center; justify-content: center; padding: 12px 18px; border-radius: 999px; font-size: 14px; font-weight: 700; transition: 0.2s ease;
        }
        .button { background: var(--accent); color: #fff; }
        .button:hover { background: var(--accent-dark); }
        .button-outline { border: 1px solid var(--line); background: rgba(255, 255, 255, 0.7); }
        .hero { display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 24px; padding: 20px 0 36px; }
        .hero-card, .stats-card, .room-card, .contact-card {
            background: var(--card); border: 1px solid var(--line); border-radius: 28px; box-shadow: 0 18px 40px rgba(67, 43, 18, 0.08);
        }
        .hero-card { padding: 36px; }
        .eyebrow { color: var(--accent); text-transform: uppercase; font-size: 12px; letter-spacing: 0.16em; margin-bottom: 14px; }
        .hero-card h1 { margin: 0; font-size: clamp(36px, 6vw, 64px); line-height: 0.98; }
        .hero-card p { margin: 18px 0 0; max-width: 640px; color: var(--muted); font-size: 18px; line-height: 1.7; }
        .stats-card { padding: 28px; display: grid; gap: 16px; align-content: start; }
        .stat { padding-bottom: 16px; border-bottom: 1px solid var(--line); }
        .stat:last-child { border-bottom: 0; padding-bottom: 0; }
        .stat strong { display: block; font-size: 34px; }
        .section-title { display: flex; justify-content: space-between; align-items: end; gap: 16px; margin: 24px 0 18px; }
        .section-title h2 { margin: 0; font-size: 30px; }
        .section-title p { margin: 0; color: var(--muted); }
        .room-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; }
        .room-card { padding: 22px; }
        .room-top { display: flex; justify-content: space-between; gap: 16px; align-items: start; }
        .room-card h3 { margin: 0; font-size: 24px; }
        .muted { color: var(--muted); }
        .badge { padding: 8px 12px; border-radius: 999px; font-size: 12px; font-weight: 700; white-space: nowrap; }
        .badge-good { background: rgba(47, 125, 74, 0.12); color: var(--good); }
        .badge-warn { background: rgba(182, 146, 46, 0.12); color: var(--warn); }
        .meta { display: grid; gap: 10px; margin: 20px 0; color: var(--muted); }
        .meta span { display: flex; justify-content: space-between; gap: 12px; }
        .room-footer { display: flex; justify-content: space-between; align-items: center; gap: 12px; }
        .price { font-size: 26px; font-weight: 700; color: var(--accent-dark); }
        .contact-card { margin: 24px 0 48px; padding: 28px; display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 18px; }
        .contact-item h3 { margin: 0 0 8px; font-size: 18px; }
        .contact-item p { margin: 0; color: var(--muted); line-height: 1.7; }
        @media (max-width: 900px) {
            .hero, .contact-card, .room-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="shell">
        <header class="topbar">
            <div class="brand">
                Nha Tro K23
                <small>Quan ly phong tro tren web</small>
            </div>
            <div class="actions">
                <a class="button-outline" href="#phong-trong">Xem phong trong</a>
                <a class="button" href="{{ route('auth.admin') }}">Dang nhap quan ly</a>
            </div>
        </header>

        <section class="hero">
            <div class="hero-card">
                <div class="eyebrow">He thong quan ly nha tro</div>
                <h1>Tim phong nhanh. Quan ly de. Nop bai on.</h1>
                <p>Ban web nay gom 2 phan ro rang: trang xem phong cho khach thue va trang quan ly cho chu tro. Ban MVP tap trung vao phong, khach thue, hop dong, hoa don va doanh thu.</p>
            </div>

            <aside class="stats-card">
                <div class="stat">
                    <span class="muted">Tong so phong</span>
                    <strong>{{ $rooms->count() }}</strong>
                </div>
                <div class="stat">
                    <span class="muted">Phong dang cho thue</span>
                    <strong>{{ $availableRooms->count() }}</strong>
                </div>
                <div class="stat">
                    <span class="muted">Lien he nhanh</span>
                    <strong>24/7</strong>
                </div>
            </aside>
        </section>

        <section id="phong-trong">
            <div class="section-title">
                <div>
                    <h2>Danh sach phong</h2>
                    <p>Hien thi cac phong dang hoat dong trong he thong.</p>
                </div>
            </div>

            <div class="room-grid">
                @forelse($rooms as $room)
                    @php
                        $isAvailable = (int) $room->quantity < (int) $room->occupancy;
                        $price = optional($room->roomType)->room_type_price ?? 0;
                        $typeName = optional($room->roomType)->room_type_name ?? 'Chua phan loai';
                    @endphp
                    <article class="room-card">
                        <div class="room-top">
                            <div>
                                <p class="muted">Phong {{ $room->room_id }}</p>
                                <h3>{{ $room->room_name }}</h3>
                            </div>
                            <span class="badge {{ $isAvailable ? 'badge-good' : 'badge-warn' }}">
                                {{ $isAvailable ? 'Con trong' : 'Da du nguoi' }}
                            </span>
                        </div>

                        <div class="meta">
                            <span><strong>Loai phong</strong> <span>{{ $typeName }}</span></span>
                            <span><strong>Suc chua</strong> <span>{{ $room->quantity }}/{{ $room->occupancy }} nguoi</span></span>
                            <span><strong>Trang thai</strong> <span>{{ ucfirst($room->status) }}</span></span>
                        </div>

                        <div class="room-footer">
                            <div class="price">{{ number_format($price, 0, ',', '.') }} VND</div>
                            <a class="button-outline" href="{{ route('public.room-detail', $room->room_id) }}">Xem chi tiet</a>
                        </div>
                    </article>
                @empty
                    <article class="room-card">
                        <h3>Chua co du lieu phong</h3>
                        <p class="muted">Can import hoac tao du lieu phong trong trang quan ly.</p>
                    </article>
                @endforelse
            </div>
        </section>

        <section class="contact-card" id="lien-he">
            <div class="contact-item">
                <h3>Dia chi</h3>
                <p>Khu tro sinh vien K23<br>Thai Nguyen</p>
            </div>
            <div class="contact-item">
                <h3>So dien thoai</h3>
                <p>0900 123 456<br>Ho tro xem phong va dat lich</p>
            </div>
            <div class="contact-item">
                <h3>Email</h3>
                <p>nhatrok23@example.com<br>Tiep nhan cau hoi va phan hoi</p>
            </div>
        </section>
    </div>
</body>
</html>
