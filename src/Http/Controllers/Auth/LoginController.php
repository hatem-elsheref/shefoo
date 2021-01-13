<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Core\Request;
use App\Models\Auth\LoginModel;

class LoginController extends Controller{

    public function __construct(){
        $this->layout('auth');
    }

    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $model = new LoginModel();
        $model->loadData($request->body());

        if ($model->validate() && $model->login()){
           // redirect to home page
        }else{
            return view('auth.login',['model'=>$model]);
        }
    }

    public function logout(){

    }
}