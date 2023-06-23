<?php
  class Profile_model {
    public $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function follower_count($uid) {
        $result = $this->db->query("SELECT * FROM follows WHERE followed_id = '$uid'");
        $count = mysqli_num_rows($result);
        return $count;
    }

    public function followed_count($uid) {
        $result = $this->db->query("SELECT * FROM follows WHERE follower_id = '$uid'");
        $count = mysqli_num_rows($result);
        return $count;
    }

    public function project_count($uid) {
      $result = $this->db->query("SELECT * FROM project WHERE author_id = '$uid'");
      $count = mysqli_num_rows($result);
      return $count;
    }

    public function nickname($uid) {
      $result = $this->db->query("SELECT * FROM profile WHERE user_id = '$uid'");
      $nickname = mysqli_fetch_assoc($result)['nickname'];
      return $nickname;
    }

    public function nim($uid) {
      $result = $this->db->query("SELECT * FROM profile WHERE user_id = '$uid'");
      $nim = mysqli_fetch_assoc($result)['nim'];
      return $nim;
    }

    public function bio($uid) {
      $result = $this->db->query("SELECT * FROM profile WHERE user_id = '$uid'");
      $bio = mysqli_fetch_assoc($result)['bio'];
      return $bio;
    }

    public function major($uid) {
      $first_query = $this->db->query("SELECT * FROM profile WHERE user_id = '$uid'");
      $major_id = mysqli_fetch_assoc($first_query)['major_id'];
      $major_query = $this->db->query("SELECT * FROM majors WHERE major_id = '$major_id'");
      $major = mysqli_fetch_assoc($major_query)['major_name'];
      return $major;
    }

    public function address($uid) {
      $result = $this->db->query("SELECT * FROM profile WHERE user_id = '$uid'");
      $address = mysqli_fetch_assoc($result)['address'];
      return $address;
    }
  }
  $p_model = new Profile_model;
  Flasher::flash();
  $url_components = parse_url($_SERVER['REQUEST_URI']);
  parse_str($url_components['query'], $params); 
  $puid = $params['puid'];
?>
<div class="container container-profile">
  <h2 class="profile-name my-5">
    <?php
    if (isset($puid)) {
      echo $p_model->nickname($puid);
    }
    ?>
  </h2>
  <!-- Profile Wrapper Start -->
  <div class="container profile-wrapper">

    <!-- Profile Head Start -->
    <div class="row profile-head">
      <div class="col-3" class="profile-pic">
        <img src="<?= BASE_URL; ?>/img/default_profile.jpg" alt="profile picture">
      </div>
      <div class="col-3 text-center my-auto">
        <p id="project_count" class="profile-nums">
          <?php
          if (isset($puid)) {
            echo $p_model->project_count($puid);
          }
          ?>
        </p>
        <p>projects</p>
      </div>
      <div class="col-3 text-center my-auto">
        <p id="followers" class="profile-nums">
          <?php
          if (isset($puid)) {
            echo $p_model->follower_count($puid);
          }
          ?>
        </p>
        <p>followers</p>
      </div>
      <div class="col-3 text-center my-auto">
        <p id="following" class="profile-nums">
          <?php
          if (isset($puid)) {
            echo $p_model->followed_count($puid);
          }
          ?>
        </p>
        <p>following</p>
      </div>
    </div>
    <!-- Profile Head End -->

    <!-- Bio Start -->
    <div class="container-bio">
      <p id="nim">
      <?php
      if (isset($puid)) {
        echo $p_model->nim($puid);
      }
      ?>
      </p>
      <p id="major">
        <?php
        if (isset($puid)) { 
          echo $p_model->major($puid);
        }
        ?>
      </p>
      <p id="address">
        <?php 
        if (isset($puid)) {
          echo $p_model->address($puid);
        }
        ?>
      </p>
      <p id="bio">
        <?php 
        if (isset($puid)) {
          echo $p_model->bio($puid);
        }
        ?>
      </p>
    </div>
    <!-- Bio End -->

    <!-- Buttons Start -->
    <?php
    if ($puid == $_SESSION['user_id']) {
    ?>
    <div class="btn-container gap-3" id="btn_self_profile">
      <a href="<?= BASE_URL; ?>/profile/edit" class="btn btn-primary btn-profile">Edit Profile</a>
      <a href="<?= BASE_URL; ?>/upload" class="btn btn-primary btn-profile">Share Project</a>
    </div>
    <?php
    }
    else {
    ?>
    <div class="p-btn-container gap-3" id="btn_other_profile" style="margin-bottom: 3rem;">
      <a href="#" class="btn btn-primary btn-profile">Follow</a>
    </div>
    <?php } ?>
    <!-- Buttons End -->

    <h3>Projects</h3>

    <!-- Gallery Start -->
    <div class="project-wrapper">
      <div class="row mt-4 justify-content-start">
        <?php
          // require_once '../models/Project_model.php';

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
          }

          $pr_model = new Project_model;
          $projects = $pr_model->get_projects($puid);
          foreach($projects as $project) {
            $puid = $project['author_id'];
            ?>
            <div class="col-lg-3 col-sm-4">
              <div class="card bg-dark mb-3 mx-auto">
                <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title"><?php echo $project['project_title'] ?></h5>
                  <p class="card-text desc" ><?php echo $project['description'] ?></p>
                  <a href="<?= BASE_URL; ?>/product/?puid=<?php echo $project['author_id'] ?>&proj_id=<?php echo $project['project_id'] ?>" class="btn btn-primary">Explore</a>
                </div>
              </div>
            </div>
          <?php
          }
        ?>
      </div>
    </div>
    <!-- Gallery End -->

  </div>
  <!-- Profile Wrapper End -->

</div>