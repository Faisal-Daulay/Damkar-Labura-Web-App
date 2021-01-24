<div class="row">
    <div class="col-md-6">
        <?php
        include 'include/config.php';

        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM daftar_lapor INNER JOIN pengguna ON daftar_lapor.id_pengguna = pengguna.id_pengguna WHERE id_lapor=$id";
        $query = mysqli_query($db, $sql);
        while ($ambil = mysqli_fetch_array($query)) {
            $nama = $ambil['nama'];
            $nama = $ambil['nama'];
            $alamat = $ambil['alamat'];
            $no_hp = $ambil['no_hp'];
            $lokasi = $ambil['lokasi'];
            $foto = $ambil['url_img'];
            $x = $ambil['x'];
            $y = $ambil['y'];
        ?>
            <form action="?page=new_lap/approve.php" method="post" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <h3 class="panel-title text-uppercase">FORM LAPORAN BARU</h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span> Refresh</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                        </ul>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Nama</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="nama" class="form-control" value="<?= $nama; ?>" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">No Handphone</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="nohp" class="form-control" value="<?= $no_hp; ?>" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Lokasi Kebakaran</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="lokpor" class="form-control" value="Lat <?= $x; ?> / Lng <?= $y; ?>" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"></label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="lokasi" class="form-control" style="height:100px;" value="<?= $lokasi; ?>">
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Foto Kejadian</label>
                            <div class="col-md-9 col-xs-12">
                                <img src="android/uploads/<?= $url_img; ?>" class="img-thumbnail">
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary pull-right">Terima Laporan</button>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
    <div class="col-md-6">
        <div id="petaku" style="width: 100%; height: 600px;"></div>
    </div>
</div>
