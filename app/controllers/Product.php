<?php

class Login extends Controller
{
  public function index()
  {
    $data['title'] = 'Product Page';
    $this->view('templates/header', $data);
    $this->view('product/index');
    $this->view('templates/footer');
  }
}
