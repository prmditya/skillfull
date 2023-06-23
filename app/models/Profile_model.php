<?php

class Profile_model {
    public $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function follower_count($uid) {
        $result = $this->db->query("SELECT COUNT(follower_id) FROM follows WHERE followed_id = '$uid'");
        $count = mysqli_num_rows($result);
        return $count;
    }

    public function getUid($nim) {
        $result = $this->db->query("SELECT user_id FROM profile WHERE user_id = '$nim'");
        $uid = mysqli_fetch_assoc($result)['user_id'];
        return $uid;
    }

    public function followed_count($uid) {
        $result = $this->db->query("SELECT COUNT(followed_id) FROM follows WHERE follower_id = '$uid'");
        $count = mysqli_num_rows($result);
        return $count;
    }
}