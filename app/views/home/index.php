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
      $query = "SELECT * FROM project ORDER BY date_created DESC LIMIT $count";
      $result = $this->db->query($query);
      $projects = array();
      while ($row = mysqli_fetch_assoc($result)) {
          $projects[] = $row;
      }
      return $projects;
  }
}

$model = new Project_model;
$latest_projects = $model->get_latest(8);

?>

<div class="container">

  <!-- Start Carousel -->
  <section>
    <div id="myCarousel" class="carousel slide custom-carousel mt-4" data-bs-ride="carousel">

      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>

      <!-- Carousel Content -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="carousel-image-overlay"></div>
          <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="d-block w-100" alt="Image 1" />
          <div class="carousel-caption d-none d-md-block">
            <h5>Featured Content</h5>
            <p>
              Some representative placeholder content for the first slide.
            </p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="carousel-image-overlay"></div>
          <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="d-block w-100" alt="Image 2" />
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>
              Some representative placeholder content for the first slide.

            </p>
          </div>
        </div>
        <div class="carousel-item">
          <div class="carousel-image-overlay"></div>
          <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="d-block w-100" alt="Image 3" />
          <div class="carousel-caption d-none d-md-block">
            <h5>First slide label</h5>
            <p>
              Some representative placeholder content for the first slide.
            </p>
          </div>
        </div>
      </div>

      <!-- Controls Carousel -->
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
  </section>
  <!-- End Carousel -->

  <!-- Start Karya Baru -->
  <section>
    <h1 class="mt-3">Karya Baru</h1>

    <div class="card-wrapper row mt-4">
      <?php
      foreach ($latest_projects as $project) { ?>
        <div class="col-lg-3 col-sm-4">
        <div class="card bg-dark mb-3 mx-auto">
          <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5 class="card-title"><?php echo $project['project_title'] ?></h5>
            <p class="card-text"><?php echo $project['description'] ?></p>
            <a href="<?= BASE_URL; ?>/product/?puid=<?php echo $project['author_id'] ?>&proj_id=<?php echo $project['project_id'] ?>" class="btn btn-primary">Explore</a>
          </div>
        </div>
      </div>
      <?php
      }
      ?>
    </div>

  </section>
  <!-- End Karya Baru -->

</div>