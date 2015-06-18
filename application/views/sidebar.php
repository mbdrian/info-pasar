<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                </div>
            </div>
            <!-- search form -->
            
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="<?php echo site_url('welcome');?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                    </a>
                </li>                
                <li class="treeview">
                    <a href="<?php echo site_url('CTentang');?>">
                        <i class="fa fa-info"></i> <span>Tentang Web</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="<?php echo site_url('CLogin/logout');?>">
                        <i class="fa fa-long-arrow-left"></i> <span>Logout</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>