  <!-- Modal Update -->
  <div class="modal fade" id="myModalUpdate" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Vechicle Schedule</h4>
        </div>
        <form  action="<?php echo site_url(); ?>save-schedules.html" method="post" enctype='multipart/form-data' accept-charset="utf-8" id="frm-create">
          <div class="panel-body" id="update-info">
            
          </div>
          <div class="modal-footer">
            <div class="col-md-12">
            <button type="submit" name="btnSave" id="btnSave" class="btn btn-primary" value="Save"><span class="fa fa-save"></span> Save</button>
            <button type="button" class="btn btn-danger" value="Close" data-dismiss="modal"><span class="fa fa-times-circle"></span> Close</button>
            </div>         
          </div>
        </form>
        </div>
      </div>      
    </div>
  </div>