<?php

class Home extends Controller
{
  public function index()
  {
    if (!isset($_SESSION["login"])) {
      header('Location:' . BASE_URL . '/login');
      exit;
    }

    $data['title'] = 'Home';
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('home/index');
    $this->view('templates/footer');
    $this->view('templates/script');
  }

  public function logOut()
  {
    $_SESSION = [];
    session_unset();
    session_destroy();

    header('Location:' . BASE_URL . '/login');
    exit;
  }
}
