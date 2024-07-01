<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// index, show, create, store, edit, update, destroy


// Posts
// Wildcard name has to match the object name in the controller function parameter
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/favourite', [PostController::class, 'favourite'])->middleware('auth');
Route::patch('/posts/{post}', [PostController::class, 'update'])->middleware('auth');// Favourite

Route::post('/posts/{post}', [CommentController::class, 'store'])->middleware('auth');

use Illuminate\Support\Facades\File;
Route::get('/test', function () {

    $files = collect(File::files('images/thumb'))->map(fn($file) => $file->getFileName());
    dd($files->random());
});

// Newsletter
Route::post('/newsletter', NewsletterController::class);


// Login & Register
Route::get('/register', [RegistrationController::class, 'create'])->middleware('guest');
Route::post('/register', [RegistrationController::class, 'store'])->middleware('guest');
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');


// Admin
Route::middleware(['auth', 'can:admin'])->controller(AdminPostController::class)->group(function () {
    Route::get('/admin/posts', 'index');
    Route::get('/admin/posts/create', 'create');
    Route::post('/admin/posts', 'store');
    Route::get('/admin/posts/{post}/edit', 'edit');
    Route::patch('/admin/posts/{post}', 'update');
    Route::delete('/admin/posts/{post}', 'destroy');
});



//Alternatively
// Route::middleware(['auth', 'can:admin'])->group(function () {
//     Route::resource('/admin/posts', AdminPostController::class)->except('show');
// });


/*
    //posts/{post:slug}

    Route::get('categories/{category}', function (Category $category){
        return view('posts.index', [
            'posts' => $category->posts,
            // Equivalent to 'posts' => Post::with('author', 'category')->where('category_id', $category->id)->get()
        ]);
    });

    Route::get('authors/{author}', function (User $author){
        return view('posts.index', [
            'posts' => $author->posts,
            // Equivalent to 'posts' => Post::with('author', 'category')->where('user_id', $author->id)->get()
        ]);
    });

*/