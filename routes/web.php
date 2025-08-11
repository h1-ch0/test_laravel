<?php

use Inertia\Inertia;
use App\Models\TestLists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StreamsController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;

// Route::get('/', function () {
//     return Inertia::render('Welcome', [ //API없이 SPA방식으로 가져올 수 있는 Inertia?
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });


Route::get('/', function () {
    return view('test');

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

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
})->name('lists');

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
    dd($request->all());
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

// Route::resource('/posts', PostController::class)->middleware('auth'); 

Route::middleware('auth')->group(function(){
    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/posts',[PostController::class,'store'])->name('posts.store');
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])
        // ->middleware(['can', 'can:update,post']) 왜 안되는지 모르겠다.... 그냥 PostController에서 직접 권한 확인
        // ->middleware('can:update,post')
        ->name('posts.edit');
    Route::put('/posts/{post}',[PostController::class,'update'])->name('posts.update'); 
    Route::delete('/posts/{post}',[PostController::class,'destroy'])
        ->name('posts.destroy');
    Route::post('/logout', [LoginUserController::class,'logout'])->name('logout');
    // Streams routes
    Route::get('/streams/create', [StreamsController::class, 'create'])->name('streams.create');
    Route::post('/streams',[StreamsController::class,'store'])->name('streams.store');
    Route::get('/streams/{streams}/edit',[StreamsController::class,'edit'])
        ->name('streams.edit');
    Route::put('/streams/{streams}',[StreamsController::class,'update'])->name('streams.update'); 
    Route::delete('/streams/{streams}',[StreamsController::class,'destroy'])
        ->name('streams.destroy');
    // Admin route
    Route::get('/admin', function () {
        return view('auth.admin'); // Admin page view
    })->middleware('is-admin')->name('admin'); // Use the 'is-admin' middleware to protect this route

});

// Route::get('/streams/create', [StreamsController::class, 'create']);
// Route::get('/streams/create', [StreamsController::class, 'create']);



// Streams
Route::get('/streams', [StreamsController::class, 'index'])
    ->name('streams.index');
Route::get('/streams/{streams}', [StreamsController::class, 'show'])
    ->name('streams.show');
//posts
Route::get('/posts',[PostController::class,'index'])
    // ->middleware('custom-post-mid')
    ->name('posts.index');
Route::get('/posts/{post}',[PostController::class,'show'])
    // ->middleware('custom-post-mid') // Custom middleware applied
    ->name('posts.show');


Route::middleware('guest')->group(function(){
    Route::get('/register',[RegisterUserController::class,'register'])->name('register');
    Route::post('/register',[RegisterUserController::class,'store'])->name('register.store');
    Route::get('/login', [LoginUserController::class,'login'])->name('login');
    Route::post('/login', [LoginUserController::class,'store'])->name('login.store');
});

