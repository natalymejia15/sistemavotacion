<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Models\Category;


class ResourceController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Resources', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'resources' => Resource::with('category')->get(),
        ]);
    }
    public function store(Request $request)
    {
        Resource::created([
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'category_id' => Category::first()->id,
            'creator_id' => $request->user()->id,
        ]);
        return Inertia::location('/');
    }
    public function search(Request $request)
    {
        return Resource::where('title', 'link', "%$request->search%")
            ->with('category')
            ->get();
    }
}
