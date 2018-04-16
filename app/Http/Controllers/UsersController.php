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
}
