<div class="container">
  <div class="login-wrapper">
    <h1>Register Page</h1>

    <form>
      <div class="mb-3">
        <label for="InputEmail" class="input-email">Email</label>
        <input type="nim" class="form-control" id="InputEmail">
      </div>
      <div class="mb-3">
        <label for="InputNIM" class="input-nim">NIM</label>
        <input type="nim" class="form-control" id="InputNIM">
      </div>
      <div class="mb-3">
        <label for="InputPassword" class="input-password">Password</label>
        <input type="password" class="form-control" id="InputPassword">
      </div>
      <div class="mb-3">
        <p>Have an account? <a href="<?= BASE_URL ?>/login"> Log-In </a></p>
      </div>
      <button type="submit" class="btn btn-primary btn-login">Register</button>
    </form>
  </div>
</div>