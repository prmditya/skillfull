<?php

class Register extends Controller
{
  public function index()
  {
    $data['title'] = 'Register Page';
    $this->view('templates/header', $data);
    $this->view('register/index');
    $this->view('templates/footer');
  }

  public function registerUser()
  {
    if ($this->model('User_model')->addUser($_POST) > 0) {
      header('Location:' . BASE_URL . '/login');
      exit;
    } else {
      echo "<script> alert('Sign-Up Failed') </script>";
    }
  }
}
