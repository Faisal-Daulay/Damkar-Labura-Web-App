
<div class="col-md-12">
    <!-- START DEFAULT DATATABLE -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">DAFTAR LAPORAN MASUK</h3>
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
            <form action="?page=daftar_laporan/del.php" method="post">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Pilih Data</th>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Lat / Long</th>
                            <th>Lokasi Kebakaran</th>
                            <th>Tanggal Lapor</th>
                            <th>Jam Lapor</th>
                        </tr>
                    </thead>
                    <tbody align="center">

                        <?php
                            include 'include/config.php';
                            $no = 1;
                            $sql = "SELECT * FROM daftar_lapor INNER JOIN pengguna ON daftar_lapor.id_pengguna = pengguna.id_pengguna ORDER BY id_lapor DESC";
                            $query = mysqli_query($db, $sql);
                            while ($ambil = mysqli_fetch_array($query)) {
                                $id = $ambil['id_lapor'];
                                $nama = $ambil['nama'];
                                $x = $ambil['x'];
                                $y = $ambil['y'];
                                $lokasi = $ambil['lokasi'];
                                $tgl_lapor = $ambil['tgl_lapor'];
                                $jam_lapor = $ambil['jam_lapor'];
                        ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="hapus[]" value="<?= $id ?>">
                            </td>
                            <td><?= $no++; ?></td>
                            <td><?= $nama; ?></td>
                            <td><?= $x; ?> / <?= $y; ?></td>
                            <td><?= $lokasi; ?></td>
                            <td><?= $tgl_lapor; ?></td>
                            <td><?= $jam_lapor; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="submit" name="del" class="btn btn-danger"><span class="fa fa-trash"></span> Delete</button>
            </form>
        </div>
    </div>
    <!-- END DEFAULT DATATABLE -->

</div>
