<?php
	include 'include/config.php';

	if ($_POST) {
		$id = $_POST['id'];
		$kategori = htmlentities($_POST['kategori']);

		if (isset($_POST['add'])) {
			
			$sql = "INSERT INTO kategori(kategori) VALUES('$kategori') ";
			$query = mysqli_query($db, $sql);

			echo "	
				<script>
					alert('Insert Data Success');
					window.location.href='?page=kategori/kategori.php'
				</script>
			";

		} elseif (isset($_POST['update'])) {
			$sql = "UPDATE kategori SET kategori='$kategori' WHERE id_kategori = '$id' ";
			$query = mysqli_query($db, $sql);

			echo "	
				<script>
					alert('Update Data Success');
					window.location.href='?page=kategori/kategori.php'
				</script>
			";
		} elseif (isset($_POST['del'])) {
			$hapus = $_POST['hapus'];
			foreach ($hapus as $id) {
				if ($id == true) {
					$sql = "DELETE FROM kategori WHERE id_kategori='$id' ";
					$ex = mysqli_query($db, $sql);
					echo "
						<script>
							alert('Delete Data Success');
							window.location.href='?page=kategori/kategori.php'
						</script>
					";
				}
			}
		}

	} else {

	}
?>