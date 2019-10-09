<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Servers</h3>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Sr. #</th>
                        <th>Hostname</th>
                        <th>Code</th>
                        <th>IP</th>
                        <th>Group</th>
                        <th>Action</th>
                    </tr>
            </thead>
            <tbody>
                <?php for($i=0;$i<count($menu_items);$i++){?>
                    <tr>
                        <td data-order="Jessica Brown">
                            <strong><?php echo $i+1;?></strong>
                        </td>
                        <td class="maw-320">
                            <span class="truncate"><?php echo $menu_items[$i]['hostname']?></span>
                        </td>
                        <td><?php echo $menu_items[$i]['code']?></td>
                        <td><?php echo $menu_items[$i]['ip']?></td>
                        <td><?php echo $menu_items[$i]['server_group']?></td>
                        <td>
                            <a href="<?php echo base_url().'admin/edit_server/'.$menu_items[$i]['id'];?>" class="btn btn-xs btn-default" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="<?php echo base_url().'admin/manage_server_modules/'.$menu_items[$i]['id'];?>" class="btn btn-xs btn-success" title="Server Modules"><i class="fa fa-server"></i></a>
                            <button class="btn btn-xs btn-danger" onclick="validate(this)" value="<?php echo $menu_items[$i]['id']?>" title="Delete Server"><i class="fa fa-times"></i></button>
                            
                        </td>
                    </tr>
                <?php }?>
            </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<script src="<?php echo BASE_URL?>dist/js/sweetalert.min.js"></script>
<script>
    function validate(a)
    {
        var id= a.value;

        swal({
                title: "Are you sure?",
                text: "You want to delete this Server!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Delete it!",
                closeOnConfirm: false }, function()
            {
                swal("Deleted!", "Server has been Deleted.", "success");
                $(location).attr('href','<?php echo base_url()?>admin/del_server/'+id);
            }
        );
    }
</script>