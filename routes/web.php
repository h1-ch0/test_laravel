<?php

use Inertia\Inertia;
use App\Models\TestLists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/lists', function () {
    return view('Lists', [
        'heading' => 'News',
        'lists' => TestLists::all()
    ]);
});

Route::get('/lists/{id}', function ($id) {
    return view('list', [
        'row' => TestLists::find($id)
    ]);
})->where('id', '[0-9]+');


Route::get('/welcome', function () {
    return view('welcome');

});
Route::post('/', function (Request $request) {
    dd($request ->all());

});

Route::put('/{id}', function (Request $request, $id) {
    return 'put route = '. $id;
});
Route::delete('/{id}', function (Request $request, $id) {
    return 'deleted no = '. $id;
});

// Route::get('/posts', [PostController::class,'index'])->name('posts.index'); // list
// Route::get('/posts/create', [PostController::class,'create'])->name('posts.create'); //create form
// Route::post('/posts/', [PostController::class,'store']); // 신규 저장
// Route::get('/posts/{id}', [PostController::class,'show']);
// Route::get('/posts/{id}/edit', [PostController::class,'edit']); // edit form
// Route::put('/posts/{id}', [PostController::class,'update']); // 수정반영
// Route::delete('/posts/{id}', [PostController::class,'destroy']); // 삭제반영

Route::resource('/posts', PostController::class); 

Route::get('/register',[RegisterUserController::class,'register'])->name('register');
Route::post('/register',[RegisterUserController::class,'store'])->name('register.store');
Route::get('/login', [LoginUserController::class,'login'])->name('login');
Route::post('/login', [LoginUserController::class,'store'])->name('login.store');
Route::post('/logout', [LoginUserController::class,'logout'])->name('logout');