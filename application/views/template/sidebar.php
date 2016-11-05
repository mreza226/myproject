<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/AdminLTE/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Muhammad Reza</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                  <a href="<?php echo base_url('admin/dashboard') ?>">
                    <i class="fa fa-dashboard"></i><span>Dashboard</span>
                  </a>
                </li>  
             <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Article</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">                   
                    <li><a href="<?php echo base_url('admin/article/create'); ?>"><i class="fa fa-circle-o"></i> Create Article</a></li>
                </ul>
                <ul class="treeview-menu">                   
                    <li><a href="<?php echo base_url('admin/article/display'); ?>"><i class="fa fa-circle-o"></i> List Article</a></li>
                </ul>
            </li>
              
        </ul>           
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">