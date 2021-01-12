<?php
namespace App\Http\Controllers\Auth;

use App\Core\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\RegisterModel;

class RegisterController extends Controller {

    public function __construct(){
        $this->layout('auth');
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(Request $request){
        $model = new RegisterModel();
        $model->loadData($request->body());

        if ($model->validate() && $model->register()){
            var_dump('user created successfully');
        }else{
            return view('auth.register',['model'=>$model]);
        }
    }
}