<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('form');
})->name('form.show');

Route::post('/form-submit', [FormController::class, 'submit'])->name('form.submit');

Route::get('/{id}', function ($id) {
    return \App\Models\Member::query()->where('id', $id)->firstOrFail();
});

