<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use App\Models\Image;

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
       $user=User::find(9);
       $news=$user->news()->first();
       $images=$news->images()->first();
        dd($images->image->name);
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
