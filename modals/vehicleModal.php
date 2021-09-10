<!-- Add -->
<div class="modal fade" id="addnew" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>New Vehicle</b></h4>
            </div>
            <div class="modal-body flag">
              <form class="form-horizontal" method="POST" action="./process/Vehicles.php">
                <div class="form-group">
                    <label for="vehicletype" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Corolla, Hilux, Picanto..." name="vehicle_type" autofocus="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="brand" class="col-sm-2 control-label">Brand</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="e.g Toyata, Nissan, Hyundai..." name="vehicle_brand" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reg_no" class="col-sm-2 control-label">Reg. No</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="e.g ..." name="vehicle_reg_no" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Price</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="240000" name="vehicle_price" required  >
                    </div>
                </div>
                <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Color</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="e.g Grey, White" name="vehicle_color" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="location" class="col-sm-2 control-label">Location</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="e.g New York, Whitehouse" name="vehicle_location" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="insurance" class="col-sm-2 control-label">Insurance Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" placeholder="" name="vehicle_insurance_date" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" title="Add Vehicle" class="btn btn-primary btn-flat" name="addVehicle"><i class="fa fa-save"></i> Add</button>
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
              <h4 class="modal-title"><b>Edit Vehicle</b></h4>
            </div>
            <div class="modal-body flag">
              <form class="form-horizontal" method="POST" action="./process/Vehicles.php">
                <div class="form-group">
                    <label for="vehicletype" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" name="vehicle" id="vehicle" style="display: none;">
                      <input type="text" class="form-control" placeholder="Corolla, Hilux, Picanto..." name="vehicle_type" id="vehicle_type" autofocus="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="brand" class="col-sm-2 control-label">Brand</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="e.g Toyata, Nissan, Hyundai..." name="vehicle_brand" id="vehicle_brand" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="reg_no" class="col-sm-2 control-label">Reg. No</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="e.g ..." name="vehicle_reg_no" id="vehicle_reg_no" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Price</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="240000" name="vehicle_price" id="vehicle_price" required  >
                    </div>
                </div>
                <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Color</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="e.g Grey, White" name="vehicle_color" id="vehicle_color" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="location" class="col-sm-2 control-label">Location</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="e.g New York, Whitehouse" name="vehicle_location" id="vehicle_location" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="insurance" class="col-sm-2 control-label">Insurance Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" placeholder="" name="vehicle_insurance_date" id="vehicle_insurance_date" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" title="Update Vehicle" class="btn btn-primary btn-flat" name="editVehicle"><i class="fa fa-edit"></i> Update</button>
            <button type="button" title="Close" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>