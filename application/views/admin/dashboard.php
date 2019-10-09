<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Servers Information
        
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <?php foreach($servers as $server){?>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $server['hostname']?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover table-striped">
                <tr>
                  <td>Hostname</td>
                  <td><?php echo $server['hostname']?></td>
                </tr>
                <tr>
                  <td>Code</td>
                  <td><?php echo $server['code']?></td>
                </tr>
                <tr>
                  <td>IP</td>
                  <td><?php echo $server['ip']?></td>
                </tr>
                <tr>
                  <td>Location</td>
                  <td><?php echo $server['location']?></td>
                </tr>
                <tr>
                  <td>Group</td>
                  <td><?php echo $server['server_group']?></td>
                </tr>
                <tr>
                  <td>Description</td>
                  <td><?php echo $server['description']?></td>
                </tr>
              </table>
              <?php for($i=0;$i<count($server['modules']);$i++){?>
                      <h3> Module <?php echo $i+1;?></h3>
                      <table class="table table-hover">
                        <tr>
                          <td>Name</td>
                          <td><?php echo $server['modules'][$i]['name']?></td>
                        </tr>
                        <tr>
                          <td>CPU</td>
                          <td><?php echo $server['modules'][$i]['cpu']?></td>
                        </tr>
                        <tr>
                          <td>RAM</td>
                          <td><?php echo $server['modules'][$i]['ram']?></td>
                        </tr>
                        <tr>
                          <td>Storage</td>
                          <td><?php echo $server['modules'][$i]['storage']?></td>
                        </tr>
                      </table>
              <?php }?>
            </div>
          </div>

        </div>
        <?php }?>
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->