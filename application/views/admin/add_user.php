<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            </div>
            <?php if(isset($errors)){?>
                <div class="alert alert-danger">
                    <?php print_r($errors);?>
                </div>
            <?php }?>
            <?php if(isset($success)){?>
                <div class="alert alert-success">
                    <?php print_r($success);?>
                </div>
            <?php }?>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post" id="form1">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" value="<?php echo $_POST['name']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter user's name" name="name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" value="<?php echo $_POST['email']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email address" name="email" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" value="<?php echo $_POST['password']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter password" name="password" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm password</label>
                  <input type="text" value="" class="form-control" id="exampleInputEmail1" placeholder="Confirm password" name="conf_password" required>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    
  </script>