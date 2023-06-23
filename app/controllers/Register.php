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
    $reg_result = $this->model('User_model')->addUser($_POST);
    if ($reg_result > 0) {
      Flasher::setFlash('<strong>successfull</strong>. Please Complete Your Identity', 'Register', 'success');
      header('Location:' . BASE_URL . '/register/fill_profile');
      exit;
    } else {
      Flasher::setFlash('<strong>failed</strong>', 'Register', 'danger');
      header('Location:' . BASE_URL . '/register');
      exit;
    }
  }

  public function fill_profile()
  {
    $data['title'] = 'Fill Profile';
    $this->view('templates/header', $data);
    $this->view('register/fill_profile');
    $this->view('templates/script');
  }

  public function confirmEdit() {
    if ($this->model('User_model')->setProfile($_POST) > 0) {
      Flasher::setFlash('<strong>Complete</strong>. Login to Continue', 'Profile', 'success');
      header('Location:' . BASE_URL . '/login');
      exit;
    }
  }
}
