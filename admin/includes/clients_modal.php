<!-- Description -->
<div class="modal fade" id="description">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
              <h4 class="modal-title"><b><span class="name"></span></b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>              
            </div>
            <div class="modal-body">
                <p id="desc"> </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>Add New Clients</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">                
                  <span aria-hidden="true">&times;</span></button>              
            </div>
            <div class="modal-body">

              <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Enter Client details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="form-horizontal" method="POST" action="products_add.php" enctype="multipart/form-data">
                  <div class="row">
                  <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="firstName" required>                       
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="lastName" required>                       
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="price">Price</label>                  
                  <input type="text" class="form-control" id="price" name="price" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="category">Category</label>
                        <!-- category list -->               
                        <select class="form-control" id="category" name="category" required>
                          <option value="" selected>- Select -</option>
                      
                        </select>
                      </div>
                    </div>
                  </div>

                    <div class="col-sm-12">
                      
                      <div class="form-group">
                                              
                          <label for="photo" >Photo</label>
                          
                            <input type="file" id="photo" name="photo">                         
                          
                        
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Discription</label>
                        
                          <textarea class="summernote" name="description" rows="10" cols="80" required>
                           
                          </textarea>
                        
                      </div>
                    </div>
                  </div>
                  </div>
                  

              <!-- end form body -->
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

