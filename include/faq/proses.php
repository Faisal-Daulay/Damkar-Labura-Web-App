<?php 
	include 'include/config.php';

	if ($_POST) {
		$faq = htmlentities($_POST['faq']);
		$tentang = htmlentities($_POST['tentang']);

		$sql = "UPDATE faqandabout SET faq = '$faq', tentang = '$tentang' WHERE id_faq = '1' ";
		$query = mysqli_query($db, $sql);

		echo "	
			<script>
				alert('Update Data Success');
				window.location.href='?page=faq/faq.php'
			</script>
		";
	}

?>