<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\User;

class TestController extends Controller
{
    public function test_methodu()
    {
       /* $user=$this->create_user();
        $category_modeli = Category::create([
            'name' => 'test name',
            'slug' => 'test-slug'.rand(1,99900),
            'image' => 'test url'
        ]);
        News::create([
            'title'=>'test baslik',
            'slug'=>'test slug'.rand(1,99900),
            'image'=>'test image',
            'content'=>'test icerik',
            'user_id'=>$user->id,
            'category_id'=>$category_modeli->id
        ]);*/
        $haber=News::find(1)->delete();
        dd($haber);
    }
    public function create_user():User
    {
        return User::firstOrCreate([
            'name'=> 'user1',
        ],[
            'email'=>'usermail.com',
            'password'=>'deneme123'
        ]);
        //varsa getir yoksa olustur.
    }
}
