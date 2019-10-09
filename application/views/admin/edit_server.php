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
              <h3 class="box-title">Edit Server</h3>
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
                  <label for="exampleInputEmail1">Hostname</label>
                  <input type="text" value="<?php echo $server['hostname']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter hostname" name="hostname" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Code</label>
                  <input type="text" value="<?php echo $server['code']?>" class="form-control" id="exampleInputPassword1" placeholder="Enter code" name="code" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <input type="text" value="<?php echo $server['location']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter location" name="location" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">IP</label>
                  <input id="text1" type="text" value="<?php echo $server['ip']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter ip address" name="ip" required >
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Group</label>
                  <input type="text" value="<?php echo $server['server_group']?>" class="form-control" id="exampleInputEmail1" placeholder="Enter group" name="server_group" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <textarea name="description" class="form-control" placeholder="Enter description..." rows="5" required><?php echo $server['description']?></textarea>
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