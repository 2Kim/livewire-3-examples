<?php

use Illuminate\Support\Facades\Route;


Route::get('/dependent-dropdown', \App\Livewire\FormExamples\DependentDropdown::class)->name('dependent-dropdown');
Route::get('/image-upload', \App\Livewire\FormExamples\ImageUpload::class)->name('image-upload');
