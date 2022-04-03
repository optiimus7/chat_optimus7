<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function profile()
    {
        return view('users.profile');
    }

    public function profileUpdate(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();

        if($request->email){
            unset($data['email']);
        }

        if ($request->password) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        // dd($data);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            // SE O USUARIO JA POSSUI IMAGEM E SE ELA EXISTE EM ARQUIVO
            if ($user->image <> null && Storage::exists("public/users/{$user->image}")) {
                Storage::delete("public/users/{$user->image}");
            }

            $name = Str::kebab($request->name).uniqid($user->id);
            $extension = $request->image->extension();
            $nameImage = "{$name}.$extension";

            $upload = $request->image->storeAs('public/users', $nameImage);
            if(!$upload) {
                return redirect()->route('profile.user')->with('error', 'Falha ao fazer o Upload da Imagem');
            } else {
                $data['image'] = $nameImage;
            }




        }
        // dd($data);


        $user->update($data);
        return redirect()->route('profile.user')->with('success','Atualizado com Sucesso!');
    }


}
