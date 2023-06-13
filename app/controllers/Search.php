<?php

class Search extends Controller
{
  public function index()
  {
    if (!isset($_SESSION["login"])) {
      header('Location:' . BASE_URL . '/login');
      exit;
    }

    if (empty($_POST['searchInput'])) {
      header('Location:' . BASE_URL . '/home');
    }

    $data['title'] = 'Search Result';
    $data['searchInput'] = $_POST['searchInput'];
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('search/index', $data);
    $this->view('templates/footer');
    $this->view('templates/script');
  }
}
