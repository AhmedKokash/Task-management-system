<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// استخدم هذا السطر فقط بدلاً من تعريف كل مسار على حدة
Route::resource('posts', PostController::class);
