<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Acceso administrativo · INNAR</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/LOGO2.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #2e4a47, #4a6b68); padding: 24px; }
        .box { background: #fff; width: 100%; max-width: 400px; border-radius: 18px; padding: 40px 32px; box-shadow: 0 24px 60px rgba(0,0,0,.18); }
        img { height: 48px; display: block; margin: 0 auto 12px; }
        h1 { margin: 0; text-align: center; font-size: 20px; color: #2e4a47; }
        p { text-align: center; color: #7a8f8c; font-size: 12px; letter-spacing: .08em; text-transform: uppercase; margin: 6px 0 28px; }
        label { display: block; font-size: 12px; font-weight: 700; color: #4a6b68; margin-bottom: 6px; text-transform: uppercase; }
        input { width: 100%; padding: 12px 14px; border: 1.5px solid #d5e2df; border-radius: 10px; font-size: 15px; font-family: inherit; margin-bottom: 16px; }
        button { width: 100%; background: #4a6b68; color: #fff; border: 0; padding: 13px; border-radius: 10px; font-weight: 700; cursor: pointer; font-family: inherit; text-transform: uppercase; letter-spacing: .04em; }
        .err { background: #fdecec; color: #9b1c1c; padding: 12px; border-radius: 10px; font-size: 13px; margin-bottom: 16px; }
        .back { display: block; text-align: center; margin-top: 18px; color: #4a6b68; font-size: 13px; text-decoration: none; }
    </style>
</head>
<body>
    <div class="box">
        <img src="{{ asset('assets/img/LOGO.png') }}" alt="INNAR">
        <h1>Panel administrativo</h1>
        <p>Instituto Neurociencias de Nariño</p>
        @if ($errors->any())
            <div class="err">{{ $errors->first() }}</div>
        @endif
        @if (session('error'))
            <div class="err">{{ session('error') }}</div>
        @endif
        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf
            <label>Usuario</label>
            <input type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username">
            <label>Contraseña</label>
            <input type="password" name="password" required autocomplete="current-password">
            <button type="submit">Iniciar sesión</button>
        </form>
        <a class="back" href="{{ url('/') }}">Volver al sitio</a>
    </div>
</body>
</html>
