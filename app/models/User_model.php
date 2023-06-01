<?php

class User_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function isNimExists($nim)
  {
    $query = "SELECT * FROM user WHERE user_nim = '$nim'";
    $result = $this->db->query($query);
    return $result;
  }

  public function addUser($data)
  {
    $nim = $data['nim'];
    $password = $data['password'];

    if ($this->isNimExists($nim)) {
      return 0;
    }

    if ($data['password'] != $data['confirmPass']) {
      return 0;
    }

    $query = "INSERT INTO user VALUES('', '$nim', '', '$nim', '$password', '')";
    return $this->db->query($query);
  }
}
