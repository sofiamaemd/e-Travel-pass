<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');?>

<?php if(isset($_GET['id'])){ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
	<div class="popup__background">
		<div class="popup__content">
			<h3 class="popup__content__title">
				Sure
			</h1>
			<p>Are you sure you want to DELETE this record?</p>
			<p>
				<a href="del_roles.php?id=<?php echo $_GET['id']; ?>" class = "button button--success" data-for = "js_success-popup">Yes</a>
				<a href = "view_roles.php" class="button button--error" data-for = "js_success-popup">No</a>
			</p>
		</div>
	</div>
<?php } ?>
<div class="pcoded-content">
	<div class="pcoded-inner-content">

		<div class="main-body">
			<div class="page-wrapper">

				<div class="page-header">
					<div class="row align-items-end">
						<div class="col-lg-8">
							<div class="page-header-title">
								<div class="d-inline">
									<h4> e-Pass </h4>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="dashboard.php"> <i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a> Manage e-Pass </a>
									</li>
									<li class="breadcrumb-item"><a href="pass.php">e-Pass</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				
				<div class="page-body">
					<div class="card">
						<div class="col-sm-10">
							<a href="addpass.php"><button class="btn btn-primary pull-right">+ Add e-Pass</button></a>
						</div>
					</div>
					<div class="card-block">
						<div class="table-responsive dt-responsive">
							<table id="dom-jqry" class="table table-striped table-bordered nowrap">
								<thead>
									<tr>
										<th> S.NO </th>
										<th> Pass Number </th>
										<th> Full Name </th>
										<th> Contact Number </th>
										<th> Email </th>
										<th> Creation Date </th>
										<th> Action </th>
									</tr>
								</thead>
								<tbody>
									<?php
									
									$sql = "SELECT * FROM tblpass";
									$result = $conn->query($sql);
									$i=1;
									while($row = $result->fetch_assoc()) {
										//print_r($row)

										?>

										<tr>
											<td><?php echo $row['id'];?></td>
											<td><?php echo $row['PassNumber'];?></td>
											<td><?php echo $row['FullName'];?></td>
											<td><?php echo $row['ContactNumber'];?></td>
											<td><?php echo $row['Email'];?></td>
											<td><?php echo $row['PasscreationDate'];?></td>
											<td>
												<a href="editpass.php?editid=<?=$row['id'];?>" class = "btn btn-xs btn-primary"><i class="feather icon-edit m-t-10 f-16 " ></i></a>
												<a href="viewpass.php?viewid=<?=$row['id'];?>" class = "btn btn-xs btn-danger"><i class="feather icon-edit m-t-10 f-16 " ></i></a>

											</td>
										</tr>
										<?php $i++;

									} ?>
								</tbody>
								<tfoot>
									<tr>
										<th> S.NO </th>
										<th> Pass Number </th>
										<th> Full Name </th>
										<th> Contact Number </th>
										<th> Email </th>
										<th> Date Created </th>
										<th> Action </th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="#">
	</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php if(!empty($_SESSION['success'])) { ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
	<div class="popup__background"></div>
	<div class="popup__content">
		<div class="popup__content__title">
			Success
		</h1>
		<p><?php echo $_SESSION['success']; ?></p>
		<p>
			<?php echo "<script>setTimeout(\"location.href = 'pass.php';\", 1500);</script>"; ?>
			<!-- button optional <button class="button button--success" data-for="js_success-popup">Close </button> -->
		</p>
	</div>
</div>

<?php unset($_SESSION["success"]);

} ?>
<?php if(!empty($_SESSION['error'])) { ?>
	<div class="popup popup--icon -error js_error-popup popup--visible">
		<div class="popup__background"></div>
			<div class="popup__content">
				<h3 class="popup__content__title">
					Error
				</h1>
				<p><?php echo $_SESSION['error']; ?></p>
				<p>
					<?php echo "<script>setTimeout(\"location.href = 'pass.php';\",1500);</script>"; ?>
				</p>
			</div>
		</div>

		<?php unset($_SESSION["error"]); 
} ?>

<script>
	var addButtonTrigger = function addButtonTrigger(el) {
	el.addEventListener('click', function () {
		var popupEl = document.querySelector('.' + el.dataset.for);
		popupEl.classList.toggle('popup--visible');

	} );
};

Array.from(document.querySelectorAll('button[data-for')).
forEach(addButtonTrigger);
</script>




