<?php

class Login extends Controller
{
  public function index()
  {
    $data['title'] = 'Profile Page';
    $this->view('templates/header', $data);
    $this->view('profile/index');
    $this->view('templates/footer');
  }
}
