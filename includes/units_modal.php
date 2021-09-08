<!-- Add -->
<div class="modal fade" id="addnew" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Add Unit</b></h4>
          	</div>
          	<div class="modal-body flag">
            	<form class="form-horizontal" method="POST" action="./process/unit_add.php">
          		  <div class="form-group">
                  	<label for="name" class="col-sm-2 control-label">Name</label>

                  	<div class="col-sm-9">
                    	<input type="text" class="form-control" placeholder="Name of Unit" id="unit_name" name="unit_name" required  autofocus>
                  	</div>
                </div>
          	</div>
          	<div class="modal-footer">
              <button type="submit" title="Add Unit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Add</button>
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
            	<h4 class="modal-title"><b><span> Edit Unit</span></b></h4>
          	</div>
          	<div class="modal-body flag">
            	<form class="form-horizontal" method="POST" action="./process/unit_edit.php">
            		<input type="hidden" class="unit_id" name="id">
                <div class="form-group">
                    <label for="unit_edit" class="col-sm-2 control-label">Unit</label>

                    <div class="col-sm-9"> 
                      <div class="unit">
                        <input type="text" class="form-control" id="unit_edit" name="unit" required>
                      </div>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	</form>
          	</div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span>Delete Unit</span></b></h4>
          	</div>
          	<div class="modal-body flag">
            	<form class="form-horizontal" method="POST" action="./process/unit_delete.php">
            		<input type="hidden" class="unit_id" name="id">
            		<div class="text-center">
	                	<h2 class="unit_name bold"></h2>
	            	</div>
          	</div>
          	<div class="modal-footer">
              <button type="submit" class="btn btn-danger btn-flat" name="delete" onclick="return confirm('Do you want to delete this record?')"><i class="fa fa-trash"></i> Delete</button>
            	<button type="button" class="btn btn-default btn-flat" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            	</form>
          	</div>
        </div>
    </div>
</div>


<!-- No of staff per unit -->
<div class="modal fade" id="unitStaff" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b><span class="unit_name"></span> Staffs</b></h4>
          	</div>
				<div class="modal-body flag">
				<!-- <button type="button" id="printThis" class="dt-button buttons-print"><span>Print</span></button> -->
					<table id="unitStaff_id" class="table table-bordered">
						<thead>
						<th>#</th>
						<th>Staff ID</th>
						<th>Fullname</th>
						</thead>
						<tbody  class="unitStaff_id">
							
						</tbody>
					</table>
				</div>
        </div>
    </div>
</div>


     