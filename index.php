<?php
require_once('connector.php');

if (!$db) {
	die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION["user_id"])) {

	?>

	<!DOCTYPE html>
	<html>

	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Home</title>


		<!-- Site favicon -->
		<link rel="icon" type="image/png" sizes="180x180" href="vendors/images/logo-dilg.png" />


		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

	</head>

	<body>
		<?php include('header.php');

		$namecode = mysqli_query($db, "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'");
		$namesql = mysqli_fetch_assoc($namecode);
		?>

		<div class="main-container">

			<div class="xs-pd-20-10 pd-ltr-20">

				<!-- FIRST SECTION -->
				<div class="row pb-10">
					<div class="col-md-8  mb-20">
						<!-- <div class="col-md-8 col-lg-7 mb-20"> -->
						<div class="card-box  p-5">
							<div class="d-flex flex-column pb-0 pb-md-3">

								<!-- Content -->
								<div class="mb-3">
									<div class="h5"><span class="color-darkpink poppins">Santa Rosa City,</span> Barangay
									</div>
									<div class="barangay-name display-3 weight-600 poppins">
										<?php echo $namesql['name']; ?>
									</div>
								</div>

								<div class="d-flex flex-wrap ">
									<div class="col-md-9 col-xl-7 px-0">
										<div class="col-12 px-0 pb-4 ">
											<svg class="col-9 px-0" xmlns="http://www.w3.org/2000/svg" width="85%"
												height="6" viewBox="0 0 364 6" fill="none">
												<path d="M0 6H364V0H0V6Z" fill="var(--darkpink)" />
											</svg>
										</div>
										<div class="row col-12 pt-4">
											<div class="h5"><span class="text-uppercase">Status: </span><span
													class="color-darkpink">
													<?php echo $namesql['eligibility']; ?>
												</span> for the Seal of Good Local
												Governance for Barangay (SGLGB)</div>
										</div>
									</div>
									<div class="col-md-3 d-flex justify-content-center align-items-center">
										<img src="vendors/images/logo-seal-src.png" alt="" width="122px" height="122px">
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- 2 RIGHT CARDBOX -->
					<div class="col-md-4 mb-20">
						<div class="d-flex height-100-p flex-column">
							<!-- SCHEDULE -->
							<div class="card-box h-50 pd-20 mb-20 d-flex flex-column" data-bgcolor="#fff"
								style="justify-content: space-between;">
								<div class="h6 weight-700 color-darkpink w-100">Schedule</div>
								<div>
									<p class="h3 weight-500 w-100 ">November 13, 2025</p>
								</div>
								<div class=" weight-300 w-100 "><small>*Please note that schedule may change.</small></div>
							</div>

							<div class="modal fade" id="submGuideLn" tabindex="-1" role="dialog"
								aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="card-box w-100 p-3">
										<div class="modal-header ">
											<h1 class="poppins d-inline-block weight-600 pb-2 pr-5" id="exampleModalLabel"
												style="border-bottom: 6px solid var(--darkpink);">Submission<br>Deadlines
											</h1>
											<button class="btn ml-auto" type="button" class="close" data-dismiss="modal"
												aria-label="Close">
												<img src="vendors/images/icon-close.svg" alt="close button" srcset="">
											</button>
										</div>
										<div class="modal-body">
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
												tempor
												incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
												nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat.
												Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
												eu
												fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
												in
												culpa qui officia deserunt mollit anim id est laborum.</p>

											<p>If in need of more time, <a href="request.php" style="color: #3B83CC">request
													an
													extension</a>.
												Note that you can only request one at a time.</p>
										</div>
									</div>
								</div>
							</div>

							<!-- DEADLINE -->
							<div class="card-box h-50 pd-20 d-flex flex-column" data-bgcolor="#fff"
								style="justify-content: space-between;">
								<div class="row px-4">
									<div class="h3 weight-700 color-darkpink">Deadline of Submissions
										<button type="button" class="btn-tooltip px-1" data-toggle="modal"
											data-target="#submGuideLn">
											<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
												viewBox="0 0 37 37" fill="none">
												<path
													d="M18.5 3.08331C9.99925 3.08331 3.08333 9.99923 3.08333 18.5C3.08333 27.0007 9.99925 33.9166 18.5 33.9166C27.0007 33.9166 33.9167 27.0007 33.9167 18.5C33.9167 9.99923 27.0007 3.08331 18.5 3.08331ZM18.5 30.8333C11.6997 30.8333 6.16667 25.3003 6.16667 18.5C6.16667 11.6997 11.6997 6.16665 18.5 6.16665C25.3003 6.16665 30.8333 11.6997 30.8333 18.5C30.8333 25.3003 25.3003 30.8333 18.5 30.8333Z"
													fill="#3B83CC" />
												<path
													d="M16.9583 16.9584H20.0417V26.2084H16.9583V16.9584ZM16.9583 10.7917H20.0417V13.875H16.9583V10.7917Z"
													fill="#3B83CC" />
											</svg>
										</button>
									</div>

								</div>
								<div class="px-4">
									<p class="h3 weight-500">December 25, 2025</p>
								</div>
								<div class="px-4 weight-300"><small>*Kindly ensure the timely submission of the
										documents.</small></div>
							</div>
						</div>
					</div>
				</div>

				<!-- END OF FIRST SECTION -->


				<div class="title pb-20">
					<h2 class="h3 mb-0">Overview of Documents</h2>
				</div>

				<div class="row pb-10 ">

					<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
						<a href="submission.php?tab=submission">
							<div class="card-box d-board-sec-2 height-100-p p-3">

								<?php
								$barangay = (int) $_SESSION["user_id"];
								$sql = "SELECT overall_status FROM areas WHERE barangay = '$barangay' AND govarea = 'Financial Administration and Sustainability'";
								$result = mysqli_query($db, $sql);

								if ($row = mysqli_fetch_assoc($result)) {
									$status = $row['overall_status'];

									if ($status == 'Pending') {
										echo '<div class="doc-status doc-status-pending small px-3">';
									} else if ($status == 'Completed') {
										echo '<div class="doc-status doc-status-success small px-3">';
									}
									// Output the overall_status for the current row
									echo $row['overall_status'];
								}
								?>
							</div>
							<div class="heading">
								<div class="h4">Financial Administration and Sustainability</div>
							</div>
					</div>
					</a>
				</div>

				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<a href="submission.php?tab=completed">
						<div class="card-box d-board-sec-2 height-100-p p-3">

							<?php
							$barangay = (int) $_SESSION["user_id"];
							$sql = "SELECT overall_status FROM areas WHERE barangay = '$barangay' AND govarea = 'Disaster Preparedness'";
							$result = mysqli_query($db, $sql);

							if ($row = mysqli_fetch_assoc($result)) {
								$status = $row['overall_status'];

								if ($status == 'Pending') {
									echo '<div class="doc-status doc-status-pending small px-3">';
								} else if ($status == 'Completed') {
									echo '<div class="doc-status doc-status-success small px-3">';
								}
								// Output the overall_status for the current row
								echo $row['overall_status'];
							}
							?>


						</div>
						<div class="heading">
							<div class="h4">Disaster Preparedness</div>
						</div>
				</div>
				</a>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
				<a href="submission.php?tab=completed">
					<div class="card-box d-board-sec-2 height-100-p p-3">


						<?php
						$barangay = (int) $_SESSION["user_id"];
						$sql = "SELECT overall_status FROM areas WHERE barangay = '$barangay' AND govarea = 'Safety, Peace and Order'";
						$result = mysqli_query($db, $sql);

						if ($row = mysqli_fetch_assoc($result)) {
							$status = $row['overall_status'];

							if ($status == 'Pending') {
								echo '<div class="doc-status doc-status-pending small px-3">';
							} else if ($status == 'Completed') {
								echo '<div class="doc-status doc-status-success small px-3">';
							}
							// Output the overall_status for the current row
							echo $row['overall_status'];
						}
						?>


					</div>
					<div class="heading">
						<div class="h4">Safety, Peace and Order</div>
					</div>
			</div>
			</a>
		</div>

		<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
			<a href="submission.php?tab=submission">
				<div class="card-box height-100-p p-3">
					<div class="d-flex flex-wrap text-center py-3">
						<div class="col-md-12">
							<img src="vendors/images/icon-inbox-lg.svg" alt="" width="86px" height="74px">
						</div>
						<div class="col-md-12 py-2">
							<div class="h5 weight-600">Go to Submissions</div>
						</div>
					</div>
				</div>
			</a>
		</div>
		</div>


		</div>
		</div>

		<!-- Footer -->
		<div class="footer-wrap pd-10 px-5">
			© Copyright <span class="font-weight-bold">Department of Interior and Local Government Santa Rosa City.</span>
			All Rights Reserved.
		</div>

		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>

	</body>

	</html>
<?php } else {
	echo "<script>alert('Access denied.');</script>";
} ?>