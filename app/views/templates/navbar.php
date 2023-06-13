<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

  <div class="container">

    <a class="navbar-brand" href="<?= BASE_URL; ?>/home"><img src="<?= BASE_URL; ?>/img/logo.png" alt="Skillfull" height="40" /></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

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
        <button class="btn nav-item btn-nav-icon text-start">
          <i class="bi bi-cloud-arrow-up"><span class="create-btn"></span></i>
        </button>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="rounded-circle" src="<?= BASE_URL; ?>/img/default_profile.jpg" width="40" />
            <span class="profile-name"></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?= BASE_URL; ?>/home/logout">Log-Out</a></li>
          </ul>
        </li>
      </ul>
    </div>

  </div>

</nav>