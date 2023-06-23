<?php
// require_once '../models/Repo_model.php';
class Upload extends Controller
{
  // private $model;
  public $db;
  public function __construct() {
    // $this->model = new Repo_model;
    $this->db = new Database;
  }

  public function index()
  {
    if (!isset($_SESSION["login"])) {
      header('Location:' . BASE_URL . '/login');
      exit;
    }

    $data['title'] = 'Upload';
    $this->view('templates/header', $data);
    $this->view('templates/navbar');
    $this->view('upload/index');
    $this->view('templates/footer');
    $this->view('templates/script');
  }

  public function addProject($data) {
    $uid = $_SESSION['user_id'];
    $desc = $data['desc'];
    $title = $data['title'];
    $date = date("Y-m-d");
    $statement = "INSERT INTO project(project_id, author_id, project_title, date_created, date_updated, description, thumbnail_path) 
                                VALUES('', '$uid', '$title', '$date', '$date', '$desc', '');";
    $this->db->query($statement);
    $result = $this->db->query("SELECT * FROM project ORDER BY project_id DESC LIMIT 1");
    $proj_id = mysqli_fetch_assoc($result)['project_id'];
    foreach ($data['tags'] as $tag) {
      $statement = "INSERT INTO tag VALUES($proj_id, $tag)";
      $this->db->query($statement);
    }
  }
  public function uploadProduct() {
    $this->addProject($_POST);
    header('Location:' . BASE_URL . '/profile');
  }
}
