<!-- confirm order -->
<div class="modal fade" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Confirming...</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">                
                  <span aria-hidden="true">&times;</span></button>              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="confirm_order.php">
                <input type="hidden" class="orderId" name="id">
                <div class="text-center">
                    <p>Confirm Order</p> 
                    <h2 class="bold name"></h2>                   
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="confirm"><i class="fas fa-check"></i> Confirm</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Reject order -->
<div class="modal fade" id="reject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Rejecting...</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">                
                  <span aria-hidden="true">&times;</span></button>              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="reject_order.php">
              <input type="hidden" class="orderId" name="id">
                <div class="text-center">
                    <p>Reject Order</p> 
                    <h2 class="bold name"></h2>                   
                </div>
            </div>
            
            <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Reason</label>
            <div class="col-sm-10">
              <input type="text" class="form-control"  name="comment" placeholder="Enter reason here" required>
            </div>
          </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="reject"><i class="fa fa-trash"></i> Reject</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- deliver order -->
<div class="modal fade" id="deliver">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Delivered.</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">                
                  <span aria-hidden="true">&times;</span></button>              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="deliver_order.php">
              <input type="hidden" class="orderId" name="id">
                <div class="text-center">
                    <p>Confirm that you delivered order -</p> 
                    <h2 class="bold name"></h2> 
                                   
                </div>
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="deliver"><i class="fa fa-trash"></i> delivered</button>
              </form>
            </div>
        </div>
    </div>
</div>