<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

// Proje ilk açıldığında doğrudan Giriş Yap sayfasına yönlendir
Route::get('/', function () {
    return redirect()->route('login');
});



// Giriş Yapma Rotaları
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Çıkış Yapma Rotaları
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Blog Rotaları (Sadece giriş yapmış kullanıcılar erişebilir)
Route::middleware(['auth'])->group(function () {
    Route::get('blog', [PostController::class, 'index'])->name('blog.index');
    Route::post('blog', [PostController::class, 'store'])->name('blog.store');
    // Tekil blog detay sayfası rotası
    Route::get('blog/{id}', [PostController::class, 'show'])->name('blog.show');
    Route::delete('blog/{id}', [PostController::class, 'destroy'])->name('blog.destroy');
});
