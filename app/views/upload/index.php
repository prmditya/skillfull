<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

<div class="container container-upload">
  <div class="upload-wrapper mx-auto">
    <h1 class="upload-title mb-5 text-center">Upload.</h1>
    <?php Flasher::flash(); ?>

    <!-- Form Input -->
    <form action="<?= BASE_URL; ?>/upload/uploadProduct" method="post">
      <div class="my-3">
        <input type="file" class="form-control" id="InputFile" name="file" />
      </div>
      <div class="my-3">
        <label class="mb-1">Title :</label>
        <input type="text" class="form-control" id="InputTitle" name="title" />
      </div>
      <div class="mb-3">
        <label class="mb-1">Description :</label>
        <textarea type="text" class="form-control" id="InputDesc" name="desc" cols="6"></textarea>
      </div>
      <div class="mb-3">
        <label class="mb-1">Tags :</label>
        <select class="form-control multivalue-input" aria-label="Default select example" multiple name="tags[]">
          <option selected>Select Tag</option>
          <option value="0">Game</option>
          <option value="1">App</option>
          <option value="2">Mobile</option>
          <option value="3">2D</option>
          <option value="4">3D</option>
          <option value="5">Art</option>
        </select>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-login btn-block" name="upload">Upload</button>
      </div>
    </form>

  </div>
</div>