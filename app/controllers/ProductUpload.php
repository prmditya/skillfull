<?php

class Login extends Controller
{
  public function index()
  {
    $data['title'] = 'Product Upload Page';
    $this->view('templates/header', $data);
    $this->view('product_upload/index');
    $this->view('templates/footer');
  }
}
