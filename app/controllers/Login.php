<?php

class Login extends Controller
{
  public $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function index()
  {
    if (isset($_SESSION["login"])) {
      header('Location:' . BASE_URL . '/home');
      exit;
    }

    $data['title'] = 'Login Page';
    $this->view('templates/header', $data);
    $this->view('login/index');
    $this->view('templates/script');
  }

  public function loginUser()
  {
    if ($this->model('User_model')->login($_POST) > 0) {
      $_SESSION["login"] = true;

      $query = 'SELECT * FROM profile WHERE nim = '.$_POST['nim'];
      $result = $this->db->query($query);

      if ($result->num_rows > 0) {
        $profile_data = $result->fetch_assoc();
        $uid = $profile_data['user_id'];
        $_SESSION['user_id'] = $uid;

        $query = "SELECT * FROM user WHERE user_id = '$uid'";
        $result = $this->db->query($query);
        $user_data = $result->fetch_assoc();

        $_SESSION['profile'] = $profile_data;
        $_SESSION['profile']['user_email'] = $user_data['user_email'];
        
        // MAJOR
        $query = "SELECT major_name FROM majors WHERE major_id = ".$profile_data['major_id'];
        $major = $this->db->query($query)->fetch_assoc()['major_name'];
        $_SESSION['profile']['major'] = $major;
      }

      header('Location:' . BASE_URL . '/home');
      exit;
    } else {
      Flasher::setFlash('<strong>failed</strong>', 'Login', 'danger');
      header('Location:' . BASE_URL . '/login');
      exit;
    }
  }
}
