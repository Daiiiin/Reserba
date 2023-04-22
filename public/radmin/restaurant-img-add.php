<div class="modal fade" id="add-img-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Add Image</h5>
        <button type="button" class="btn-close" id="close-img-modal-a" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="add-img-form" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" accept="image/png, image/gif, image/jpeg" name="imgfile">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Image</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="img-add-message-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title col-12 text-center"><i class="fa-solid fa-circle-check fa-3x" style="color:white;"></i></h5>
      </div>
      <div class="body-add-message lead text-center pt-2 pb-2"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>