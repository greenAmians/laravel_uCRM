<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\InertiaTestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;


// 認証していたら表示
Route::resource('items', ItemController::class)->middleware(['auth','verified']);
Route::resource('customers',CustomerController::class)->middleware(['auth','verified']);

// Inertia
Route::get('/inertia-test', function () {
    return Inertia::render('InertiaTest');
}
);

// 他のコンポーネントを使ってみる
Route::get('/component-test', function () {
    return Inertia::render('ComponentTest');
}
);

// 追加
Route::get('/inertia/index',[InertiaTestController::class, 'index'])->name('inertia.index');

//フォーム(create)
Route::get('/inertia/create',[InertiaTestController::class, 'create'])->name('inertia.create');


// Linkコンポーネントでsutore保存
Route::post('/inertia',[InertiaTestController::class, 'store'])->name('inertia.store');


// ↓Linkルートパラメータ実装
Route::get('/inertia/show/{id}',[InertiaTestController::class, 'show'])->name('inertia.show');

//イベントコールバック
Route::delete('/inertia/{id}',[InertiaTestController::class, 'delete'])->name('inertia.delete');



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// 認証していたら表示
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
