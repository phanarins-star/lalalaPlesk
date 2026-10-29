
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Laravel</title>
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
            background: #16a34a;
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
    <h2>สมัครสมาชิก</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <label for="name">ชื่อ</label>
        <input id="name" type="text" name="name"
               value="{{ old('name') }}"
               autocomplete="name" required>

        <label for="email">อีเมล</label>
        <input id="email" type="email" name="email"
               value="{{ old('email') }}"
               autocomplete="email" required>

        <label for="password">รหัสผ่าน (อย่างน้อย 8 ตัว)</label>
        <input id="password" type="password" name="password"
               minlength="8" autocomplete="new-password" required>

        <label for="password_confirmation">ยืนยันรหัสผ่าน</label>
        <input id="password_confirmation" type="password"
               name="password_confirmation"
               minlength="8" autocomplete="new-password" required>

        <button type="submit">สมัครสมาชิก</button>
    </form>

    <div class="link">
        มีบัญชีแล้ว? <a href="{{ route('login') }}">เข้าสู่ระบบ</a>
    </div>
</div>
</body>
</html>
