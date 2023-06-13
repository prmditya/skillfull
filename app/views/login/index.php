<div class="container container-login">
  <div class="login-wrapper mx-auto">

    <!-- Login Image -->
    <div class="login-img-wrapper">
      <img src="<?= BASE_URL; ?>/img/login_wrapper_background.png" width="500" alt="" />
    </div>

    <h1 class="mb-4 text-center">Login Page</h1>

    <?php Flasher::flash(); ?>

    <!-- Form Input -->
    <form action="<?= BASE_URL; ?>/login/loginUser" method="post">
      <div class="my-3">
        <input type="number" class="form-control" id="InputNIM" placeholder="NIM" name="nim" />
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" id="InputPassword" placeholder="password" name="password" />
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-login btn-block" name="login">
          Login
        </button>
      </div>
      <p class="mt-3 text-center">
        Don't have any account? <a href="<?= BASE_URL; ?>/register"> Sign-Up </a>
      </p>
    </form>

  </div>
</div>