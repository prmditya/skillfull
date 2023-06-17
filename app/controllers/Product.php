<?php

class Product extends Controller
{
  public function index()
  {
    $data['title'] = 'Product Page';
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('product/index');
    $this->view('templates/script');
    $this->view('templates/footer');
  }
}
