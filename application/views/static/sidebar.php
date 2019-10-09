<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN MENU</li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-tv"></i> <span>Servers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>admin/add_server"><i class="fa fa-circle-o"></i> Add Server</a></li>
            <li><a href="<?php echo base_url()?>admin/assign_server_module"><i class="fa fa-circle-o"></i> Assign Modules</a></li>
            <li><a href="<?php echo base_url()?>admin/manage_servers"><i class="fa fa-circle-o"></i> Manage Servers</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-clone"></i> <span>Modules</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>admin/add_module"><i class="fa fa-circle-o"></i> Add Modules</a></li>
            <li><a href="<?php echo base_url()?>admin/manage_modules"><i class="fa fa-circle-o"></i> Manage Modules</a></li>
            <li><a href="<?php echo base_url()?>admin/grant_access"><i class="fa fa-circle-o"></i> Grant Access</a></li>
          </ul>
        </li>

       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url()?>admin/add_user"><i class="fa fa-circle-o"></i> Add Users</a></li>
            <li><a href="<?php echo base_url()?>admin/manage_users"><i class="fa fa-circle-o"></i> Manage Users</a></li>
          </ul>
        </li>

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>