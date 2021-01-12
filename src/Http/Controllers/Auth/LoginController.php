<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Core\Request;
class LoginController extends Controller{

    public function __construct(){
        $this->layout('auth');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){

        echo '<pre>';
        var_dump($request->body());
//        return view('auth.login');
    }
}