<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PropertyController extends Controller
{

    public function index(SearchPropertyRequest $request)
    {
        $query = Property::query();
        if ($request->has('price')) {
            $query = $query->where('price', '<=', $request->input('price'));
        }
        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property)
    {
    }
}
