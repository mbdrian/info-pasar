<?php
        
        //cek user aktif
        //session_start();

        if(isset($_SESSION['login']) and !empty($_SESSION['login'])){
        }
        else{
                redirect('CLogin/logout');	
        }
?>    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Info Pasar | Dashboard</title>
        <!--<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <link rel="stylesheet" 
        href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
        <script type="text/javascript" 
        src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" 
        src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function(){
            $('#tableKomoditas').dataTable();
        });
        </script>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Icon Tab aplikasi-->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/dist/img/inpas.png" />        
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />        
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
            folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url(); ?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">

            <?php $this->load->view('header'); ?>
            <?php $this->load->view('sidebar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                    <section class="content-header">
                    <h1>
                        <?php echo $active_menu;?>
                    </h1>
                    </section>
                
                    <!-- Main content -->
                    <section class="content bg-content">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <a href="<?php echo site_url('CKomoditas');?>" class="btn btn-primary btn-block margin-bottom komunitas">Komoditas</a>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <a href="<?php echo site_url('CPasar');?>" class="btn btn-primary btn-block margin-bottom pasar">Pasar</a>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <a href="<?php echo site_url('CPasar/infoPasar');?>" class="btn btn-primary btn-block margin-bottom ip">Info Pasar Terkini</a>
                            </div><!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                              <a href="<?php echo site_url('CPasar/history');?>" class="btn btn-primary btn-block margin-bottom history">History Komoditas</a>
                            </div><!-- /.col -->
                            
                        </div><!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <div class="col-lg-6">
                            <div class="box">
                              <div class="box-header with-border">
                                <h3 class="box-title">Masukkan Nama Komoditas</h3>
                              </div><!-- /.box-header -->
                              <div class="box-body">
                                <form role="form" action="<?php echo site_url('CKomoditas/add'); ?>" method="post">
                                 <div class="input-group margin">
                                    <input name='newKomoditas' type="text" class="form-control" placeholder="Komoditas">
                                    <span class="input-group-btn">
                                      <button name="addKomoditas" class="btn btn-info btn-flat" type="submit">Tambah</button>
                                    </span>
                                  </div><!-- /input-group -->
                                </form>
                              </div><!-- /.box-body -->
                            </div><!-- /.box -->
                          </div><!-- /.col -->
                          
                          <div class="col-lg-8">
                          <div class="box">
                          <div class="box-header">
                            <h1 class="box-title">Komoditas</h1>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                          <div class="table-responsive">
                            <table id="tableKomoditas" class="table table-bordered table-striped display" width="100%" >
                              <thead>
                                <tr>
                                  <th width=40px><center>#</center></th>
                                  <th width=530px>Nama Komoditas</th>
                                  <th><center>Edit</center></th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php $i=1;foreach ($rows as $row) {?>
                                <tr><h3>
                                  <td><center><?php echo $i;?></center></td>
                                  <td><?php echo $row['nama_Komoditas'];?></td>
                                  <td><center><a data-toggle="modal" class='edit' href="#editModal-<?php echo $i;?>"><img width='30' height='25' src="<?php echo base_url() ?>assets/dist/img/list.png"/></a>
                                  </center>
                                  
                                  <div class="modal fade" id="editModal-<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form role='form' action="<?php echo site_url('CKomoditas/edit'); ?>" method="post">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Komoditas</h4>
                                          </div>
                                          <div class="modal-body">
                                          <!--============================-->
                                           <div class="form-group">
                                            <label>ID Komoditas</label>
                                            <input name='id' type="text" class="form-control" value="<?php echo $row['id_Komoditas'];?>" width=100px>
                                          </div>
                                             <p>Komoditas</p>
                                              <div class="input-group margin">
                                                <input name='KomoditasBaru' type="text" class="form-control" value="<?php echo $row['nama_Komoditas'];?>">
                                                <span class="input-group-btn">
                                                  <button name='editKomoditas' class="btn btn-info btn-flat" type="submit">Edit!</button>
                                                </span>
                                              </div><!-- /input-group -->
                                            <!--============================-->
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                            <button name='deleteKomoditas' type="submit" class="btn btn-primary">Delete</button>
                                          </div>
                                          </form>
                                        </div><!-- /.modal-content -->
                                      </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                    </td>    
                                  </h3>
                                </tr>
                                <?php $i++;}?>
                              </tbody>
                            </table>
                          </div>                          
                          </div><!-- /.box-body -->
                        </div><!-- /.box -->
                      </div>  <!-- /.col-->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php $this->load->view('footer');?>
            <!-- Add the sidebar's background. This div must be placed
                immediately after the control sidebar -->
            <div class='control-sidebar-bg'></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <!--<script src="<?php //echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    -->
        <!-- Morris.js charts -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>assets/plugins/knob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- Slimscroll -->
        <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js" type="text/javascript"></script>    

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js" type="text/javascript"></script>    

        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/dist/js/demo.js" type="text/javascript"></script>
    </body>
</html>