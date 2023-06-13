<?php

class User_model
{
  public $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function isNimExists($nim)
  {
    $query = "SELECT * FROM user WHERE user_nim = '$nim'";
    $this->db->query($query);
    $result = mysqli_affected_rows($this->db->dbHandler);
    return $result;
  }

  public function addUser($data)
  {
    $nim = $data['nim'];

    if ($this->isNimExists($nim)) {
      return 0;
    }

    if ($data['password'] != $data['confirmPass']) {
      return 0;
    }

    $password = password_hash($data['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES('', '$nim', '', '$nim', '$password', '')";
    $this->db->query($query);
    $result = mysqli_affected_rows($this->db->dbHandler);
    return $result;
  }

  public function login($data)
  {
    $nim = $data['nim'];
    $password = trim($data['password']);

    $query = "SELECT * FROM user WHERE user_nim = '$nim'";
    $result = $this->db->query($query);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $isPassValid = password_verify($password, $row['password']);
      var_dump($isPassValid);
      if ($isPassValid) return 1;
    }
    return 0;
  }
}
