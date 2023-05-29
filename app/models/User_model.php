<?php

class User_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function addUser($data)
  {
    $nim = $data['nim'];
    $password = $data['password'];
    $query = "INSERT INTO user VALUES('', '$nim', '', '$nim', '$password', '')";
    return $this->db->query($query);
  }
}
