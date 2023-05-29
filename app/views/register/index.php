<div class="container">
  <div class="login-wrapper">
    <h1>Register Page</h1>

    <form action="<?= BASE_URL; ?>/register/registerUser" method="post">
      <div class="form-group mb-3">
        <label for="NIM">NIM</label>
        <input type="text" class="form-control" id="InputNIM" name="nim">
      </div>
      <div class="form-group mb-3">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="InputPassword" name="password">
      </div>
      <div class="form-group mb-3">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" class="form-control" id="ConfirmPassword" name="confirmPass">
      </div>
      <div class="form-group mb-3">
        <p>Have an account? <a href="<?= BASE_URL ?>/login"> Log-In </a></p>
      </div>
      <button type="submit" class="btn btn-primary btn-login">Register</button>
    </form>

  </div>
</div>