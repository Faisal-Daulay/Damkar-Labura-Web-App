<?php 

	include 'include/config.php';

	if ($_POST) {

		$id     = $_POST['id'];
		$user   = $_POST['user'];
		$pass   = $_POST['pass'];
		$sqluser = mysqli_query($db, "UPDATE user SET username='$user',
															  password = '$pass'
															  WHERE id_user='$id' ");

		echo "
			<script>
				alert('Update Data User Sukses');
				window.location.href='index.php'
			</script>
		";
	}
