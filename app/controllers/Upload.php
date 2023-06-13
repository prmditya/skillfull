<?php

class Upload extends Controller {
  public function index(){
  $data['title'] = 'Upload';
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('upload/index');
    $this->view('templates/footer');
    $this->view('templates/script');
  }
}