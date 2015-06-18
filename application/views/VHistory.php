<?php
        
        //cek user aktif
        //session_start();
        if(isset($_SESSION['login']) and !empty($_SESSION['login'])){
        }
        else{
               redirect('CLogin/logout');	
        }
        
        
?>    <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Info Pasar | Dashboard</title>
        <script type="text/javascript" src="<?php echo base_url();?>jquery.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <link rel="stylesheet" 
        href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
        <script type="text/javascript" 
        src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" 
        src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function(){
            $('#tableHistory1').dataTable();
        });
        </script>
        
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Icon Tab aplikasi-->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/dist/img/inpas.png" /><!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
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
        <script type="text/javascript">
                $(document).ready(function() {
                        $("#id_komoditas").change(function() {
                                var kom =$("#id_komoditas").val();
                                $.ajax({
                                        type: "POST",
                                        url: "<?php echo site_url('CPasar/getInfoPasar');?>",
                                        data: {id_komoditas:kom},
                                        cache: false,
                                        success: function(html) {
                                                $("#tableHistory1").html(html);
                                        } 
                                });
                        });
                });
                
                  
                </script>
        
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
                        <?php $this->load->view('sub_header2');?>
                    <!-- Main row -->
                    <div class="row">
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <!--<section class="col-lg-5 connectedSortable"></section> right col -->
                        <div class="col-md-8">
                          <div class="box box-primary">
                          <div class="box-header">
                            <h3 class="box-title">Data Table History Info Pasar</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <div class="row">
                              <div class='col-sm-6'>
                                <div class="form-group">
                                  <label>Komoditas</label>
                                  <select class="form-control" name="provinsiPasar" id="id_komoditas" >
                                    <option value="">Pilih Komoditas</option>
                                    <?php foreach ($komoditas as $kom){ ?>
                                      <option value="<?php echo $kom['id_Komoditas'];?>"><?php echo $kom['nama_Komoditas'];?></option>
                                      <?php } ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                           
                            <div class="row">
                              <div class="col-lg-12">
                              <div class="table-responsive">
                                <table id="tableHistory1" class="table table-striped table-bordered ">
                                  <thead>
                                    <tr>
                                      <th width=20px>#</th>
                                      <th>Waktu</th>
                                      <th width=100px>Harga (Rp/Kg)</th>
                                      <th>Pasar</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $i=1; foreach($rows as $row) {?>
                                    <tr>
                                      <td><?php echo $i;?></td>
                                      <td><?php echo $row['waktu'];?></td>
                                      <td align='right'><?php echo format_rupiah($row['harga_Komoditas']);?></td>
                                      <td><?php echo $row['pasar'].", ".$row['kota'].", ".$row['provinsi'];?></td>
                                    </tr>
                                    <?php $i++; }?>
                                  </tbody>
                                </table>
                              </div>
                              </div>
                            </div>
                          </div><!-- /.box-body -->
                        </div><!-- /.box -->
                      </div>  <!-- /.col-->                    
                    
                      <div class='col-md-4'>
                        <div class="box box-primary">
                          <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>
                            <h3 class="box-title">Bar Chart</h3>
                            <div class="box-tools pull-right">
                              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                          </div>
                          <div class="box-body">
                           <form action="<?php echo site_url('CPasar/getChart'); ?>" method="post">
                            <div class="row">
                                <div class='col-sm-12'>
                                  <div class="form-group">
                                    <label>Komoditas <sup style="color:red">*</sup></label>
                                    <select class="form-control" name="kom" id="id_kom" >
                                      <option value="">Pilih Komoditas</option>
                                      <?php foreach ($komoditas as $kom){ ?>
                                        <option value="<?php echo $kom['id_Komoditas'];?>"><?php echo $kom['nama_Komoditas'];?></option>
                                        <?php } ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Bulan <sup style="color:red">*</sup></label>
                                    <select class="form-control" name="namaBulan" id="id_bulan" >
                                      <option value="">Pilih Bulan</option>
                                      <option value='1'>January</option>
                                      <option value='2'>February</option>
                                      <option value='3'>March</option>
                                      <option value='4'>April</option>
                                      <option value='5'>May</option>
                                      <option value='6'>June</option>
                                      <option value='7'>July</option>
                                      <option value='8'>August</option>
                                      <option value='9'>September</option>
                                      <option value='10'>October</option>
                                      <option value='11'>November</option>
                                      <option value='12'>December</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Minggu <sup style="color:red">*</sup></label>
                                    <select class="form-control" name="idx_week" id="idx_week" >
                                      <option value="">Pilih Minggu</option>
                                      <option value='1'>Minggu ke-1</option>
                                      <option value='2'>Minggu ke-2</option>
                                      <option value='3'>Minggu ke-3</option>
                                      <option value='4'>Minggu ke-4</option>
                                      <option value='5'>Minggu ke-5</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class='row'>
                                 <div class="col-lg-12 col-xs-12">
                                  <!-- small box -->
                                  <div class="small-box bg-green">
                                    <div class="inner">
                                      <h3>Grafik</h3>
                                      <p>Mingguan Harga Komoditas</p>
                                    </div>
                                    <div class="icon">
                                      <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <div class="small-box-footer">
                                       <button name='showChart' type="submit" class="btn btn-success btn-block btn-flat">More info <i class="fa fa-arrow-circle-right"></i></button>
                                    </div>
                                  </div>
                                </div><!-- ./col -->
                              </div>
                              </form>
                          </div><!-- /.box-body-->
                        </div><!-- /.box -->
                      </div>
                    </div>
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
         <!-- FLOT CHARTS -->
        <script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
        <script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
        <script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
        <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
        <script src="<?php echo base_url(); ?>assets/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        
       
        <?php 
          function format_rupiah($angka){
              $rupiah=number_format($angka,0,',','.');
              return $rupiah;
          }        
        ?>
    </body>
</html>