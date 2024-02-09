<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
       
        $users=User::all();
        return view('users.index',['users'=>$users]);
    }

    public function show( string $id){
        $user=User::find($id);
        return view('users.show',['user'=>$user]);
        
    }

    public function create(){
       
        return view('users.create');
    }
    public function store(Request $request){
         User::create([
        'name'=> $request->name,
        'email'=> $request->email,
        'password'=> $request->password

       ]);
      return redirect (url('/users')) ; 
    }

    public function edit($id){
       
        $user=User::find($id);
        return view('users.edit',['user'=>$user]);
    }
    public function update($id,Request $request){
       
        User::FindOrFail($id)->Update([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password
    
           ]);
          return redirect (url('/users')) ; 
    }
    public function delete($id){
       
        User::find($id)->delete;
        return redirect (url('/users')) ; 
    }

}
