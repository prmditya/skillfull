<div class="container container-edit">
  <div class="edit-wrapper mx-auto">

    <h1 class="edit-title mb-5 text-center">Finishing Up</h1>

    <?php Flasher::flash(); ?>

     <!-- Form Input -->
     <form action="<?= BASE_URL; ?>/register/confirmEdit" method="post">
      <div class="my-3">
        <label class="mb-1">Profile Pic (50x50 px recommended):</label>
        <input type="file" class="form-control" id="InputFile" name="profile-pic" />
      </div>
      <div class="my-3">
        <label class="mb-1">Full Name :</label>
        <input type="text" class="form-control" id="InputFullName" name="full-name" />
      </div>
      <div class="my-3">
        <label class="mb-1">Nickname :</label>
        <input required type="text" class="form-control" id="InputNickName" name="nick-name" />
      </div>
      <div class="my-3">
        <label class="mb-1">NIM :</label>
        <input required type="number" class="form-control" id="InputNIM" name="nim" />
      </div>
      <div class="my-3">
        <label class="mb-1">Year :</label>
        <input required type="number" step="1" class="form-control" id="inputYear" name="year" />
      </div>
      <div class="my-3">
        <label class="mb-1">Address :</label>
        <input type="text" class="form-control" id="InputAddress" name="address" />
      </div>
      <div class="mb-3">
        <label class="mb-1">Major :</label>
        <select required name="major" class="form-control multivalue-input" aria-label="Default select example">
          <option value="-1" disabled>Select Major</option>
          <option value="0">Informatics Engineering</option>
          <option value="1">Computer Engineering</option>
          <option value="2">Computer Science</option>
          <option value="3">Information Technology</option>
          <option value="4">Information System</option>
          <option value="5">Education of Information Technology</option>
        </select>
      </div>
      <div class="my-3">
        <label class="mb-1">Bio :</label>
        <input type="textarea" class="form-control" id="InputBio" name="bio" />
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-edit btn-block" name="finish">Done</button>
      </div>
    </form>
    <!-- End Form Input -->
  </div>
</div>