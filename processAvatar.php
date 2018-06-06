<?php
$db = mysqli_connect("localhost", "root", "", "perfectmatch");
	$msg = "";

	if (isset($_POST['upload'])) {
		$target = "avatars/".basename($_FILES['image']['name']);
        //SUPOSTAMENTE não é definida, mas é definida no index process login
        $ava = $_POST["id_perfil"];
		$image = $_FILES['image']['name'];
        

		$sql="update perfis set avatar='$image' where id_login='$ava'";
		mysqli_query($db, $sql);

		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
        header("Location: mainPage.php");
	}
header("Location: mainPage.php");
?>