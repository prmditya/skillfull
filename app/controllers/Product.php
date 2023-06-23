<?php

class Product extends Controller
{
  public function index()
  {
    $data['title'] = 'Project Page';
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('product/index');
    $this->view('templates/script');
    $this->view('templates/footer');
  }

  public function submitReview() {
    $text = $_POST['text'];
    $rating = $_POST['rating'];
    $_POST['commenter_id'] = $_SESSION['user_id'];
    $_POST['project_id'] = $_SESSION['viewed_proj_id'];
    $_POST['text'] = $text;
    $_POST['rating'] = $rating;
    if($this->model('Project_model')->submitReview($_POST) > 0) {
      header("Location: " . $_SESSION['last_uri']);
    }
  }
}
