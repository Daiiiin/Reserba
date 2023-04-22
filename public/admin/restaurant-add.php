<div class="modal fade" id="new-restaurant-modal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white">Add new restaurant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
      </div>
      <div class="modal-body">
        <form id="new-restaurant-form" method="post" enctype="multipart/form-data">
                                
            <div class="mb-3">
                <label class="form-label">Restaurant Name</label>
                <input type="text" class="form-control" name="name" minlength="3" maxlength="50" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" minlength="5" maxlength="250" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" minlength="5" maxlength="100" required>
            </div>
            <div class="mb-3">
                <label class="form-label">No. of Tables</label>
                <input type="number" class="form-control" min="1" name="tables" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Pax Capacity</label>
                <input type="number" class="form-control" min="1" name="paxcap" required>
            </div>

            <!-- <label class="form-label">Open & Close Time</label>
            <div class="input-group mb-1">
              <span class="input-group-text" style="width: 8em">Monday</span>
              <select class="form-select" name="status1">
                <option value="1">Open</option>
                <option value="2">Close</option>
              </select>
              <input type="time" class="form-control" name="opentime1">
              <input type="time" class="form-control" name="closetime1">
            </div>
            <div class="input-group mb-1">
            <span class="input-group-text" style="width: 8em">Tuesday</span>
              <select class="form-select" name="status2">
                <option value="1">Open</option>
                <option value="2">Close</option>
              </select>
              <input type="time" class="form-control" name="opentime2">
              <input type="time" class="form-control" name="closetime2">
            </div>
            <div class="input-group mb-1">
              <span class="input-group-text" style="width: 8em">Wednesday</span>
              <select class="form-select" name="status3">
                <option value="1">Open</option>
                <option value="2">Close</option>
              </select>
              <input type="time" class="form-control" name="opentime3">
              <input type="time" class="form-control" name="closetime3">
            </div>
            <div class="input-group mb-1">
              <span class="input-group-text" style="width: 8em">Thursday</span>
              <select class="form-select" name="status4">
                <option value="1">Open</option>
                <option value="2">Close</option>
              </select>
              <input type="time" class="form-control" name="opentime4">
              <input type="time" class="form-control" name="closetime4">
            </div>
            <div class="input-group mb-1">
              <span class="input-group-text" style="width: 8em">Friday</span>
              <select class="form-select" name="status5">
                <option value="1">Open</option>
                <option value="2">Close</option>
              </select>
              <input type="time" class="form-control" name="opentime5">
              <input type="time" class="form-control" name="closetime5">
            </div>
            <div class="input-group mb-1">
              <span class="input-group-text" style="width: 8em">Saturday</span>
              <select class="form-select" name="status6">
                <option value="1">Open</option>
                <option value="2">Close</option>
              </select>
              <input type="time" class="form-control" name="opentime6">
              <input type="time" class="form-control" name="closetime6">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" style="width: 8em">Sunday</span>
              <select class="form-select" name="status7">
                <option value="1">Open</option>
                <option value="2">Close</option>
              </select>
              <input type="time" class="form-control" name="opentime7">
              <input type="time" class="form-control" name="closetime7">
            </div> -->
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile" accept="image/png, image/gif, image/jpeg" name="myfile" required>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="restaurant-add-message-modal" tabindex="-1" aria-hidden="true">
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