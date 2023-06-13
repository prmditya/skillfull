<?php

class Login extends Controller
{
  public function index()
  {
    if (isset($_SESSION["login"])) {
      header('Location:' . BASE_URL . '/home');
      exit;
    }

    $data['title'] = 'Login Page';
    $this->view('templates/header', $data);
    $this->view('login/index');
    $this->view('templates/script');
  }

  public function loginUser()
  {
    if ($this->model('User_model')->login($_POST) > 0) {
      $_SESSION["login"] = true;
      header('Location:' . BASE_URL . '/home');
      exit;
    } else {
      Flasher::setFlash('<strong>failed</strong>', 'Login', 'danger');
      header('Location:' . BASE_URL . '/login');
      exit;
    }
  }
}
