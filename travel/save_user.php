<?php require_once('check_login.php'); ?>
<?php date_default_timezone_set('Asia/Manila');

$current_date = date('Y-m-d');
include ('connect.php');
$passw = hash('sha256', $_POST['password']);


function createSalt()
{
	return '2123293dsj2hu2nikhiljdsd';

}
$salt = createSalt();
$pass = hash('sha256', $salt . $passw);

$image = $_FILES['image']['name'];
$target = "../uploadImage/Profile/".basename($image);

if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

	$msg = "Image uploaded successfully";

}else{
	$msg = "Failed to upload image";

}

extract($_POST);
$sql = "INSERT INTO admin (username, email, password, fname, lname, gender, dob, contact, addr, notes, created_on, image, role_id) VALUES ('user', '$email', '$pass', '$fname', '$lname', '$gender', '$dob', '$contact', '$addr', '$notes', CURDATE(), '$image', '$role_id')";

if ($conn->query($sql) === TRUE) {
	$_SESSION['success'] = 'Record successfully added';
	?>
	<script type="text/javascript">
		window.location = "view_user.php";
	</script>
	<?php

}else{
	$_SESSION['error'] = 'Something went wrong';
	?>
	<script type="text/javascript">
		window.location = "view_user.php";
	</script>
	<?php


} ?>