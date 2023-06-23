<?php
class Project_model {

    public $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function get_projects($uid) {
        $query = "SELECT * FROM project WHERE author_id = '$uid'";
        $result = $this->db->query($query);
        $projects = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $projects[] = $row;
        }
        return $projects;
    }

    public function get_latest($count) {
        $query = "SELECT * FROM project ORDER BY date_created DESC LIMIT count";
        $result = $this->db->query($query);
        $projects = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $projects[] = $row;
        }
        return $projects;
    }

    public function submitReview($data) {
        $proj_id = $data['project_id'];
        $user_id = $data['commenter_id'];
        $text = $data['text'];
        $rating = $data['rating'];
        $statement = "INSERT INTO comment VALUES('$proj_id', '$user_id', '$text', $rating);";
        $this->db->query($statement);
        return mysqli_affected_rows($this->db->dbHandler);
    }
}