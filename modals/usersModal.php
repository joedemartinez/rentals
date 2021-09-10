<!-- Add -->
<div class="modal fade" id="addnew" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>New User</b></h4>
            </div>
            <div class="modal-body flag">
              <form class="form-horizontal" method="POST" action="./process/Users.php">
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
                    <label for="dob" class="col-sm-2 control-label">DoB</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" placeholder="DoB" name="dob" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneno" class="col-sm-2 control-label">Phone No</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Phone Number" name="contact" required  >
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-6 control-label">Default Password : Password </label>

                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" title="Add User" class="btn btn-primary btn-flat" name="addUser"><i class="fa fa-save"></i> Add</button>
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
              <form class="form-horizontal" method="POST" action="./process/Users.php">
                <div class="form-group">
                    <label for="fullname" class="col-sm-2 control-label">Fullname</label>

                    <div class="col-sm-9">
                      <input type="text" name="user" id="user" required="" style="display: none;">
                      <input type="text" class="form-control" placeholder="Fullname" name="fullname" id="fullname" autofocus="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Address" name="address" id="address" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="dob" class="col-sm-2 control-label">DoB</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" placeholder="DoB" name="dob" id="dob">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneno" class="col-sm-2 control-label">Phone No</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Phone Number" name="contact" id="contact" required  >
                    </div>
                </div>
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Username" name="username" id="username" required readonly="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" title="Add User" class="btn btn-primary btn-flat" name="editUser"><i class="fa fa-edit"></i> Update</button>
            <button type="button" title="Close" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>