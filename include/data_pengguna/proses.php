<?php

	include 'include/config.php';

	if ($_POST) {
		
		if (isset($_POST['edit'])) {
			
			$id     = $_POST['id'];
			$nama   = $_POST['nama'];
			$alamat = $_POST['alamat'];
			$nohp   = $_POST['nohp'];
			$user   = $_POST['user'];
			$pass   = $_POST['pass'];

			if ($nama !="") {
				$dqml = "UPDATE pengguna SET nama='$nama',
											 alamat='$alamat',
											 no_hp = '$nohp'
											 WHERE id_pengguna = '$id' ";

				$query = mysqli_query($db, $dqml);
				$sqluser = mysqli_query($db, "UPDATE user SET username='$user',
															  password = '$pass'
															  WHERE id_pengguna='$id' ");

				echo "
					<script>
						alert('Update Data Pengguna Sukses');
						window.location.href='?page=data_pengguna/data_pengguna.php'
					</script>
				";
			}

		} elseif (isset($_POST['del'])) {
			
			$hapus = $_POST['hapus'];
			foreach ($hapus as $id) {
				if ($id == TRUE) {
					$sql = "DELETE FROM pengguna WHERE id_pengguna='$id' ";
					$ex = mysqli_query($db, $sql);
					echo "
						<script>
							alert('Hapus Pengguna Sukses');
							window.location.href='?page=data_pengguna/data_pengguna.php'
						</script>
					";
				}
			} 
		
		} else {
			echo "
				<script>
					alert('Hapus Gagal');
					window.location.href='?page=data_pengguna/data_pengguna.php'
				</script>
			";
		}

	}
