<?php 

	include 'include/config.php';

	if ($_POST) {

		if (isset($_POST['del'])) {
			$hapus = $_POST['hapus'];
			foreach ($hapus as $id) {
				if ($id == true) {
					$sql1 = mysqli_query($db, "DELETE FROM daftar_lapor WHERE id_lapor='$id' ");
					$sql2 = mysqli_query($db, "DELETE FROM approve_lapor WHERE id_lapor='$id' ");
					echo "
						<script>
							alert('Hapus Sukses');
							window.location.href='?page=daftar_laporan/daftar_lap.php'
						</script>
					";
				}
			}
		} else {
			echo "
				<script>
					alert('Hapus Gagal');
					window.location.href='?page=daftar_laporan/daftar_lap.php'
				</script>
			";
		}

	}
