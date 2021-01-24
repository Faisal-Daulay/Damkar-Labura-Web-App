<?php 
	
	include 'include/config.php';

	if ($_POST) {
		$id_lapor = $_POST['id'];
		$sql = "INSERT INTO approve_lapor (id_lapor, status_approve) VALUES('$id_lapor', 'approve')";
		$execute = mysqli_query($db, $sql);
	    $dml = mysqli_query($db, "UPDATE daftar_lapor SET status_lapor = 0 WHERE id_lapor = $id_lapor ");
		echo "
			<script>
				alert('Laporan Berhasil Diterima');
				window.location.href='index.php'
			</script>
		";
	} else {
		echo "
			<script>
				alert('Laporan Tolak');
				window.location.href='index.php'
			</script>
		";
	}