<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\CategoryResource;

class CategoryController extends Controller
{
    public function __invoke()
    {
        $categories = Category::orderBy('id', 'desc')->get(['id', 'title']);
        return CategoryResource::collection($categories);
    }
}
