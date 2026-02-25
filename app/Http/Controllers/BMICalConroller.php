<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BMICalConroller extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function calculate(Request $request)
    {
        $request->validate([
          'age' => 'required|numeric|min:18|max:99',
          'height' => 'required|numeric|min:100|max:250',
          'weight' => 'required|numeric|min:30|max:200',
          'gender' => 'required'
        ]);

        $weight = $request->input('weight');
        $height = $request->input('height') / 100; // Convert cm to meters

        $bmi = round($weight / ($height * $height), 1);

        if ($bmi < 18.5) {
            $category = 'Underweight';
            $rangeMin = 0;
            $rangeMax = 18.4;
        } elseif ($bmi < 25) {
            $category = 'Normal';
            $rangeMin = 18.5;
            $rangeMax = 24.9;
        } elseif ($bmi < 30) {
            $category = 'Overweight';
            $rangeMin = 25;
            $rangeMax = 29.9;
        } else {
            $category = 'Obesity';
            $rangeMin = 30;
            $rangeMax = null; // No upper limit
        }
        $pos = ($bmi - $rangeMin) / max(1, ($rangeMax - $rangeMin));
        $pos = max(0, min(1, $pos)); // clamp 0..1
        $posPercent = $pos * 100;
        $categoryClass = match (strtolower($category)) {
          'underweight' => 'text-yellow-700 bg-yellow-100',
          'normal' => 'text-green-700 bg-green-100',
          'overweight' => 'text-orange-700 bg-orange-100',
          'obesity' => 'text-red-700 bg-red-100',
          default => 'text-gray-700 bg-gray-100',
        };

        // return view('home', compact('bmi', 'category', 'rangeMin', 'rangeMax', 'posPercent', 'categoryClass'));
        return redirect()
          ->route('bmi-home')
          ->with([
            'bmi' => $bmi,
            'category' => $category,
            'rangeMin' => $rangeMin,
            'rangeMax' => $rangeMax,
            'posPercent' => $posPercent,
            'categoryClass' => $categoryClass,
          ])
          ->withInput();
    }
}
