<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'capital' => 'required|string|max:255',
            'population' => 'required|integer',
            'region' => 'required|string|max:255',
            'sub_region' => 'nullable|string|max:255',
            'flag_url' => 'nullable|string|url',
            'currency' => 'nullable|string|max:50',
            'language' => 'nullable|string|max:100'
        ]);

        $country = Country::create($validated);
        return response()->json($country, 201);
    }

    public function show(string $id)
    {
        $country = Country::findOrFail($id);
        return response()->json($country);
    }

    public function update(Request $request, string $id)
    {
        $country = Country::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'capital' => 'sometimes|string|max:255',
            'population' => 'sometimes|integer',
            'region' => 'sometimes|string|max:255',
            'sub_region' => 'nullable|string|max:255',
            'flag_url' => 'nullable|string|url',
            'currency' => 'nullable|string|max:50',
            'language' => 'nullable|string|max:100'
        ]);

        $country->update($validated);
        return response()->json($country);
    }

    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json(null, 204);
    }
}
