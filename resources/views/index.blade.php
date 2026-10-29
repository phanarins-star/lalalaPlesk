
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index - Laravel</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }
        header {
            background: #1d4ed8;
            color: white;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }
        main {
            max-width: 900px;
            margin: 40px auto;
            padding: 24px;
            background: white;
            border-radius: 12px;
        }
        button {
            padding: 10px 16px;
            background: #dc2626;
            color: white;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<header>
    <strong>Laravel Dashboard</strong>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</header>

<main>
    <h1>ยินดีต้อนรับ {{ auth()->user()->name }}</h1>
    <p>คุณเข้าสู่ระบบสำเร็จแล้ว</p>
    <p>อีเมล: {{ auth()->user()->email }}</p>
</main>
</body>
</html>
