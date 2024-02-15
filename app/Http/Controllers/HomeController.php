<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->limit(4)->get();
        return View('index', [
            'properties' => $properties
        ]);
    }
}
