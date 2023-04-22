<div class="modal fade" id="edit-food-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Edit Food</h5>
        <button type="button" class="btn-close" id="close-edit-e" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="food-edit-form" method="post">
            <div class="mb-3">
                <input type="hidden" name="fID" id="fID-e">
                <label class="form-label">Food Name</label>
                <input type="text" class="form-control" name="food_name" id="food_name-e" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Food Price</label>
                <input type="number" class="form-control" name="food_price" min="1" step="0.05" id="food_price-e" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="food-edit-message-modal" tabindex="-1" aria-hidden="true">
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