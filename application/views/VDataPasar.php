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
            $('#tablePasar').dataTable();
        });
        </script>
        
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Icon Tab aplikasi-->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/dist/img/inpas.png" />        
        <!-- Bootstrap 3.3.4 -->
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
                        $("#id_provinsi").change(function() {
                                var provinsi =$("#id_provinsi").val();
                                $.ajax({
                                        type: "POST",
                                        url: "<?php echo site_url('CPasar/getKota');?>",
                                        data: {id_provinsi:provinsi},
                                        cache: false,
                                        success: function(html) {
                                                $("#id_kota").html(html);
                                        } 
                                });
                        });
                        
                        $("#provPasar").change(function() {
                                var provinsi =$("#provPasar").val();
                                $.ajax({
                                        type: "POST",
                                        url: "<?php echo site_url('CPasar/getKota');?>",
                                        data: {provPasar:provinsi},
                                        cache: false,
                                        success: function(html) {
                                                $("#kotPasar").html(html);
                                        } 
                                });
                        });
                        $("#kotPasar").change(function() {
                                var kot =$("#kotPasar").val();
                                var provinsi = $("#provPasar").val();
                                $.ajax({
                                        type: "POST",
                                        url: "<?php echo site_url('CPasar/getPasarbyKotaandProvinsi');?>",
                                        data: {kotPasar:kot,provPasar:provinsi},
                                        cache: false,
                                        success: function(html) {
                                                $("#tablePasar").html(html);
                                        } 
                                });
                        });
                });
                </script>
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
                      <div class="col-lg-4">
                            <div class="box">
                              <div class="box-header with-border">
                                <h3 class="box-title">Masukkan Nama Pasar</h3>
                              </div><!-- /.box-header -->
                              <div class="box-body">
                                <form role="form" action="<?php echo site_url('CPasar/add'); ?>" method="post">
                                  <div class="form-group">
                                    <label>Pasar</label>
                                    <input name='namaPasar' type="text" class="form-control" placeholder="Nama Pasar"/>
                                  </div>
                                  <!-- select -->
                                  <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="form-control" name="provinsiPasar" id="id_provinsi">
                                      <option value="">Pilih provinsi</option>
                                    <?php foreach ($provinsi as $row){ ?>
                                      <option value="<?php echo $row['id_provinsi'];?>"><?php echo $row['nama'];?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Kota</label>
                                    <select id="id_kota" class="form-control" name="kotaPasar">
                                    <option value="">Pilih Kota</option>
                                    <?php foreach ($kota as $row){ ?>
                                      <option value="<?php echo $row['id_kota'];?>"><?php echo $row['nama'];?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                
                              </div><!-- /.box-body -->
                                <div class="box-footer">
                                  <button name='submitPasar' type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                            </div><!-- /.box -->
                          </div><!-- /.col -->
                          
                          <div class="col-lg-8">
                          <div class="box">
                          <div class="box-header">
                            <h1 class="box-title">Data Pasar</h1>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <div class="row">
                              <div class='col-sm-4'>
                                <div class="form-group">
                                  <label>Provinsi</label>
                                  <select class="form-control" name="provinsiPasar" id="provPasar" >
                                    <option value="">Pilih Provinsi</option>
                                    <?php foreach ($provinsi as $prov){ ?>
                                      <option value="<?php echo $prov['id_provinsi'];?>"><?php echo $prov['nama'];?></option>
                                      <?php } ?>
                                  </select>
                                </div>
                              </div>
                              
                              <div class='col-sm-4'>
                                <div class="form-group">
                                  <label>Kota</label>
                                  <select class="form-control" name="provinsiPasar" id="kotPasar" >
                                    <option value="">Pilih Kota</option>
                                    <?php foreach ($kota as $kot){ ?>
                                      <option value="<?php echo $kot['id_kota'];?>"><?php echo $kot['nama'];?></option>
                                      <?php } ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            
                          <div class="table-responsive">
                            <table id="tablePasar" class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th width=40px><center>#</center></th>
                                  <th width=200px>Nama Pasar</th>
                                  <th>Kota</th>
                                  <th>Provinsi</th>
                                  <th><center>Edit</center></th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php $i=1;foreach ($pasar as $row) {?>
                                <tr><h3>
                                  <td><center><?php echo $i;?></center></td>
                                  <td><?php echo $row['nama'];?></td>
                                  <td><?php echo $row['kota'];?></td>
                                  <td><?php echo $row['provinsi'];?></td>
                                  <td><center><a data-toggle="modal" class='edit' href="#editModal-<?php echo $i;?>"><img width='30' height='25' src="<?php echo base_url() ?>assets/dist/img/list.png"/></a>
                                  </center>
                                  
                                  <div class="modal fade" id="editModal-<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Pasar</h4>
                                          </div>
                                          <div class="modal-body">
                                          <!--============================-->
                                            <div class="box">
                                                <div class="box-header with-border">
                                                  <h1 class="box-title">Pasar</h1>
                                                </div><!-- /.box-header -->
                                                <div class="box-body">
                                                  <form role="form" action="<?php echo site_url('CPasar/edit'); ?>" method="post">
                                                  <div class="form-group">
                                                    <label>ID Pasar</label>
                                                    <input name='id' type="text" class="form-control" value="<?php echo $row['id_pasar'];?>" width=100px>
                                                  </div>
                                                    <div class="form-group">
                                                      <label>Pasar</label>
                                                      <input name='namaPasar' type="text" class="form-control" value="<?php echo $row['nama'];?>"/>
                                                    </div>
                                                    <!-- select -->
                                                    <div class="form-group">
                                                      <label>Provinsi</label>
                                                      <select class="form-control" name="provinsiPasar" id="id_provinsi">
                                                      <?php foreach ($provinsi as $prov){ 
                                                        if($prov['nama']==$row['provinsi']) $selected='selected'; else $selected='';
                                                      ?>
                                                        <option value="<?php echo $prov['id_provinsi'];?>" <?php echo $selected;?>><?php echo $prov['nama'];?></option>
                                                        <?php } ?>
                                                      </select>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Kota</label>
                                                      <select class="form-control" name="kotaPasar" id="id_kota">
                                                      <?php foreach ($kota as $kot){ 
                                                        if($kot['nama']==$row['kota']) $selected='selected'; else $selected='';
                                                      ?>
                                                        <option value="<?php echo $kot['id_kota'];?>" <?php echo $selected;?>><?php echo $kot['nama'];?></option>
                                                        <?php } ?>
                                                      </select>
                                                    </div>
                                                  
                                                </div><!-- /.box-body -->
                                                  
                                                
                                              </div><!-- /.box -->
                                            <!--============================-->
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                            <button name='editPasar' type="submit" class="btn btn-primary" width=500px>Edit</button>
                                            <button name="deletePasar" type="submit" class="btn btn-primary">Delete</button>
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