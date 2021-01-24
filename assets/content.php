

<div class="row">
    <div class="col-md-12">

        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">Welcome to Dashbord Admin Damkar Kabupaten Labuhan Batu Utara.</h3>                        
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->

    </div>
</div>  

<div class="row">
    <div class="col-md-3">
        <?php 
            include 'include/config.php';
            $lap = "SELECT COUNT(id_approve) FROM approve_lapor";
            $execute1 = mysqli_query($db, $lap);
            $ambil = mysqli_fetch_array($execute1);
            $count1 = $ambil['COUNT(id_approve)'];
        ?>
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon"
            onclick="location.href='?page=daftar_laporan/daftar_lap.php';">
            <div class="widget-item-left">
                <span class="fa fa-book" style="font-size: 50px;"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count">
                </div>
                <div class="widget-title">Data Laporan</div>
                <div class="widget-subtitle">
                    <h1><?= $count1; ?></h1>
                </div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                    data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
        <!-- END WIDGET MESSAGES -->

    </div>

    <div class="col-md-3">
        <?php 
            include 'include/config.php';
            $pengg = "SELECT COUNT(id_pengguna) FROM pengguna";
            $execute2 = mysqli_query($db, $pengg);
            $ambil1 = mysqli_fetch_array($execute2);
            $count2 = $ambil1['COUNT(id_pengguna)'];
        ?>
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon"
            onclick="location.href='?page=data_pengguna/data_pengguna.php';">
            <div class="widget-item-left">
                <span class="fa fa-users" style="font-size: 50px;"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count">
                </div>
                <div class="widget-title">Data Pengguna</div>
                <div class="widget-subtitle">
                    <h1><?= $count2 ?></h1>
                </div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                    data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
        <!-- END WIDGET MESSAGES -->

    </div>

    <div class="col-md-3">

        <!-- START WIDGET CLOCK -->
        <div class="widget widget-info widget-padding-sm">
            <div class="widget-big-int plugin-clock">00:00</div>
            <div class="widget-subtitle plugin-date">Loading...</div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip"
                    data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
            <div class="widget-buttons widget-c3">
            </div>
        </div>
        <!-- END WIDGET CLOCK -->

    </div>
</div>

<!-- <div class="row">
    <div class="col-md-12">
        <div id="petaku" style="width: 100%; height: 300px;"></div>
    </div>
</div> -->



