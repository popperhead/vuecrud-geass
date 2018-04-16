<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function index(){
        $user = new User;
        $users = $user::all();
        return $users;
    }
    public function destroy($id){
        $user = new User;
        $users = $user::destroy($id);
        return "Deleted";
    }
    public function create(Request $r){
        //return $r;
        $user = new User;

        $user->name= $r->name;
        $user->email= $r->email;
        $user->password =bcrypt('secret');
        $user->save();
    }
}
