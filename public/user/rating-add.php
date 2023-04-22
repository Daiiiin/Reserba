<div class="modal fade" id="add-rating-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title text-white">Leave a rating!</h5>
        <button type="button" class="btn-close" id="close-add-r" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="rating-add-form" method="post">
            <div class="mb-3">
                <input type="hidden" name="rID" id="rID-r">
                <label class="form-label">Rating</label>
                <input type="number" class="form-control" name="rating" id="rating" min="1" max="5" step="0.1" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Rating</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="rating-add-message-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title col-12 text-center"><i class="fa-solid fa-circle-check fa-3x" style="color:white;"></i></h5>
      </div>
      <div class="body-add-message lead text-center pt-2 pb-2"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>