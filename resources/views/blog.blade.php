<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Blog Sayfası</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f4f4; }
        .container { max-width: 700px; margin: auto; background: white; padding: 25px; border: 1px solid #ddd; }
        .post { background: #fff; border: 1px solid #ccc; padding: 15px; margin-top: 15px; }
        input, textarea { width: 100%; padding: 6px; margin-top: 5px; box-sizing: border-box; }
        button { padding: 8px 15px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <!-- Çıkış Yap Butonu -->
    <form action="{{ route('logout') }}" method="POST" style="float: right;">
        @csrf
        <button type="submit" style="background: #ff4d4d; color: white; border: none;">Çıkış Yap</button>
    </form>

    <h2>Hoş Geldiniz, {{ Auth::user()->name }}</h2>
    <hr>

    <h3>Yeni Blog Yazısı Ekle</h3>

    <!-- Başarı Mesajı -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Blog Ekleme Formu -->
    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        <div>
            <label>Blog Başlığı:</label><br>
            <input type="text" name="title" required>
        </div>
        <br>
        <div>
            <label>Yayınlanma Tarihi:</label><br>
            <input type="date" name="publish_date" required>
        </div>
        <br>
        <div>
            <label>İçerik:</label><br>
            <textarea name="content" rows="4" required></textarea>
        </div>
        <br>
        <button type="submit" style="background: #4CAF50; color: white; border: none;">Yazıyı Kaydet</button>
    </form>

    <hr>

    <h3>Tüm Blog Yazıları</h3>
    @if(isset($posts) && count($posts) > 0)
        @foreach($posts as $post)
            <div class="post">
                <h4 style="margin: 0 0 5px 0;">{{ $post->title }}</h4>
                <small style="color: #666;">Yazan: {{ $post->user->name }} | Tarih: {{ $post->publish_date }}</small>

                <p>{{ mb_substr($post->content, 0, 100) }}...</p>

                <a href="{{ route('blog.show', $post->id) }}">Devamını Oku</a>

                @if($post->user_id == Auth::id())
                    <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="margin-top: 10px;" onsubmit="return confirm('Silmek istediğine emin misin?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: #ff4d4d; color: white; border: none; font-size: 11px; padding: 4px 8px;">Sil</button>
                    </form>
                @endif
            </div>
        @endforeach
    @else
        <p>Henüz blog yazısı yok.</p>
    @endif
</div>

</body>
</html>
