<?php

class Profile extends Controller
{
  public function index()
  {
    if (!isset($_SESSION["login"])) {
      header('Location:' . BASE_URL . '/login');
      exit;
    }
    
    $data['title'] = 'Profile Page';
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('profile/index');
    $this->view('templates/footer');
    $this->view('templates/script');
  }
}
