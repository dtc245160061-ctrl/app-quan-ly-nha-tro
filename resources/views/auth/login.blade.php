<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dang nhap</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #f4f6f8; color: #1f2937; }
        .wrap { width: min(460px, calc(100% - 32px)); margin: 60px auto; }
        .card { background: #fff; border: 1px solid #d6dde6; border-radius: 16px; padding: 24px; }
        .field { display: grid; gap: 8px; margin-bottom: 16px; }
        input, select { width: 100%; box-sizing: border-box; padding: 12px; border: 1px solid #cbd5e1; border-radius: 10px; }
        button, .link { display: inline-block; padding: 10px 14px; border-radius: 10px; background: #1d4ed8; color: #fff; text-decoration: none; border: 0; }
        .errors { padding: 12px; background: #fee2e2; color: #991b1b; border-radius: 10px; margin-bottom: 16px; }
        .actions { display: flex; gap: 12px; align-items: center; }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="card">
            <h1>Dang nhap</h1>
            <p>Su dung tai khoan admin hoac customer.</p>

            @if ($errors->any())
                <div class="errors">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.perform') }}">
                @csrf
                <div class="field">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="field">
                    <label>Mat khau</label>
                    <input type="password" name="password">
                </div>
                <div class="actions">
                    <button type="submit">Dang nhap</button>
                    <a class="link" href="{{ route('register') }}">Dang ky</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
