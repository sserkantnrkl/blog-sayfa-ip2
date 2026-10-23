<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .container { max-width: 800px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .back-btn { display: inline-block; background-color: #6c757d; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px; margin-bottom: 20px; font-size: 14px; }
        .back-btn:hover { background-color: #5a6268; }
        h1 { color: #333; margin-bottom: 10px; }
        .meta { font-size: 14px; color: #666; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .content { font-size: 16px; line-height: 1.6; color: #444; white-space: pre-line; }
    </style>
</head>
<body>

<div class="container">
    <!-- Geri Dön Butonu -->
    <a href="{{ route('blog.index') }}" class="back-btn">&larr; Blog Listesine Dön</a>

    <h1>{{ $post->title }}</h1>

    <div class="meta">
        Yazan: <strong>{{ $post->user->name }}</strong> | Yayınlanma Tarihi: {{ $post->publish_date }}
    </div>

    <div class="content">
        {{ $post->content }}
    </div>
</div>

</body>
</html>
