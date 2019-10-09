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
              <h3 class="box-title">Assign Module</h3>
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
                  <label for="exampleInputEmail1">Server</label>
                  <select name="server_id" class="form-control">
                      <?php foreach($servers as $server){?>
                        <option value="<?php echo $server['id']?>"><?php echo $server['hostname']?></option>
                      <?php }?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Module</label>
                  <select name="module_id" class="form-control">
                      <?php foreach($modules as $module){?>
                        <option value="<?php echo $module['id']?>"><?php echo $module['name']?></option>
                      <?php }?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Assign</button>
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