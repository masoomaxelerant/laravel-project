<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SuggestionsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact-list', [ContactController::class, 'show'])->name('contact.show');
Route::view('/services', 'services', [
    // 'services' => ['Web Development', 'Mobile App Development', 'UI/UX Design'],
    'services' => [],
    'name' => request()->query('name', 'Guest'),
    'image' => 'https://www.w3schools.com/w3images/avatar2.png',
]);
// Index all suggestions
Route::get('/suggestion', [SuggestionsController::class, 'index']);
// Create suggestions
Route::get('/suggestion/create', [SuggestionsController::class, 'create']);
// Store new suggestion
Route::post('/submit-suggestion', [SuggestionsController::class, 'store']);
// Show single suggestion by ID
Route::get('/suggestion/{suggestions}', [SuggestionsController::class, 'show']);
// Edit single suggestion by ID
Route::get('/suggestion/{suggestions}/edit', [SuggestionsController::class, 'edit']);
// Update single suggestion by ID
Route::patch('/suggestion/{suggestions}', [SuggestionsController::class, 'update']);
// Delete single suggestion by ID
Route::delete('/suggestion/{suggestions}/delete', [SuggestionsController::class, 'destroy']);

// Temporary route to clear suggestions for testing purposes
Route::get('/delete-suggestions', function () {
    suggestions::truncate();

    return redirect('/suggestion');
});
