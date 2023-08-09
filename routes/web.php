<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OutcomesController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CourseEffortController;
use App\Http\Controllers\OutcomeEffortController;

Route::get('/', function () {
    return view('auth.login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(OutcomesController::class)->prefix('outcomes')->group(function () {
        Route::get('', 'index')->name('outcomes');
        Route::get('create', 'create')->name('outcomes.create');
        Route::post('store', 'store')->name('outcomes.store');
        Route::get('show/{id}', 'show')->name('outcomes.show');
        Route::get('edit/{id}', 'edit')->name('outcomes.edit');
        Route::put('edit/{id}', 'update')->name('outcomes.update');
        Route::delete('destroy/{id}', 'destroy')->name('outcomes.destroy');
    });

    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('', 'index')->name('categories');
        Route::get('create', 'create')->name('categories.create');
        Route::post('store', 'store')->name('categories.store');
        Route::get('show/{id}', 'show')->name('categories.show');
        Route::get('edit/{id}', 'edit')->name('categories.edit');
        Route::put('edit/{id}', 'update')->name('categories.update');
        Route::delete('destroy/{id}', 'destroy')->name('categories.destroy');
    });

    Route::controller(ProgramController::class)->prefix('programs')->group(function () {
        Route::get('', 'index')->name('programs');
        Route::get('create', 'create')->name('programs.create');
        Route::post('store', 'store')->name('programs.store');
        Route::get('show/{id}', 'show')->name('programs.show');
        Route::get('edit/{id}', 'edit')->name('programs.edit');
        Route::put('edit/{id}', 'update')->name('programs.update');
        Route::delete('destroy/{id}', 'destroy')->name('programs.destroy');
    });

    Route::controller(CourseController::class)->prefix('courses')->group(function () {
        Route::get('', 'index')->name('courses');
        Route::get('create', 'create')->name('courses.create');
        Route::post('store', 'store')->name('courses.store');
        Route::get('show/{id}', 'show')->name('courses.show');
        Route::get('edit/{id}', 'edit')->name('courses.edit');
        Route::put('edit/{id}', 'update')->name('courses.update');
        Route::delete('destroy/{id}', 'destroy')->name('courses.destroy');
    });

    Route::controller(CourseEffortController::class)->prefix('cefforts')->group(function () {
        Route::get('', 'index')->name('cefforts');
        Route::get('create', 'create')->name('cefforts.create');
        Route::post('store', 'store')->name('cefforts.store');
        Route::get('show/{id}', 'show')->name('cefforts.show');
        Route::get('edit/{id}', 'edit')->name('cefforts.edit');
        Route::put('edit/{id}', 'update')->name('cefforts.update');
        Route::delete('destroy/{id}', 'destroy')->name('cefforts.destroy');
    });

    Route::controller(OutcomeEffortController::class)->prefix('cassessments')->group(function () {
        Route::get('', 'index')->name('cassessments');
        Route::get('create', 'create')->name('cassessments.create');
        Route::post('store', 'store')->name('cassessments.store');
        Route::get('show/{id}', 'show')->name('cassessments.show');
        Route::get('edit/{id}', 'edit')->name('cassessments.edit');
        Route::put('edit/{id}', 'update')->name('cassessments.update');
        Route::delete('destroy/{id}', 'destroy')->name('cassessments.destroy');
        Route::get('showcourses/{id}', 'showcourses')->name('cassessments.showcourses');
        Route::get('showyears/{id}', 'showyears')->name('cassessments.years');
        Route::get('showsemesters/{id}', 'showsemesters')->name('cassessments.semesters');
        Route::get('/export-cassesments','export')->name('cassessments.export');


    });

    // Route::get('showcourses/{val}', ['as' => 'showcourses/{val}', 'uses' => 'OutcomeEffortControlle@showcourses']);


    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});
