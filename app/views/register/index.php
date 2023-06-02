<div class="container container-register">
  <div class="register-wrapper mx-auto">

    <!-- Register Image -->
    <div class="register-img-wrapper mb-3">
      <img src="<?= BASE_URL; ?>/img/logo.png" alt="" />
    </div>

    <h1 class="mb-4 text-center" style="font-weight: bold;">Register Page</h1>

    <?php Flasher::flash(); ?>

    <!-- Form Input -->
    <form action=" <?= BASE_URL; ?>/register/registerUser" method="post">
      <div class="my-3">
        <input type="number" class="form-control" id="InputNIM" name="nim" placeholder="NIM" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" id="ConfirmPassword" name="confirmPass" placeholder="Confirm Password" required>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-register">Register</button>
      </div>
      <div class="mt-3 text-center">
        <p>Have an account? <a href="<?= BASE_URL; ?>/login"> Log-In </a></p>
      </div>
    </form>

  </div>
</div>