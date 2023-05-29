<div class="container">
  <div class="login-wrapper">
    <h1>Login Page</h1>

    <form>
      <div class="mb-3">
        <label for="InputNIM" class="input-nim">NIM</label>
        <input type="number" class="form-control" id="InputNIM">
      </div>
      <div class="mb-3">
        <label for="InputPassword" class="input-password">Password</label>
        <input type="password" class="form-control" id="InputPassword">
      </div>
      <div class="mb-3">
        <p>Don't have any account? <a href="<?= BASE_URL ?>/register"> Sign-Up </a></p>
      </div>
      <button type="submit" class="btn btn-primary btn-login">Login</button>
    </form>
  </div>
</div>