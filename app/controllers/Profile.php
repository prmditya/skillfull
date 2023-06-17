<?php

class Profile extends Controller
{
  public function __construct()
  {
    if (!isset($_SESSION["login"])) {
      header('Location:' . BASE_URL . '/login');
      exit;
    }
  }

  public function index()
  {
    $data['title'] = 'Profile Page';
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('profile/index');
    $this->view('templates/footer');
    $this->view('templates/script');
  }

  public function edit()
  {
    $data['title'] = 'Edit Profile';
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('profile/edit');
    $this->view('templates/footer');
    $this->view('templates/script');
  }
}
