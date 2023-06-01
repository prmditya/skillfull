<?php

class Register extends Controller
{
  public function index()
  {
    if (isset($_SESSION["login"])) {
      header('Location:' . BASE_URL . '/home');
      exit;
    }

    $data['title'] = 'Register Page';
    $this->view('templates/header', $data);
    $this->view('register/index');
    $this->view('templates/script');
  }

  public function registerUser()
  {
    if ($this->model('User_model')->addUser($_POST) > 0) {
      Flasher::setFlash('<strong>successfull</strong> log-in to continue', 'Register', 'success');
      header('Location:' . BASE_URL . '/login');
      exit;
    } else {
      Flasher::setFlash('<strong>failed</strong>', 'Register', 'danger');
      header('Location:' . BASE_URL . '/register');
    }
  }
}
