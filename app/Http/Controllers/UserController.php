<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest; 
use App\Http\Requests\UserLoginRequest; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function create_user(CreateUserRequest $request)
    {
     
      $user=User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password' => Hash::make($request->password)

      ]);

      return response()->json([
        'status'=>true,
        'message'=>'kullanıcı basarıyla olusturuldu.',
        'data'=>$user
      ]);
    }
    /*Bu metod, gelen bir HTTP POST isteğini alıp bir kullanıcı oluşturur.
Request nesnesi ile gelen verileri alır ($request->name, $request->email, vs.).
Veriler geçerli mi diye kontrol eder ($request->validate([...])).
Kullanıcıyı veritabanına kaydeder (User::create([...])).
Oluşturulan kullanıcıyı JSON formatında döner (response()->json([...])). */

public function login(UserLoginRequest $request )
   {
  $user=Auth::attempt([
    'email'=>$request->email,
    'password'=>$request->password
  ]);

  if(!$user)
  {
    return response()->json([
        'status'=>false,
        'message'=>'kullanıcı bulunamadı'
    ]);
  }

  else{
    return response()->json([
        'status'=>true,
        'message'=>'Kullanıcı basarıyla giris yaptı',
        'data'=>Auth::user()
    ]);
      } 
   }

public function logout(UserLoginRequest $request)
{
    $user=Auth::attempt([
        'email'=>$request->email,
        'password'=>$request->password
      ]);
      if(!$user)
      {
        return response()->json([
            'status'=>false,
            'message'=>'kullanıcı bulunamadı'
        ]);
      }

    Auth::logout();
    return response()->json([
        'status'=>true,
        'message'=>'kullanıcı basarıyla çıkış yaptı'
    ]);

    //Güvenlik önlemi için çıkarken de email ve sifre alıyoruz
}

/*public function get_auth()
{
    return response()->json([
        'status'=>true,
        'message'=>'kullanıcı bilgileri basarıyla getirildi.',
        'data'=>Auth::user()
    ]);
} 
çalışmıyor cünkü api kısmı session tutmuyor. Onun yerine alttaki gibi kullanıyoruz.   
*/
public function get_user_from_id(int $user_id)
{ $user=User::find($user_id);

    if(!$user)
        {
            return response()->json([
                'status'=>false,
                'message'=>'kullanıcı bulunamadı'
            ]);
        }
    return response()->json([
        'status'=>true,
        'message'=>'kullanıcı bilgileri basarıyla getirildi.',
        'data'=>$user
    ]);
} 


}
