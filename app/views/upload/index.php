<div class="container container-upload">
  <div class="upload-wrapper mx-auto">

    <?php Flasher::flash(); ?>

    <!-- Form Input -->
    <form action="<?= BASE_URL; ?>/upload/uploadProduct" method="post">
      <div class="my-3">
        <input type="file" class="form-control" id="InputFile"  name="file" />
      </div>
      <div class="my-3">
        <label class="mb-1">Title :</label>
        <input type="text" class="form-control" id="InputTitle"  name="title" />
      </div>
      <div class="mb-3">
        <label class="mb-1">Description :</label>
        <textarea type="text" class="form-control" id="InputDesc"  name="description" cols="6"></textarea>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-login btn-block" name="upload">Upload</button>
      </div>
    </form>

  </div>
</div>