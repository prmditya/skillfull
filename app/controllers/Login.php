<?php

class Login extends Controller {
  public function index(){
    $data['title'] = 'Login Page';
    $this->view('templates/header', $data);
    $this->view('login/index');
    $this->view('templates/footer');
  }
}