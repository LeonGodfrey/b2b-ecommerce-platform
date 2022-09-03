<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Deleting...</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">                
                  <span aria-hidden="true">&times;</span></button>              
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="products_delete.php">
                <input type="hidden" class="prodid" name="id">
                <div class="text-center">
                    <p>DELETE PRODUCT</p>
                    <h2 class="bold name"></h2>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Edit Product</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">                
                  <span aria-hidden="true">&times;</span></button>              
            </div>
            <div class="modal-body">
              

            <!-- START CARD -->

            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit product's details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" method="POST" action="products_edit.php" enctype="multipart/form-data">
                   <input type="text" class="prodid" name="id" hidden>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="edit_name" name="name">
                        
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="price">Price</label>                  
                  <input type="text" class="form-control" id="edit_price" name="price">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="category">Category</label>
                        <!-- category list -->               
                        <select class="form-control" id="edit_category" name="category">
                          <option selected id="catselected"></option>
                      
                        </select>
                      </div>
                    </div>
                  </div>

                    
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Description</label>
                        
                          <textarea id="desc1" class="summernote" name="description" rows="10" cols="80">
                            
                          </textarea>
                        
                      </div>
                    </div>
                  </div>
                  </div>
                  

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

