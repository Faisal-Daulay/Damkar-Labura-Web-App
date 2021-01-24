<?php 
	include 'include/config.php';

	if ($_POST) {
		$id = htmlentities($_POST['id']);
		$judul = htmlentities($_POST['judul']);
		$isi = $_POST['isi'];
		
        $lokasi_file = $_FILES['upload']['tmp_name'];
        $tipe_file   = $_FILES['upload']['type'];
        $nama_file   = $_FILES['upload']['name'];
        $size        = $_FILES['upload']['size'];
        $direktori   = "android/uploads/<?= $foto; ?>";
        
        $tgl = date('Y-m-d');
		if (isset($_POST['add'])) {
			move_uploaded_file($lokasi_file, $direktori);
			$sql = "INSERT INTO berita(judul, isi, tgl, url_img) VALUES('$judul', '$isi', '$tgl', '$nama_file') ";
			$query = mysqli_query($db, $sql);

			echo "
				<script>
					alert('Insert Data Success');
					window.location.href='?page=berita/berita.php'
				</script>
			";
		} elseif (isset($_POST['update'])) {
			if ($nama_file!="") {
				move_uploaded_file($lokasi_file, $direktori);
				$sql = "UPDATE berita SET judul ='$judul',
										  isi = '$isi',
										  tgl = '$tgl',
										  url_img = '$nama_file'
										  WHERE id_berita = '$id' ";
				$query = mysqli_query($db, $sql);

				echo "	
					<script>
						alert('Update Data Success');
						window.location.href='?page=berita/berita.php'
					</script>
				";
			} else {
				move_uploaded_file($lokasi_file, $direktori);
				$sql = "UPDATE berita SET judul ='$judul',
										  isi = '$isi',
										  tgl = '$tgl'
										  WHERE id_berita = '$id' ";
				$query = mysqli_query($db, $sql);

				echo "	
					<script>
						alert('Update Data Success');
						window.location.href='?page=berita/berita.php'
					</script>
				";
			}
		} elseif (isset($_POST['del'])) {
			$hapus = $_POST['hapus'];
			foreach ($hapus as $id) {
				if ($id == true) {
					$sql = "DELETE FROM berita WHERE id_berita='$id' ";
					$ex = mysqli_query($db, $sql);
					echo "
						<script>
							alert('Delete Data Success');
							window.location.href='?page=berita/berita.php'
						</script>
					";
				}
			}
		}
	}

?>

