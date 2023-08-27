<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');?>
<?php
session_start();
error_reporting();

if(strlen($_SESSION['cpmsaid']==0)) {
	header('location:logout.php');
} else{
	if(isset($_POST['submit']))
	{

		$mpmsaid = $_SESSION['cpmsaid'];
		$catname = $_SESSION['catname'];
		$ret = "SELECT CategoryName FROM tblcategory WHERE CategoryName=:catname";
		$query = $dbh->prepare($ret);
		$query->bindParam(':catname', $catname, PDO::PARAM_STR);

		$query->execute();
		$results = $query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() == 0)
		{
			$sql = "INSERT INTO tblcategory(CategoryName) VALUES (:catname)";
			$query = $dbh->prepare($sql);
			$query->bindParam(':catname', $catname, PDO::PARAM_STR);

			$query->execute();

			$LastInsertId = $dbh->lastInsertId();
			if($LastInsertId>0) {
				echo '<script>alert("Category has been added. ")</script>';
				echo "<script>window.location.href = 'add-category.php'</script>";

			}
		}
			else{
				echo '<script>alert("Something Went Wrong. Please try again. ")</script>';

			}
			else{
				echo "<script>alert('Category name already exists. Please try again. ')</script>";
			}
		}
	}
		?>

<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Add Category</h4>

</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="dashboard.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Category</a>
</li>
<li class="breadcrumb-item"><a href="assign_roles.php">Add Category</a>
</li>
</ul>
</div>
</div>
</div>
</div>


<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<!-- <h5>Basic Inputs Validation</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
</div>
<div class="card-block">
<!-- <form id="main" method="post" enctype="multipart/form-data">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Category Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="role_name" id="name" placeholder="Enter Category...." required="">
<span class="messages"></span>
</div>
</div> 


<br>


<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Submit</button>
</div>
</div>
</form> -->

<form method="post" enctype="multipart/form-data"> 
                                    
    <div class="form-group"> <label for="exampleInputEmail1">Category Name</label> <input type="text" name="catname" value="" class="form-control" required='true'> </div>
   
     
     <p style="padding-left: 450px"><button type="submit" class="btn btn-primary" name="submit" id="submit">Add</button></p> </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
	
