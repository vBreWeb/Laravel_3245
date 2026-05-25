<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        $categories = Category::orderBy('name')->get();

        return view('welcome', compact('partners', 'categories'));
    }
}
