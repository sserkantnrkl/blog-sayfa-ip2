<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background-color: #f4f4f9; }
        .container { max-width: 400px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="email"], input[type="password"] { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        button:hover { background-color: #0056b3; }
        .error-message { background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<div class="container">
    <h2>Giriş Yap</h2>

    <!-- Hatalı Girişler İçin Uyarı Kutusu -->
    @if($errors->has('login_error'))
        <div class="error-message">
            {{ $errors->first('login_error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label>E-posta:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <label>Şifre:</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Giriş Yap</button>
    </form>

    <!-- Kayıt Ol linki buradan kaldırıldı! -->
</div>

</body>
</html>
