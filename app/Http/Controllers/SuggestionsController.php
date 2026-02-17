<?php

namespace App\Http\Controllers;

use App\Models\Suggestions;
use Illuminate\Http\Request;

class SuggestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suggestions = suggestions::all();

        return view('suggestions.index', [
            'suggestions' => $suggestions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suggestions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        suggestions::create([
            'suggestion' => request('suggestion'),
            'user_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'status' => 'pending',
        ]);

        return redirect('/suggestion');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suggestions $suggestions)
    {
        return view('suggestions.show', [
            'suggestions' => $suggestions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suggestions $suggestions)
    {
        return view('suggestions.edit', [
            'suggestions' => $suggestions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suggestions $suggestions)
    {
        $suggestions->update([
            'suggestion' => request('suggestion'),
            'updated_at' => now(),
        ]);

        return redirect('/suggestion');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suggestions $suggestions)
    {
        $suggestions->delete();

        return redirect('/suggestion');
    }
}
