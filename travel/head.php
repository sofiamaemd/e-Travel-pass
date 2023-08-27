<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content = "text/html;charset=UTF-8" />
<head>
	<title> Online Travel Pass </title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description">
<meta name="keywords" content="Admin , Responsive">
<meta name = "author" content = "sofiamaemd">

<?php include('connect.php');
$que = "SELECT * FROM manage_website";
$query = $conn->query($que);
while($row = mysqli_fetch_array($query))
{
	//print_r($row);
	extract($row);
	$logo = $row['logo'];

}
?>
<link rel="icon" href="uploadImage/Logo/<?php echo $logo; ?>" type="image/x-icon">
<link href="files/assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

<link rel = "stylesheet" type = "text/css" gref = "files/bower_components/bootstrap/css/bootstrap.min.css">

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s), dl=l!='dataLayer'?'&l='+l;'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-T9PCZX9');</script>

<link rel="stylesheet" type="text/css" href="files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="files/assets/pages/data-table/css/buttons.dataTables.min.css">


<link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="files/assets/icon/feather/css/feather.css">

<link rel="stylesheet" type="text/css" href="files/assets/css/style.css">


<link rel="stylesheet" type="text/css" href="files/assets/css/jquery.mCustomScrollbar.css">

<link rel="stylesheet" href="popup_style.css">
</head>