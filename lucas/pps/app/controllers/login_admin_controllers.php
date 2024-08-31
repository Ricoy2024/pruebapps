<?php
class AuthController extends BaseController{ //ver de donde extiende
public function login(){
    $data = [
        'error_login'=>'',
    ];
    $this->view('pages/auth/login',$data);
}
}
?>