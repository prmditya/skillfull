<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="<?= BASE_URL; ?>/home"><img src="<?= BASE_URL; ?>/img/logo.png" alt="Skillfull" height="40" /></a>

    <!-- Toggle Component -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- End Toggle Component -->

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="d-flex mx-auto" action="<?= BASE_URL; ?>/search" method="post">
        <div class="input-group">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="searchInput" />
          <button class="btn btn-search" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <a class="btn nav-item btn-nav-icon btn-upload text-start" href="<?= BASE_URL; ?>/upload">
          <i class="bi bi-cloud-arrow-up"><span class="upload-btn"></span></i>
        </a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?= BASE_URL; ?>/profile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="rounded-circle" src="<?= BASE_URL; ?>/img/default_profile.jpg" width="40" height="40" />
            <span class="profile-name"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="<?= BASE_URL; ?>/profile/?puid=<?php echo $_SESSION['user_id'] ?>">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?= BASE_URL; ?>/home/logout">Log-Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- End Navbar Content -->

  </div>

</nav>