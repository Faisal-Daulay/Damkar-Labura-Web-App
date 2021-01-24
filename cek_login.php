<?php 
	session_start();
	include 'include/config.php';

	if ($_POST) {

		$user = htmlentities($_POST['user']);
		$pass = htmlentities($_POST['pass']);

		if ($user && $pass) {
			$sql = "SELECT * FROM user WHERE username='$user' AND password='$pass' ";
			$execute = mysqli_query($db, $sql);
			$rows = mysqli_num_rows($execute);
			if ($rows > 0 ) {
				
				$getAll = mysqli_fetch_array($execute);
				$username = $getAll['username'];
				$status_user = $getAll['status_user'];
				$id_pengguna = $getAll['id_pengguna'];
				$id_user = $getAll['id_user'];

				$_SESSION['username'] = $username;
				$_SESSION['status_user'] = $status_user;
				$_SESSION['id_pengguna'] = $id_pengguna;
				$_SESSION['id_user'] = $id_user;

				if ($status_user == "admin") {
					echo "
						<script>
							window.location.href = 'index.php'
						</script>
					";
				}

			} else {
				echo "
					<script>
						window.location.href = 'login.php'
					</script>
				";
			}
		} else {
			echo "
				<script>
					window.location.href = 'login.php'
				</script>
			";
		}
	} else {
		echo "
			<script>
				window.location.href = 'login.php'
			</script>
		";
	}
?>