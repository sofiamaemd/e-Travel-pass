<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php include('connect.php');?>

<?php if(isset($_GET['id'])){ ?>

	<div class="popup popup--icon -question js_question-popup popup--visible">
		<div class="popup__background"></div>
		<div class="popup__content">
			<h3 class = "popup__content__title">
				Sure.
			</h1>
			<p> Are you sure to DELETE this record? </p>
			<p>
				<a href="del_user.php?id=<?php echo $_GET['id']; ?>" class= "button button--success" data-for= "js_success-popup"> Yes </a>
				<a href="view_user.php" class="button button--error" data-for = "js_success-popup"> No </a>
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
									<h4> Users </h4>

								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="page-header-breadcrumb">
								<ul class="breadcrumb-title">
									<li class="breadcrumb-item">
										<a href="dashboard.php"> <i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a> Users </a>
									</li>
									<li class="breadcrumb-item"><a href="view_user.php"> Users </a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="page-body">

					<div class="card">
						<div class="card-header">
							<div class="col-sm-10">
								<?php if(isset($useroles)){ if(in_array("create_user", $useroles)){ ?>
									<a href="add_user.php"><button class="btn btn-primary pull-right">+ Add Users </button>
									</a>
									<?php } } ?>
								</div>
							</div>
							
							<div class="card-block">
								<div class="table-responsive dt-responsive">
									<table id="dom-jqry" class="table table-striped table-bordered nowrap">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												<th>Gender</th>
												<th>Phone</th>
												<th>Email</th>
												<th>Role</th>
												<th>Created at</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php

											$sql = "SELECT * FROM `admin`";
											$result = $conn->query($sql);
											$i = 1;
											while($row = $result->fetch_assoc()) {
												$sql1 = "SELECT * FROM tbl_role where id = '".$row['role_id']."' and delete_status = 0";
												$result1 = $conn->query($sql1);
												$row1 = $result1->fetch_assoc();
												?>
												<tr>
													<td><?php echo $row['id'];?></td>
													<td><?php echo $row['fname']." ".$row['lname']; ?></td>
													<td><?php echo $row['gender'];?></td>
													<td><?php echo $row['contact'];?></td>
													<td><?php echo $row['email'];?></td>
													<td><?php echo $row1['role_name'];?></td>
													<td><?php echo $row['created_on'];?></td>
													<td>
														<?php if(isset($useroles)) {
															if(in_array("edit_user", $useroles)){ ?>
																<a href="edit_user.php?id=<?=$row['id'];?>" class="btn btn-xs btn-primary"><i class="feather icon-edit m-t-10 f-16"></i></a>
																<?php }	} ?>

																<?php if(isset($useroles)){
																	if(in_array("delete_user", $useroles)){ ?>
																		<a href="view_user.php?id=<?=$row['id'];?>" class = "btn btn-xs btn-danger"> <i class="feather icon-trash-2 close-card m-b-0"></i></a>
																		<?php } } ?>
																	</td>
																</tr>
																<?php $i++;}
																?>

															</tbody>

															<tfoot>
																<tr>
																	<th>ID</th>
																	<th>Name</th>
																	<th>Gender</th>
																	<th>Phone</th>
																	<th>Email</th>
																	<th>Role</th>
																	<th>Created at</th>
																	<th>Action</th>
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


<?php include("footer.php"); ?>
		<?php if(!empty($_SESSION['success'])){ ?>
			<div class="popup popup--icon -success js_success-popup popup--visible">
				<div class="popup__background"></div>
				<div class="popup__content">
					<h3 class="popup__content__title">
						Success
					</h1>
					<p><?php echo $_SESSION['success']; ?></p>
					<p>
						<?php echo "<script>setTimeout(\"location.href = 'view_user.php';\",1500);</script>"; ?>
						<!-- buutoon ??? hmm -->

					</p>
				</div>
			</div>

			<?php unset($_SESSION["success"]); } ?>

			<?php if(!empty($_SESSION['error'])) { ?>
				<div class="popup popup--icon -error js_error-popup popup--visible">
					<div class="popup__background"></div>
					<div class="popup__content">
						<h3 class="popup__content__title">
							Error
						</h1>
						<p><?php echo $_SESSION['error']; ?></p>
						<p>
							<?php echo "<script>setTimeout(\"location.href = 'view_user.php';\", 1500);</script>"; ?>
							<!-- haha button again??? ambot! -->
						</p>
					</div>
				</div>
				<?php unset($_SESSION["error"]); 	} ?>
				<script>
					var addButtonTrigger = function addButtonTrigger(el) {
						el.addEventListener('click', function() {
							var popupEl = document.querySelector('.' + el.dataset.for);
							popupEl.classList.toggle('popup--visible');

						});
					};

					Array.from(document.querySelectorAll('button[data-for]')).
					forEach(addButtonTrigger);
				</script>



											

