<div class="container container-profile">

  <h2 class="profile-name my-5" id="user_name">mahyooew_</h2>

  <!-- Profile Wrapper Start -->
  <div class="container profile-wrapper">

    <!-- Profile Head Start -->
    <div class="row profile-head">
      <div class="col-3" class="profile-pic">
        <img src="<?= BASE_URL; ?>/img/default_profile.jpg" alt="profile picture">
      </div>
      <div class="col-3 text-center my-auto">
        <p id="project_count" class="profile-nums">3</p>
        <p>projects</p>
      </div>
      <div class="col-3 text-center my-auto">
        <p id="followers" class="profile-nums">10</>
        <p>followers</p>
      </div>
      <div class="col-3 text-center my-auto">
        <p id="following" class="profile-nums">10</p>
        <p>following</p>
      </div>
    </div>
    <!-- Profile Head End -->

    <!-- Bio Start -->
    <div class="container-bio">
      <p id="name_nim">225150301111029</p>
      <p id="major">Computer Engineering</p>
      <p id="address">Malang</p>
    </div>
    <!-- Bio End -->

    <!-- Buttons Start -->
    <div class="btn-container gap-3" id="btn_self_profile">
      <a href="<?= BASE_URL; ?>/profile/edit" class="btn btn-primary btn-profile">Edit Profile</a>
      <a href="#" class="btn btn-primary btn-profile">Share Project</a>
    </div>
    <!-- <div class="p-btn-container" id="btn_other_profile">
            <a href="#" class="btn btn-primary btn-profile">Follow</a>
            <a href="#" class="btn btn-primary btn-profile">Message</a>
        </div> -->
    <!-- Buttons End -->

    <h3>Projects</h3>

    <!-- Gallery Start -->
    <div class="project-wrapper">
      <div class="row mt-4 justify-content-start">
        <div class="col-lg-3 col-sm-4">
          <div class="card bg-dark mb-3 mx-auto">
            <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Title Karya</h5>
              <p class="card-text">Some quick example text to ...</p>
              <a href="<?= BASE_URL; ?>/product" class="btn btn-primary">Explore</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-4">
          <div class="card bg-dark mb-3 mx-auto">
            <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Title Karya</h5>
              <p class="card-text">Some quick example text to ...</p>
              <a href="<?= BASE_URL; ?>/product" class="btn btn-primary">Explore</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-4">
          <div class="card bg-dark mb-3 mx-auto">
            <img src="<?= BASE_URL; ?>/img/placeholder.jpg" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title">Title Karya</h5>
              <p class="card-text">Some quick example text to ...</p>
              <a href="<?= BASE_URL; ?>/product" class="btn btn-primary">Explore</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Gallery End -->

  </div>
  <!-- Profile Wrapper End -->

</div>