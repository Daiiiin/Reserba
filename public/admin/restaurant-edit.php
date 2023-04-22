<div class="modal fade" id="edit-restaurant-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="rID">Edit restaurant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-edit-modal"></button>
      </div>
      <div class="modal-body">
        <form id="edit-restaurant-form" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Restaurant Name</label> 
                <input type="text" class="form-control" name="name" id="name" minlength="3" maxlength="50" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" style="height: 100px;"  name="description" id="description" minlength="5" maxlength="250" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" minlength="5" maxlength="100" required>
            </div>
            <div class="mb-3">
                <label class="form-label">No. of Tables</label>
                <input type="number" class="form-control" min="1" name="tables" id="tables" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Pax Capacity</label>
                <input type="number" class="form-control" min="1" name="paxcap" id="paxcap" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control pb-3" type="file" id="formFile" accept="image/png, image/gif, image/jpeg" name="myfile">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning text-white">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Message Modal -->
<div class="modal fade" id="restaurant-edit-message-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title col-12 text-center"><i class="fa-solid fa-circle-check fa-3x" style="color:white;"></i></h5>
      </div>
      <div class="body-edit-message lead text-center pt-2 pb-2"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>