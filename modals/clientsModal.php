<!-- Add -->
<div class="modal fade" id="addnew" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>New Client</b></h4>
            </div>
            <div class="modal-body flag">
              <form class="form-horizontal" method="POST" action="./process/Clients.php">
                <div class="form-group">
                    <label for="fullname" class="col-sm-2 control-label">Fullname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Fullname" name="fullname" autofocus="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Address" name="address" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneno" class="col-sm-2 control-label">Phone No</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Phone Number" name="contact" required  >
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Email Address" name="email" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_type" class="col-sm-2 control-label">ID Type</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="id_type">
                        <option selected="" value="">Select ID</option>
                        <option value="Ghana Card">Driver's License / Ghana Card</option>
                        <option value="Voter's Card">Voter's Card</option>
                        <option value="NHIS Card">NHIS Card</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_number" class="col-sm-2 control-label">ID Number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="ID Number" name="id_number">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" title="Add Client" class="btn btn-primary btn-flat" name="addClient"><i class="fa fa-save"></i> Add</button>
            <button type="button" title="Close" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit -->
<div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Client</b></h4>
            </div>
            <div class="modal-body flag">
              <form class="form-horizontal" method="POST" action="./process/Clients.php">
                <div class="form-group">
                    <label for="fullname" class="col-sm-2 control-label">Fullname</label>

                    <div class="col-sm-9">
                      <input type="text" required="" readonly="" id="client" name="client" style="display: none;">
                      <input type="text" class="form-control" placeholder="Fullname" id="fullname" name="fullname" autofocus="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Address" id="address" name="address" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneno" class="col-sm-2 control-label">Phone No</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Phone Number" id="contact" name="contact" required  >
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Email Address" id="email" name="email" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_type" class="col-sm-2 control-label">ID Type</label>

                    <div class="col-sm-9">
                      <select class="form-control" id="id_type" name="id_type">
                        <option selected="" value="">Select ID</option>
                        <option value="Ghana Card">Driver's License / Ghana Card</option>
                        <option value="Voter's Card">Voter's Card</option>
                        <option value="NHIS Card">NHIS Card</option>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="id_number" class="col-sm-2 control-label">ID Number</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="ID Number" id="id_number" name="id_number">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" title="Update Details" class="btn btn-primary btn-flat" name="editClient"><i class="fa fa-edit"></i> Update</button>
            <button type="button" title="Close" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="deactivation" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deactivation</b></h4>
            </div>
            <div class="modal-body flag">
              <form class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-sm-12 control-label">Reason</label>

                    <div class="col-sm-12">
                      <input type="text" name="deID" id="deID" style="display: none;">
                      <textarea class="form-control" placeholder="Reason for Deactivation" name="deactivation" id="reason" required="" rows="6" ></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" title="Deactivate" class="btn btn-primary btn-flat deactivation" name="deactivation"><i class="fa fa-toggle-off"></i> Deactivate</button>
            <button type="button" title="Close" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>