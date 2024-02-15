<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFormRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Paginator | View
    {
        return view('admin.properties.index', [
            'properties' => Property::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
            'title' => 'titre',
            'price' => 10000,
            'surface' => 10,
            'rooms' => 1,
            'bedrooms' => 0,
            'floor' => 0,
            'city' => 'Ilafy',
            'address' => 'antsampandrano',
            'postal_code' => '103',
            'sold' => false
        ]);

        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage. 
     */
    public function store(PropertyFormRequest $request, Property $property)
    {
        Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'le bien a été bien créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success', 'le bien a été bien modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'le bien a été suprimé');
    }
}
