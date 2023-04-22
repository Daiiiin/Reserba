<div class="modal fade" id="edit-menu-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Edit Menu</h5>
        <button type="button" class="btn-close" id="close-edit" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="menu-edit-form" method="post">
            <div class="mb-3">
                <input type="hidden" name="mID" id="mID">
                <label class="form-label">Menu Name</label>
                <input type="text" class="form-control" name="menu_name" id="menu_name">
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