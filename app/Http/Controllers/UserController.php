<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $userModel = new User();
        $user = $userModel->getUserInfo();
        return view('mypage', ['user' => $user]);
    }
}
