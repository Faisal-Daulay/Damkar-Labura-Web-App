<div class="row">
    <div class="col-md-6">
        <?php 
            if (isset($_GET['id'])) {
            $id = $_GET['id'];
            include 'include/config.php';
            $sql = "SELECT * FROM kategori WHERE id_kategori='$id' ";
            $query = mysqli_query($db, $sql);
            while ($ambil = mysqli_fetch_array($query)) {
                $id = $ambil['id_kategori'];
                $kategori = $ambil['kategori'];
        ?>
            <!-- FORM EDIT -->
            <form action="?page=kategori/proses.php" method="post" class="form-horizontal">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-uppercase">form Update kategori</h3>
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
                            <label class="col-md-3 col-xs-12 control-label">Nama Kategori</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="kategori" autocomplete="off" class="form-control" value="<?= $kategori; ?>" />
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary pull-right" name="update">Update Data</button>
                    </div>
                </div>
            </form>
        <?php }} else { ?>
            <!-- FORM ADD -->
            <form action="?page=kategori/proses.php" method="post" class="form-horizontal">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-uppercase">form add kategori</h3>
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
                            <label class="col-md-3 col-xs-12 control-label">Nama Kategori</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fas fa-align-left"></i>
                                    </span>
                                    <input type="text" name="kategori" autocomplete="off" class="form-control" placeholder="Nama Kategori" />
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

    <!-- TABLE KATEGORI -->
    <div class="col-md-6">
        <!-- START DEFAULT DATATABLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">DATA KATEGORI</h3>
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
                <form action="?page=kategori/proses.php" method="post">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Pilih Data</th>
                                <th>No</th>
                                <th>Kategori</th>
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
                                $sql = mysqli_query($db, "SELECT * FROM kategori LIMIT $start, $limit");

                                $jmlhdata=mysqli_num_rows(mysqli_query($db, "SELECT * FROM kategori LIMIT $start, $limit"));

                                $jmlhhal=ceil($jmlhdata / $limit);
                                if ($jmlhhal < 1) {
                                    $jmlhhal=1;
                                }
                                $no = $start+1;
                                
                                while ($ambil = mysqli_fetch_array($sql)) {
                                    $id = $ambil['id_kategori'];
                                    $kategori = $ambil['kategori'];
                            ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="hapus[]" value="<?= $id ?>">
                                </td>
                                <td><?= $no++; ?></td>
                                <td><?= $kategori; ?></td>
                                <td>
                                    <a href="?page=kategori/kategori.php&id=<?= $id; ?>" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" name="del" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
                </form>
                <div id="page">
                    <?php

                        echo "<a>Page $hal Of $jmlhhal</a>";

                        $satu=1;
                        if ($satu < $hal) {
                            echo "<a href='?page=kategori/kategori.php&hal=$satu'>First</a>";
                        }

                        $prev=$hal-1;
                        if ($hal-1) {
                            echo "<a href='?page=kategori/kategori.php&hal=$prev'>Previous</a>";
                        }

                        for ($i=1; $i <= $jmlhhal ; $i++) {
                            echo "<a href='?page=kategori/kategori.php&hal=$i'>$i</a>";
                        }

                        $next=$hal+1;
                        if ($hal < $jmlhhal) {
                            echo "<a href='?page=kategori/kategori.php&hal=$next'>Next</a>";
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
