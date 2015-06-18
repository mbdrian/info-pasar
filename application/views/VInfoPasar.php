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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <link rel="stylesheet" 
        href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
        <script type="text/javascript" 
        src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" 
        src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function(){
            $('#tableDaily').dataTable();
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
        <!--<script src="<?php //echo base_url()?>assets/jquery.min.js"></script>-->
        
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
                      <div class="col-lg-8">
                        <div class="box">
                        <?php $pickDate = explode("-",$id_tanggal['today']);?>
                          <div class="box-header">
                            <h1 class="box-title"><?php echo getHari($id_hari);?> <small> <?php echo $pickDate[2]."-".getBulan($pickDate[1])."-".$pickDate[0];?></small></h1>
                            <div class="pull-right box-tools">
                              <form action="<?php echo site_url('CPasar');?>" method="POST">
                                <button class="btn btn-success btn-sm" title="Refresh"><i class="fa fa-refresh"></i></button>
                              </form>
                            </div><!-- /. tools -->
                          </div><!-- /.box-header -->
                          <div class="box-body no-padding">
                          <div class="table-responsive">
                            <table id="tableDaily" class="table table-striped table-bordered ">
                              <thead>
                              <tr>
                                <th style="width: 20px">#</th>
                                <th>Komoditas</th>
                                <th>Harga Tertinggi</th>
                                <th>Harga Terendah</th>
                                <th>Harga Rata-Rata</th>
                                <th>Harga Terakhir</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $i=1; foreach($daily as $day){?>
                              <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $day['Komoditas'];?></td>
                                <td><?php echo format_rupiah($day['max']);?></td>
                                <td><?php echo format_rupiah($day['min']);?></td>
                                <td><?php echo format_rupiah($day['avg']);?></td>
                                <td><?php echo format_rupiah($day['last']);?></td>
                              </tr>
                              <?php $i++;}?>
                              </tbody>
                            </table>
                          </div>
                          </div><!-- /.box-body -->
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
        
    </body>
    
            <?php
                function format_rupiah($angka){
                  $rupiah=number_format($angka,0,',','.');
                  return $rupiah;
                  }
                function getHari($day){
                  if($day==1)return "Senin";
                  else if($day==2)return "Selasa";
                  else if($day==3)return "Rabu";
                  else if($day==4)return "Kamis";
                  else if($day==5)return "Jum'at";
                  else if($day==6)return "Sabtu";
                  else if($day==0)return "Minggu";else echo "hari";                  
                }
                
                function getBulan($bulan){
                  if($bulan==1)return "Januari";
                  else if($bulan==2) return "Februari";
                  else if($bulan==3) return "Maret";
                  else if($bulan==4) return "April";
                  else if($bulan==5) return "Mei";
                  else if($bulan==6) return "Juni";
                  else if($bulan==7) return "Juli";
                  else if($bulan==8) return "Agustus";
                  else if($bulan==9) return "September";
                  else if($bulan==10) return "Oktober";
                  else if($bulan==11) return "November";
                  else if($bulan==12) return "Desember";
                }
              ?>
</html>