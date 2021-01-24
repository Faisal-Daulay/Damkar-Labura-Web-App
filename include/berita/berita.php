<div class="row">
    <div class="col-md-12">
        <?php 
            if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include 'include/config.php';
            $sql = "SELECT * FROM berita WHERE id_berita='$id' ";
            $query = mysqli_query($db, $sql);
            while ($ambil = mysqli_fetch_array($query)) {
                $id = $ambil['id_berita'];
                $judul = $ambil['judul'];
                $isi = $ambil['isi'];
                $url_img = $ambil['url_img'];
        ?>
            <!-- FORM ADD -->
            <form action="?page=berita/proses.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-uppercase">form update berita</h3>
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
                            <label class="col-md-3 col-xs-12 control-label">Judul</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="judul" autocomplete="off" class="form-control" value="<?= $judul; ?>" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Isi</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <textarea name="isi" style="height: 500px;" class="form-control" rows="10"><?= $isi; ?></textarea>
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Gambar</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="file" class="form-control" name="upload" value="<?= $url_img; ?>">
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <img src="img/<?= $url_img; ?>" class="img img-thumbnail">

                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary pull-right" name="update">Update Data</button>
                    </div>
                </div>
            </form>
        <?php }} else { ?>
            <!-- FORM ADD -->
            <form action="?page=berita/proses.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-uppercase">form add berita</h3>
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
                            <label class="col-md-3 col-xs-12 control-label">Judul</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="judul" autocomplete="off" class="form-control" placeholder="Judul" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Isi</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <textarea name="isi" style="height: 500px;" class="form-control" rows="10"></textarea>
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Gambar</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="file" class="form-control" name="upload">
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary pull-right" name="add">Add Data</button>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>

<div class="row">

    <!-- TABLE BERITA -->
    <div class="col-md-12">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">DATA BERITA</h3>
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
                    <!-- <a href="?page=daftar_laporan/daftar_lap.php" class="btn btn-danger">Tambah Data</a> -->
                </div>
                <form action="?page=berita/proses.php" method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Pilih Data</th>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Image</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            <?php
                                include 'include/config.php';
                                $limit = 10;//Untuk menampilkan jumlah data dari database
                                $hal= @$_GET['hal'];//Jumlah halaman di mulai dari 1
                                if (empty($hal)) {
                                    $hal=1;
                                }
                                $start=($hal-1)*$limit;
                                $sql = mysqli_query($db, "SELECT * FROM berita ORDER BY id_berita DESC");

                                $jmlhdata=mysqli_num_rows(mysqli_query($db, "SELECT * FROM berita"));

                                $jmlhhal=ceil($jmlhdata / $limit);
                                if ($jmlhhal < 1) {
                                    $jmlhhal=1;
                                }
                                $no = $start+1;
                                while ($ambil = mysqli_fetch_array($sql)) {
                                    $id = $ambil['id_berita'];
                                    $judul = $ambil['judul'];
                                    $isi = $ambil['isi'];
                                    $url_img = $ambil['url_img'];
                            ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="hapus[]" value="<?= $id ?>">
                                </td>
                                <td><?= $no++; ?></td>
                                <td><?= $judul; ?></td>
                                <td><?= substr($isi, 0, 250);?></td>
                                <td><img src="img/<?= $url_img; ?>" width="100"></td>
                                <td>
                                    <a href="?page=berita/berita.php&id=<?= $id; ?>" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" name="del" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                </form>
                <div id="page">
                    <?php

                        echo "<a class='ofpage'>Page $hal Of $jmlhhal</a>";

                        $satu=1;
                        if ($satu < $hal) {
                            echo "<a href='?page=berita/berita.php&hal=$satu'>First</a>";
                        }

                        $prev=$hal-1;
                        if ($hal-1) {
                            echo "<a href='?page=berita/berita.php&hal=$prev'>Previous</a>";
                        }

                        for ($i=1; $i <= $jmlhhal ; $i++) {
                            echo "<a href='?page=berita/berita.php&hal=$i'>$i</a>";
                        }

                        $next=$hal+1;
                        if ($hal < $jmlhhal) {
                            echo "<a href='?page=berita/berita.php&hal=$next'>Next</a>";
                        }

                        $last=$jmlhhal;
                        if ($jmlhhal > $hal) {
                            echo "<a href='?page=daftar_laporan/daftar_lap.php&hal=$last'>Last</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- END DEFAULT DATATABLE -->

    </div>
</div>