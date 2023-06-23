<?php

class Project_details {
  private $db;

  public function __construct() {
    $this->db = new Database;
  }

  public function details($proj_id, $uid) {
    $query = "SELECT * FROM project WHERE project_id = '$proj_id';";
    $result = $this->db->query($query);
    $details = mysqli_fetch_assoc($result);
    $query = "SELECT * FROM profile WHERE user_id = '$uid';";
    $result = $this->db->query($query);
    $author_name = mysqli_fetch_assoc($result)['full_name'];
    $details['author_name'] = $author_name;
    return $details;
  }

  public function tags($proj_id) {
    $query = "SELECT category_id FROM tag WHERE project_id = '$proj_id';";
    $result = $this->db->query($query);
    $tags = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['category_id'];
      $result2 = $this->db->query("SELECT * FROM project_categories WHERE category_id = $id;");
      
      $tags[] = mysqli_fetch_assoc($result2)['category_name'];
    }
    return $tags;
  }

  public function reviews($proj_id) {
    $query = "SELECT * FROM comment WHERE project_id = $proj_id";
    $result = $this->db->query($query);
    $reviews = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $uid = $row['user_id'];
      $query = "SELECT * FROM profile WHERE user_id = '$uid'";
      $result2 = $this->db->query($query);
      $row['commenter_name'] = mysqli_fetch_assoc($result2)['nickname'];
      $reviews[] = $row;
    }
    return $reviews;
  }

  public function rating($proj_id) {
    $query = "SELECT AVG(rating) as avg_rating FROM comment WHERE project_id = $proj_id";
    $result = $this->db->query($query);
    $rating = mysqli_fetch_assoc($result)['avg_rating'];
    return $rating;
  }
}

$url_components = parse_url($_SERVER['REQUEST_URI']);
parse_str($url_components['query'], $params); 
$puid = $params['puid'];
$proj_id = $params['proj_id'];

$product_model = new Project_details;
$details = $product_model->details($proj_id, $puid);
$tags = $product_model->tags($proj_id);
$reviews = $product_model->reviews($proj_id);
$rating = $product_model->rating($proj_id);
$_SESSION['viewed_proj_id'] = $proj_id;
$_SESSION['last_uri'] = $_SERVER['REQUEST_URI'];

?>

<div class="container justify-content-center">
  <div class="product-page-wrapper">

    <div class="row content ">
      <!-- Left Section Start -->
      <section class="col-lg-5 left-section">
        <div id="productThumbnail" class="carousel-thumbnail carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="d-block w-100">
            </div>
            <div class="carousel-item">
              <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#productThumbnail" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#productThumbnail" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <div class="reviews my-3">
          <h4>Reviews</h4>
          <div class="reviews-wrapper">
            <?php
            foreach ($reviews as $review) {
              ?>
              <div class="review-entry">
                <div class="rating">
                  <?php
                    echo $review['commenter_name']." ";
                    $i = 0;
                    while ($i < 5) {
                      if ($i < $review['rating']) {
                        echo "<i class='bi-star-fill'></i>";
                      }
                      else {
                        echo "<i class='bi-star'></i>";
                      }
                      $i++;
                    }
                  ?>
                </div>
                <div class="review-txt d-flex mt-2 gap-2">
                  <img src="<?= BASE_URL; ?>/img/default_profile.jpg" class="rounded-circle" alt="profile picture" width="40" height="40">
                  <p><?php echo $review['text'] ?></p>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </section>
      <!-- Left Section End -->

      <!-- Right Section Start -->
      <section class="col-lg-7 right-section bg-darker">
        <h2>
          <?php 
            echo $details['project_title']
          ?>
          </h2>
        <!-- Author text -->
        <h3><a href="<?= BASE_URL; ?>/profile/?puid=<?php echo $puid ?>">by: 
          <?php
            echo $details['author_name'];
          ?>
          </a>
        </h3>

        <div class="rating">
          <?php
          echo number_format((float)$rating, 1, '.')." ";
          $i = 0;
          while ($i < 5) {
            if ($i < $rating) {
              echo "<i class='bi-star-fill'></i>";
            }
            else {
              echo "<i class='bi-star'></i>";
            }
            $i++;
          }
          ?>
        </div>
        <div class="tags-product mt-3">
          <ul class="my-auto">
            Category :
            <?php
            foreach($tags as $tag) {
              ?>
                <li><?php echo $tag ?>, </li>
              <?php
            } 
            ?>
          </ul>
        </div>
        <a href="<?= BASE_URL; ?>/download/id" class="btn btn-primary my-3">Download ZIP</a>
        <div class="about-product mb-3">
          <h4>About</h4>
          <p>
            <?php
             echo $details['description'];
            ?>
          </p>
        </div>
        <div class="review-form">
          <h4>Your Review</h4>
          <form action="<?= BASE_URL; ?>/product/submitReview" method="post">
            <div class="my-3 d-flex align-items-center gap-2">
              <i class="bi-star-fill"></i>
              <select class="rating-input form-control multivalue-input text-center" aria-label="Default select example" name="rating">
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
            <div class="my-3">
              <textarea type="text" class="form-control" id="InputDesc" placeholder="Insert your Description here ..." name="text"></textarea>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary btn-login btn-block" name="upload">Submit</button>
            </div>
          </form>
        </div>
      </section>
      <!-- Right Section End -->
    </div>

  </div>
</div>