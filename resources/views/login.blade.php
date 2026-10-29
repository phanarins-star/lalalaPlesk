
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Laravel</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            min-height: 100vh;
            display: grid;
            place-items: center;
        }
        .card {
            width: min(400px, 92%);
            background: white;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 8px 30px #00000012;
        }
        h2 { text-align: center; color: #1e293b; }
        label { display: block; margin: 16px 0 6px; }
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
        }
        button {
            width: 100%;
            margin-top: 22px;
            padding: 12px;
            border: 0;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .error { color: #dc2626; font-size: 14px; }
        .link { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
<div class="card">
    <h2>เข้าสู่ระบบ</h2>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <label for="email">อีเมล</label>
        <input id="email" type="email" name="email"
               value="{{ old('email') }}"
               autocomplete="email" required>

        <label for="password">รหัสผ่าน</label>
        <input id="password" type="password" name="password"
               autocomplete="current-password" required>

        <button type="submit">Login</button>
    </form>

    <div class="link">
        ยังไม่มีบัญชี?
        <a href="{{ route('register') }}">สมัครสมาชิก</a>
    </div>
</div>
</body>
</html>
