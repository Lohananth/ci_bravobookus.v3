  <!-- Modal Add -->
  <div class="modal fade" id="myModalAdd" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Select2 and Bootstap Toggle</h4>
        </div>
        <form  action="<?php echo site_url(); ?>save-schedules.html" method="post" enctype='multipart/form-data' accept-charset="utf-8" id="frm-create">
          <div class="panel-body">
            <div class="row">
              <div class="form-group"><!--Origin-->
                <div class="col-md-6">
                  <label for="origin">Origin(From)<span><b>*</b></span></label>
                  <select data-plugin-selectTwo name="origin" id="origin" class="form-control">
                    <optgroup label="Select Origin">          
                    <?php
                      foreach ($origins as $origin) {
                      ?>
                        <option value='<?php echo $origin['id']; ?>'><?php echo $origin['origin']; ?></option>
                      <?php
                      }
                    ?>  
                    </optgroup>
                  </select>
                </div>
                <div class="col-md-6"><!--Destination-->
                  <label for="destination">Destination(To)<span><b>*</b></span></label>
                  <select data-plugin-selectTwo name="destination" id="destination" class="form-control">
                    <optgroup label="Select OrigiDestinationn">
                    <?php
                      foreach ($origins as $origin) {
                      ?>
                        <option value='<?php echo $origin['id']; ?>'><?php echo $origin['origin']; ?></option>
                      <?php
                      }
                    ?>                    
                    </optgroup>
                  </select>           
                </div>
              </div>  
              <div class="form-group"><!--Vehicle Name-->
                <div class="col-md-12">
                  <label for="Destination">Vehicle Name<span><b>*</b></span></label>
                  <select data-plugin-selectTwo name="v_id" id="v_id" class="form-control">
                    <optgroup label="Select Vehicle Name">      
                    <?php
                      foreach ($vehicles as $vehicle) {
                      ?>
                        <option value='<?php echo $vehicle['v_id']; ?>'><?php echo $vehicle['vehicle_name']; ?></option>
                      <?php
                      }
                    ?>                    
                    </optgroup>
                  </select>           
                </div>
              </div>  
              <div class="form-group">
                <div class="col-md-4">
                  <label for="local_price">Local Price<span><b>*</b></span></label>
                  <input type="text" name="local_price" id="local_price" class="form-control">            
                </div>
                <div class="col-md-4">
                  <label for="foreigner_price">Foreign Price<span><b>*</b></span></label>
                  <input type="text" name="foreigner_price" id="foreigner_price" class="form-control">          
                </div>
                <div class="col-md-4">
                  <label for="departure_time">Departure Time<span><b>*</b></span></label>
                  <select data-plugin-selectTwo name="departure_time" id="departure_time" class="form-control">
                    <optgroup label="Select Origi">
                    <?php
                      foreach ($dptimes as $dptime) {
                      ?>
                        <option value='<?php echo $dptime['id']; ?>'><?php echo $dptime['departure_time']; ?></option>
                      <?php
                      }
                    ?>                  
                    </optgroup>
                  </select>           
                </div>
              </div>  
              <div class="form-group"><!--Travel Duration-->
                <div class="col-md-6">
                  <label for="travel_duration">Travel Duration<span><b>*</b></span></label>
                  <input type="text" name="travel_duration" id="travel_duration" class="form-control">
                </div>
                <div class="col-md-6 checkbox" style="padding-top: 0px; margin-top:15px;">
                  <label for="origin">Active/Block&nbsp;</label>
                  <input type="checkbox" name="status" id="status" class="status" data-toggle="toggle" data-on="Active" data-off="Block" data-onstyle="success" data-offstyle="danger" checked />
                  <input type="hidden" name="status_hide" id="status_hide" class="status_hide" value="1" />
                </div>
              </div>
              <div class="modal-footer">
                <div class="col-md-12 form-group">
                  <button type="submit" name="btnSave" id="btnSave" class="btn btn-primary" value="Save"><span class="fa fa-save"></span> Save</button>
                  <a class="btn btn-danger" style="margin-right: 15px;" href="<?php echo site_url(); ?>select2.html"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a> 
                </div>
              </div>
            </div>
          </div>
        </form>
        </div>
      </div>      
    </div>
  </div>