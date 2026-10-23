<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Tüm kullanıcıların blog yazılarını listeleme
    public function index()
    {
        $posts = Post::latest()->get();
        return view('blog', compact('posts'));
    }

    // Tek bir blog yazısının detay sayfasını gösterme
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blog-detail', compact('post'));
    }

    // Yeni blog yazısını kaydetme
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publish_date' => 'required|date',
        ]);

        Post::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'publish_date' => $request->publish_date,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog yazısı başarıyla eklendi!');
    }

    // Blog yazısını silme
    public function destroy($id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Blog yazısı silindi.');
    }
}
