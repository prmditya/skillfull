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

  function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
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
    $uid = $this->guidv4();

    $statement = "INSERT INTO user VALUES('$uid', '$nim', '', '$nim', '$password')";
    $this->db->query($statement);
    $result = mysqli_affected_rows($this->db->dbHandler);
    return $result;
  }

  public function login($data)
  {
    $nim = $data['nim'];
    $password = trim($data['password']);

    $statement = "SELECT * FROM user WHERE user_nim = '$nim'";
    $result = $this->db->query($statement);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $isPassValid = password_verify($password, $row['password']);
      if ($isPassValid) return 1;
    }
    return 0;
  }
}
