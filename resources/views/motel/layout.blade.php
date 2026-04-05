<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Quan ly nha tro')</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #f4f6f8; color: #1f2937; }
        .shell { width: min(1100px, calc(100% - 32px)); margin: 0 auto; }
        .nav { display: flex; gap: 12px; flex-wrap: wrap; padding: 24px 0 12px; align-items: center; }
        .nav a { padding: 10px 14px; border-radius: 10px; background: #fff; border: 1px solid #d6dde6; text-decoration: none; color: #1f2937; font-weight: 600; }
        .nav form { margin-left: auto; }
        .header { display: flex; justify-content: space-between; align-items: center; gap: 16px; margin-bottom: 20px; }
        .card { background: #fff; border: 1px solid #d6dde6; border-radius: 16px; padding: 20px; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { padding: 12px; border-bottom: 1px solid #e5e7eb; text-align: left; }
        .actions { display: flex; gap: 8px; flex-wrap: wrap; }
        .button, button {
            padding: 10px 14px; border-radius: 10px; border: 0; background: #1d4ed8; color: #fff; cursor: pointer; text-decoration: none; display: inline-block;
        }
        .button.secondary { background: #475569; }
        .button.danger { background: #b91c1c; }
        .flash { padding: 12px 14px; background: #dcfce7; color: #166534; border-radius: 10px; margin-bottom: 16px; }
        .errors { padding: 12px 14px; background: #fee2e2; color: #991b1b; border-radius: 10px; margin-bottom: 16px; }
        .grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
        .field { display: grid; gap: 8px; }
        input, select, textarea {
            width: 100%; padding: 12px; border-radius: 10px; border: 1px solid #cbd5e1; font: inherit; box-sizing: border-box;
        }
        h1, h2 { margin: 0; }
        .muted { color: #64748b; }
        @media (max-width: 760px) { .grid { grid-template-columns: 1fr; } .header { align-items: start; flex-direction: column; } }
    </style>
</head>
<body>
    <div class="shell">
        <nav class="nav">
            <a href="{{ route('motel.dashboard') }}">Dashboard</a>
            <a href="{{ route('motel.rooms.index') }}">Room</a>
            <a href="{{ route('motel.tenants.index') }}">Tenant</a>
            <a href="{{ route('motel.contracts.index') }}">Contract</a>
            <a href="{{ route('motel.invoices.index') }}">Invoice</a>
            <a href="{{ route('motel.revenue.index') }}">Revenue</a>
            <a href="{{ route('public.rooms.index') }}">Public Rooms</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Dang xuat</button>
            </form>
        </nav>

        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="errors">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
