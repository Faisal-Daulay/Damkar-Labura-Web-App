<div class="col-md-12">
    <!-- START DEFAULT DATATABLE -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">DATA ANGGOTA</h3>
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
			<form action="?page=data_pengguna/proses.php" method="post">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Pilih Data</th>
							<th>No</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Nomor HP</th>
							<th>Username</th>
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
							$sql = mysqli_query($db, "SELECT * FROM pengguna INNER JOIN user ON user.id_pengguna = pengguna.id_pengguna LIMIT $start, $limit");

                            $jmlhdata=mysqli_num_rows(mysqli_query($db, "SELECT * FROM pengguna INNER JOIN user ON user.id_pengguna = pengguna.id_pengguna "));

                            $jmlhhal=ceil($jmlhdata / $limit);
                            if ($jmlhhal < 1) {
                                $jmlhhal=1;
                            }
                            $no = $start+1;

							while ($ambil = mysqli_fetch_array($sql)) {
								$id = $ambil['id_pengguna'];
								$id_user = $ambil['id_user'];
								$nama = $ambil['nama'];
								$alamat = $ambil['alamat'];
								$no_hp = $ambil['no_hp'];
								$username = $ambil['username'];
						?>
						<tr>
							<td>
								<input type="checkbox" name="hapus[]" value="<?= $id; ?>">
							</td>
							<td><?= $no++; ?></td>
							<td><?= $nama; ?></td>
							<td><?= $alamat; ?></td>
							<td><?= $no_hp; ?></td>
							<td><?= $username; ?></td>
							<td>				
								<a class="btn btn-warning" href="?page=data_pengguna/edit.php&id=<?= $id; ?>" ><span class="fa fa-pen"></span> Edit</a>
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
                        echo "<a href='?page=data_pengguna/data_pengguna.php&hal=$satu'>First</a>";
                    }

                    $prev=$hal-1;
                    if ($hal-1) {
                        echo "<a href='?page=data_pengguna/data_pengguna.php&hal=$prev'>Previous</a>";
                    }

                    for ($i=1; $i <= $jmlhhal ; $i++) {
                        echo "<a href='?page=data_pengguna/data_pengguna.php&hal=$i'>$i</a>";
                    }

                    $next=$hal+1;
                    if ($hal < $jmlhhal) {
                        echo "<a href='?page=data_pengguna/data_pengguna.php&hal=$next'>Next</a>";
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
