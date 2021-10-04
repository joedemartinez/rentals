<!-- Add -->
<div class="modal fade" id="addnew" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>New Rental</b></h4>
            </div>
            <div class="modal-body flag">
              <form class="form-horizontal" method="POST" action="./process/Rentals.php">
                <div class="form-group">
                    <label for="client" class="col-sm-2 control-label">Client's Name</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="client_name" required="">
                        <option selected="" value="#">Select Option</option>
                        <?php
                          $sql =  "SELECT * FROM clients_table ORDER BY fullname ASC";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){ ?>
                            <option value="<?php echo $row['client_id'] ?>"><?php echo $row['fullname'] ?></option>
                          <?php }?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="vehicle" class="col-sm-2 control-label">Vehicle</label>

                    <div class="col-sm-9">
                      <select class="form-control" name="vehicle" required="">
                        <option selected="" value="#">Select Option</option>
                        <?php
                          $sql =  "SELECT * FROM vehicles ORDER BY vehicle_type ASC";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){ ?>
                            <option value="<?php echo $row['vehicle_id'] ?>"><?php echo $row['vehicle_type'].' -  '.$row['vehicle_brand'].' - Reg No :'. $row['vehicle_reg_no']?></option>
                          <?php }?>
                      </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="start" class="col-sm-2 control-label">Start Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" placeholder="Start Date" name="start_date" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="end" class="col-sm-2 control-label">End Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" placeholder="" name="end_date" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="payment" class="col-sm-2 control-label">Payment Date</label>

                    <div class="col-sm-9">
                      <input type="date" class="form-control" placeholder="" name="payment_date" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rate" class="col-sm-2 control-label">Rate</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" placeholder="Rate" min="0" name="rate" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bank" class="col-sm-2 control-label">Bank</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="Name of Bank"  name="bank" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="bank" class="col-sm-2 control-label">Bank Acc No.</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" placeholder="e.g 0098..."  name="account_no">
                    </div>
                </div>
                <!-- <hr> -->
                <!-- <label><u>Payment</u></label> -->
                <!-- <div class="form-group">
                    <label for="bank" class="col-sm-2 control-label">Opening Bal</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control"min="0" placeholder="e.g 2398..."  name="">
                    </div>
                </div> -->
               <!--  <div class="form-group">
                    <label for="bank" class="col-sm-2 control-label">First Payment</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control"min="0" placeholder="e.g 2398..."  name="">
                    </div>
                </div> -->
            </div>
            <div class="modal-footer">
              <button type="submit" title="Add Rental" class="btn btn-primary btn-flat" name="addRental"><i class="fa fa-save"></i> Add</button>
            <button type="button" title="Close" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- Add Payment -->
<div class="modal fade" id="apayment" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add Payment</b> - <strong class="clientName"></strong></h4>
            </div>
            <div class="modal-body flag">
              <form class="form-horizontal" method="POST" action="./process/Rentals.php">
                <div class="form-group">
                    <label for="vehicletype" class="col-sm-2 control-label">Vehicle Price</label>

                    <div class="col-sm-9">
                      <input type="text" name="rentalID" id="rentalID" style="display: none;">
                      <input type="text" class="form-control" placeholder="Corolla, Hilux, Picanto..." name="vehicle_price" id="vehicle_price" readonly="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="brand" class="col-sm-2 control-label">Payment</label>

                    <div class="col-sm-9">
                      <input type="number" class="form-control" placeholder="Enter Amnt" min="0" name="payment" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" title="Add Payment" class="btn btn-primary btn-flat" name="addPayment"><i class="fa fa-plus"></i> Add</button>
            <button type="button" title="Close" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>


<!-- show payments -->
<div class="modal fade" id="payment" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Payments</b></h4>
            </div>
            <div class="modal-body flag">
              <button type="button" id="printThis" class="dt-button buttons-print"><span>Print</span></button>
              <table id="printing" class="table table-bordered">
                  <thead>
                    <th>#</th>
                    <th>Date</th>
                    <th>Client</th>
                    <th>Payment</th>
                    <th>Cumm Amnt</th>
                    <th>Remaining Bal</th>
                    <th>Opening Bal</th>
                  </thead>
                  <tbody  class="payments">
                    
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>