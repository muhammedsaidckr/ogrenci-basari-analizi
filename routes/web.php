<?php

use App\Mail\ExamResult;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('default');
    });
    Route::get('/sonuclar/{slug}', [\App\Http\Controllers\IndexController::class, 'index']);

    Route::post('/sonuclar/{slug}', [\App\Http\Controllers\IndexController::class, 'show'])->name('filter');

    Route::get('/cms/exam', [\App\Http\Controllers\ExamController::class, 'index'])->name('ex.index');
    Route::get('/cms/exam/create', [\App\Http\Controllers\ExamController::class, 'create'])->name('ex.create');
    Route::post('/cms/exam/store', [\App\Http\Controllers\ExamController::class, 'store'])->name('ex.store');
    Route::get('/cms/exam/{exam}/edit', [\App\Http\Controllers\ExamController::class, 'edit'])->name('ex.edit');
    Route::patch('/cms/exam/{exam}', [\App\Http\Controllers\ExamController::class, 'update'])->name('ex.update');
    Route::delete('/cms/exam/{exam}' , [\App\Http\Controllers\ExamController::class, 'destroy'])->name('ex.destroy');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    Route::get('/cms/school/create', [\App\Http\Controllers\SchoolController::class, 'create'])
        ->name('school.create')
        ->middleware('can:create_school');
    Route::post('/cms/school', [\App\Http\Controllers\SchoolController::class, 'store'])
        ->name('school.store');

    Route::get('/cms/user/create', [\App\Http\Controllers\UserController::class, 'create'])
        ->name('user.create')
        ->middleware('can:create_user');
    Route::post('/cms/user', [\App\Http\Controllers\UserController::class, 'store'])
        ->name('user.store')
        ->middleware('can:create_user');
    Route::get('/cms/user/password-reset', [\App\Http\Controllers\UserController::class, 'reset'])
        ->name('user.reset');
    Route::patch('/cms/user/password-reset', [\App\Http\Controllers\UserController::class, 'update'])
        ->name('user.update');


    Route::get('/cms/student', [\App\Http\Controllers\StudentController::class, 'index'])
        ->name('student.index');
    Route::get('/cms/student/{student}/show', [\App\Http\Controllers\StudentController::class, 'show'])
        ->name('student.show');
    Route::get('/cms/student/create', [\App\Http\Controllers\StudentController::class, 'create'])
        ->name('student.create');
    Route::post('/cms/student', [\App\Http\Controllers\StudentController::class, 'store'])
        ->name('student.store');
    Route::get('/cms/student/{student}/edit', [\App\Http\Controllers\StudentController::class, 'edit'])
        ->name('student.edit');
    Route::patch('/cms/student/{student}', [\App\Http\Controllers\StudentController::class, 'update'])
        ->name('student.update');
    Route::delete('/cms/{student}/student', [\App\Http\Controllers\StudentController::class, 'destroy'])
        ->name('student.destroy');

    Route::get('/cms/student/{student}/{exam}/show', [\App\Http\Controllers\StudentController::class, 'examShow'])
        ->name('student.exam.show');
    Route::delete('/cms/student/exam/{student}/{exam}', [\App\Http\Controllers\StudentController::class, 'examDelete'])
        ->name('student.exam.delete');

    Route::delete('/cms/student/lesson/{examResult}', [\App\Http\Controllers\LessonController::class, 'destroy']);

    Route::get('/cms/exam-result/{slug}/create', [\App\Http\Controllers\ExamResultController::class, 'create'])
        ->name('exam.create');

    Route::post('/mail', function () {
        return view('cms.deneme', compact('image'));
        Mail::to('muhammedsaidckr@gmail.com')
            ->send(new \App\Mail\Result(request('image')));

        return redirect()->back();

    });



});
Route::get('/read', function () {
    $file = \Illuminate\Support\Facades\File::get(public_path('/media/said.txt'), false);
    $array = preg_split("/\r\n|\n|\r/", $file);
    dd($array);
});
Route::get('/demo', function () {
    return view('demo');
});

Route::post('/demo', function () {
//    $attributes = request()->validate([
//        'name' => 'required',
//        'email' => 'required|email',
//        'phone' => 'required'
//    ], [
//        'name.required' => 'İsminizi giriniz',
//        'email.required' => 'Email alanı zorunludur',
//        'phone.required' => 'Telefon alanı zorunludur'
//    ]);
    Mail::to('mevlut43.mk@gmail.com')
        ->send(new \App\Mail\Contact(request('name'), request('email'), request('phone')));
    return redirect('/');
});
