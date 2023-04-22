<div class="modal fade" id="delete-menu-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white">Delete Menu</h5>
        <button type="button" class="btn-close" id="close-delete" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <div class="h5 pb-4">Are you sure you want to delete this menu?</div>
        <form id="menu-edit-form" method="post">
            <div class="mb-3">
                <input type="hidden" name="mID" id="mID-d">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger delete-data">Delete</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>