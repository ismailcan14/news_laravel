<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class TestController extends Controller
{
    public function test_methodu()
    {
        Category::create([
            'name' => 'test Kategori',
            'slug' => 'test-kategori',
            'image' => 'kategori url'
        ]);
    }
}
