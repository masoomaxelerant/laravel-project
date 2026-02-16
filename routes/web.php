<?php

use Illuminate\Support\Facades\Route;
Use Illuminate\Support\Facades\DB;

Route::view('/', 'welcome');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::view('/services', 'services',[
  // 'services' => ['Web Development', 'Mobile App Development', 'UI/UX Design'],
  'services' => [],
  'name' => request()->query('name', 'Guest'),
  'image' => 'https://www.w3schools.com/w3images/avatar2.png'
]);
Route::get('/suggestion', function () {
  $message = session('message');
  // $suggestions = session('suggestions', []);
  $suggestions = DB::table('suggestions')->get();
  // return $suggestions[0];
  return view('suggestion', [
    'message' => $message,
    'suggestions' => $suggestions
  ]);
});
Route::post('/submit-suggestion', function () {
  $suggestion = request()->input('suggestion');
  session()->flash('message', 'Thank you for your suggestion:>> ' . $suggestion);
  session()->push('suggestions', $suggestion);
  return redirect('/suggestion');
  // dd($suggestion);
  // dd(request()->all());
});
// Temporary route to clear suggestions for testing purposes
Route::get('/delete-suggestions', function () {
  session()->forget('suggestions');
  return redirect('/suggestion');
});
