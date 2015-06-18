<section class="content-header">
    <h1>
        Dashboard
    </h1>
    </section>

    <!-- Main content -->
    <section class="content bg-content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-lg-2 col-xs-3">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>1<sup style="font-size: 20px"></sup></h3>
                        <p>Komoditas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo site_url('CKomoditas');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-2 col-xs-3">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>2</h3>
                        <p>Pasar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?php echo site_url('CPasar');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-3">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3>3<sup style="font-size: 20px"></sup></h3>
                        <p>Info Pasar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="<?php echo site_url('CPasar/infoPasar');?>" class="small-box-footer">Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-3">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>4</h3>
                  <p>History Komoditas</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo site_url('CPasar/history')?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
        </div><!-- /.row -->