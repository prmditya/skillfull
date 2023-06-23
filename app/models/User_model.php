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
    $query = "SELECT * FROM profile WHERE nim = '$nim'";
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
    $email = $data['email'];

    if (empty($data['password'])) {
      return 0;
    }

    if ($data['password'] != $data['confirmPass']) {
      return 0;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return 0;
    }

    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    $uid = $this->guidv4();

    $statement = "INSERT INTO user VALUES('$uid', '$email',  '$password');";
    $this->db->query($statement);
    $result = mysqli_affected_rows($this->db->dbHandler);

    $statement2 = "INSERT INTO profile VALUES('$uid', 'N/A', 'N/A', 0, 0, '', '', 0, '');";
    $this->db->query($statement2);

    $_SESSION['reg_uid'] = $uid;

    return $result;
  }

  public function login($data)
  {
    $nim = $data['nim'];
    $password = trim($data['password']);

    $statement = "SELECT * FROM profile WHERE nim = '$nim'";
    $result = $this->db->query($statement);

    if (mysqli_num_rows($result) > 0) {
      $uid = mysqli_fetch_assoc($result)['user_id'];
      $statement = "SELECT password FROM user WHERE user_id = '$uid'";
      $result = $this->db->query($statement);
      $row = mysqli_fetch_assoc($result);
      $isPassValid = password_verify($password, $row['password']);
      if ($isPassValid) return 1;
    }
    return 0;
  }

  public function modifyProfile($data) {
    $uid = "";
    if (!isset($_SESSION['login'])) {
      $uid = $_SESSION['reg_uid'];
    }
    else {
      $uid = $_SESSION['user_id'];
    }
    $full_name = $data['full-name'];
    $nickname = $data['nick-name'];
    $major = $data['major'];
    $address = $data['address'];
    $bio = $data['bio'];
    $statement = "UPDATE profile SET full_name = '$full_name' ,nickname = '$nickname' ,major_id = $major ,address = '$address' ,bio = \"".$bio."\" WHERE user_id = '$uid';";
    $this->db->query($statement);

    return mysqli_affected_rows($this->db->dbHandler);
  }

  public function setProfile($data) {
    $uid = "";
    if (!isset($_SESSION['login'])) {
      $uid = $_SESSION['reg_uid'];
    }
    else {
      $uid = $_SESSION['user_id'];
    }
    $full_name = $data['full-name'];
    $nickname = $data['nick-name'];
    $major = $data['major'];
    $nim = $data['nim'];
    $year = $data['year'];
    $address = $data['address'];
    $bio = $data['bio'];
    $statement = "UPDATE profile SET nim = '$nim', year = $year,  full_name = '$full_name' ,nickname = '$nickname' ,major_id = $major ,address = '$address' ,bio = \"".$bio."\" WHERE user_id = '$uid';";
    $this->db->query($statement);

    return mysqli_affected_rows($this->db->dbHandler);
  }
}
