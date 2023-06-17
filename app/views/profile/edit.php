<div class="container container-edit">
  <div class="edit-wrapper mx-auto">

    <h1 class="edit-title mb-5 text-center">Edit Profile.</h1>

    <?php Flasher::flash(); ?>

    <!-- Form Input -->
    <form action="<?= BASE_URL; ?>/profile/confirmEdit" method="post">
      <div class="my-3">
        <label class="mb-1">Profile Pic (Use 50x50 px for the best):</label>
        <input type="file" class="form-control" id="InputFile" name="file" />
      </div>
      <div class="my-3">
        <label class="mb-1">Username :</label>
        <input type="text" class="form-control" id="InputUsername" name="title" />
      </div>
      <div class="my-3">
        <label class="mb-1">NIM :</label>
        <input type="text" class="form-control" id="InputNIM" name="nim" />
      </div>
      <div class="my-3">
        <label class="mb-1">Address :</label>
        <input type="text" class="form-control" id="InputAddress" name="address" />
      </div>
      <div class="mb-3">
        <label class="mb-1">Major :</label>
        <select class="form-control multivalue-input" aria-label="Default select example">
          <option selected>Select Major</option>
          <option value="1">Computer Engineering</option>
          <option value="2">Computer Science</option>
          <option value="3">Information Technology</option>
          <option value="4">Information System</option>
          <option value="5">Pendidikan Teknologi Informasi</option>
        </select>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-edit btn-block" name="edit">Apply Edit</button>
      </div>
    </form>
    <!-- End Form Input -->
  </div>
</div>