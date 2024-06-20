<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;


/** 
 * Method HTTP:
 * 1. Get = menampilkan data
 * 2. Post = mengirim data 
 * 3. Put = meng-update data 
 * 4. Delete = menghapus data 
 */

// router untuk menampilkan teks
Route::get('/salam/{nama}', function ($nama) {
    return "Assalamualaikum $nama";
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Route untuk menampilkan student
    Route::get('admin/student', [StudentController::class, 'index'])->middleware('admin');

    //Route untuk menampilkan courses
    Route::get('admin/courses', [CourseController::class, 'index']);

    //Route untuk menampilkan create student
    Route::get('admin/student/create', [StudentController::class, 'create'])->middleware('admin');

    //Route untuk mengirim data student 
    Route::post('admin/student/store', [StudentController::class, 'store'])->middleware('admin');

    //Route untuk menampilkan halaman edit student
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit'])->middleware('admin');

    //Rouete untuk menyimpan hasil update student
    Route::put('admin/student/update/{id}', [StudentController::class, 'update'])->middleware('admin');

    //Route untuk menghapus student 
    Route::delete('admin/student/delete/{id}', [StudentController::class, 'destroy'])->middleware('admin');

    //Route untuk menampilkan create courses
    Route::get('admin/course/create', [CourseController::class, 'create']);

    //Route untuk mengirim data courses 
    Route::post('admin/course/store', [CourseController::class, 'store']);

    //Route untuk menampilkan halaman edit course
    Route::get('admin/course/edit', [CourseController::class, 'edit']);

    //Rouete untuk menyimpan hasil update course
    Route::put('admin/course/update', [CourseController::class, 'update']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
