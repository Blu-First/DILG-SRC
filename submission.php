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
		<title>Submissions</title>


		<!-- Site favicon -->
		<link rel="icon" type="image/png" sizes="180x180" href="vendors/images/logo-dilg.png" />


		<!-- Mobile Specific Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css" />
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />
		<link rel="stylesheet" type="text/css" href="src/plugins/dropzone/src/dropzone.css" />

	</head>

	<body>

		<?php include('header.php'); ?>
		<div class="main-container">
			<div class="xs-pd-20-10 pd-ltr-20">

				<!--Submissions & Completed Tab Slider-->
				<div class="pl-3">
					<ul class="nav ml-2" id="doc-tab-list" role="tablist">
						<li class="nav-item secondary-nav" role="navigation">
							<button class="nav-link  active px-0 pb-0 ml-4 mb-10" id="submission-tab" data-toggle="tab"
								href="#submission" role="tab" aria-controls="Submission"
								aria-selected="true">Submission</button>
						</li>
						<li class="nav-item secondary-nav" role="navigation">
							<button class="nav-link secondary-nav px-0 pb-0 ml-4 mb-10" id="completed-tab" data-toggle="tab"
								href="#completed" role="tab" aria-controls="Completed"
								aria-selected="false">Completed</button>
						</li>
					</ul>
				</div>

				<div class="tab-content" id="doc-tab-content">
					<!-- Submissions Tab -->
					<div class="tab-pane fade show active" id="submission" role="tabpanel" aria-labelledby="submission-tab">
						<div class="container-fluid my-3">
							<div class="card-box">
								<div class="row mx-3 px-4">
									<div class="h2 my-4">Documents Submissions
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
							</div>
						</div>
						<div class="modal fade" id="submGuideLn" tabindex="-1" role="dialog"
							aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="card-box w-100 p-3">
									<div class="modal-header ">
										<h1 class="poppins d-inline-block weight-600 pb-2 pr-5" id="exampleModalLabel"
											style="border-bottom: 6px solid var(--darkpink);">Submission<br>Guidelines</h1>
										<button class="btn ml-auto" type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<img src="vendors/images/icon-close.svg" alt="close button" srcset="">
										</button>
									</div>
									<div class="modal-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
											incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
											nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
											Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
											fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
											culpa qui officia deserunt mollit anim id est laborum.</p>
									</div>
								</div>
							</div>
						</div>
						<!-- Core Governance -->
						<!--Core Side tabs-->
						<div class="row px-3 mb-5">
							<div class="col-5">

								<div class="card-box">
									<div class="card">
										<button type="button" class="collapsible-header " data-toggle="collapse"
											data-target="#coreGovernance" aria-expanded="true">
											<div class="d-flex justify-content-center">
												<h4 class="weight-700" style="color: whitesmoke;">Core Governance Area
												</h4>
											</div>
										</button>
									</div>
									<div class="card-body  h-100" class="collapse show" id="coreGovernance">
										<nav class="nav flex-column px-4 py-3" id="" role="tablist">
											<a class="nav-link section-nav show active" id="" data-toggle="tab"
												data-target="#core-gov-1" role="tab" aria-controls="" aria-selected="true">
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"
															xmlns="http://www.w3.org/2000/svg">
															<path
																d="M21 4H3C2.73478 4 2.48043 4.10536 2.29289 4.29289C2.10536 4.48043 2 4.73478 2 5V19C2 19.2652 2.10536 19.5196 2.29289 19.7071C2.48043 19.8946 2.73478 20 3 20H21C21.2652 20 21.5196 19.8946 21.7071 19.7071C21.8946 19.5196 22 19.2652 22 19V5C22 4.73478 21.8946 4.48043 21.7071 4.29289C21.5196 4.10536 21.2652 4 21 4ZM20 15C19.2044 15 18.4413 15.3161 17.8787 15.8787C17.3161 16.4413 17 17.2044 17 18H7C7 17.2044 6.68393 16.4413 6.12132 15.8787C5.55871 15.3161 4.79565 15 4 15V9C4.79565 9 5.55871 8.68393 6.12132 8.12132C6.68393 7.55871 7 6.79565 7 6H17C17 6.79565 17.3161 7.55871 17.8787 8.12132C18.4413 8.68393 19.2044 9 20 9V15Z"
																fill="currentColor" />
															<path
																d="M12 8C9.794 8 8 9.794 8 12C8 14.206 9.794 16 12 16C14.206 16 16 14.206 16 12C16 9.794 14.206 8 12 8ZM12 14C10.897 14 10 13.103 10 12C10 10.897 10.897 10 12 10C13.103 10 14 10.897 14 12C14 13.103 13.103 14 12 14Z"
																fill="currentColor" />
														</svg>
													</div>
													Financial Administration and Sustainability
												</div>
											</a>
											<a class="nav-link section-nav " id="" data-toggle="tab"
												data-target="#core-gov-2" role="tab" aria-controls="" aria-selected="false">
												<div class="d-flex align-items-center">
													<div class=" mr-3">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"
															xmlns="http://www.w3.org/2000/svg">
															<path d="M10 13L9 18H11V22L14.975 16H13L14 13H10Z"
																fill="currentColor" />
															<path
																d="M18.944 10.112C18.507 6.67 15.56 4 12 4C9.244 4 6.85 5.611 5.757 8.15C3.609 8.792 2 10.819 2 13C2 15.757 4.243 18 7 18V16C5.346 16 4 14.654 4 13C4 11.597 5.199 10.244 6.673 9.985L7.254 9.882L7.446 9.323C8.149 7.273 9.895 6 12 6C14.757 6 17 8.243 17 11V12H18C19.103 12 20 12.897 20 14C20 15.103 19.103 16 18 16H17V18H18C20.206 18 22 16.206 22 14C21.9988 13.1035 21.6971 12.2333 21.1431 11.5285C20.5891 10.8237 19.8148 10.3249 18.944 10.112Z"
																fill="currentColor" />
														</svg>
													</div>
													Disaster Preparedness
												</div>
											</a>
											<a class="nav-link section-nav" id="" data-toggle="tab"
												data-target="#core-gov-3" role="tab" aria-controls="" aria-selected="false">
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
															viewBox="0 0 20 18" fill="none">
															<path
																d="M18 4H15V2C15 1.46957 14.7893 0.960859 14.4142 0.585786C14.0391 0.210714 13.5304 0 13 0H7C6.46957 0 5.96086 0.210714 5.58579 0.585786C5.21071 0.960859 5 1.46957 5 2V4H2C1.46957 4 0.960859 4.21071 0.585786 4.58579C0.210714 4.96086 0 5.46957 0 6V16C0 16.5304 0.210714 17.0391 0.585786 17.4142C0.960859 17.7893 1.46957 18 2 18H18C18.5304 18 19.0391 17.7893 19.4142 17.4142C19.7893 17.0391 20 16.5304 20 16V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4ZM7 2H13V4H7V2ZM14 12H11V15H9V12H6V10H9V7H11V10H14V12Z"
																fill="currentColor" />
														</svg>
													</div>
													Safety, Peace and Order
												</div>
											</a>
										</nav>
									</div>
								</div>
							</div>

							<div class="col-7">
								<div class="card-box p-4 height-100-p">
									<div class="row">
										<div class="tab-content w-100" id="">
											<!--Core Gvernance Area 1 Upload Box -->
											<div class="tab-pane fade show active  mx-4" id="core-gov-1" role="tabpanel"
												aria-labelledby="">
												<div class="h5 w-100 mb-0">Financial Administration and Sustainability</div>

												<form id="finangovDropzone" method="POST"
													class="dropzone dz-message my-3 w-100 py-4 "
													enctype="multipart/form-data">
													<div class="dz-message">
														<div class="col-auto" style="color: gray;">
															<img class="my-3" src="vendors/images/icon-upload.svg" alt="">

														</div>
														<div class=" text-center">
															<p class="h6 weight-300 mb-0">Drag and drop to upload</p>
															<button type="button" class="h6 weight-500 color-darkpink"
																style="background-color: transparent; border: none;">or
																browse files</button>
														</div>
													</div>

													<div class=" text-right">
														<button class="btn btn-primary btn-sm poppins" id="submit_finangov"
															type="submit">Submit</button>
													</div>

												</form>



											</div>
											<!--Core Gvernance Area 2 Upload Box -->
											<div class="tab-pane fade mx-4" id="core-gov-2" role="tabpanel"
												aria-labelledby="">
												<div class="h5 w-100 mb-0">Disaster Preparedness</div>
												<form id="disastgovDropzone" method="POST"
													class="dropzone dz-message my-3 w-100 py-4 "
													enctype="multipart/form-data">
													<div class="dz-message">
														<div class="col-auto" style="color: gray;">
															<img class="my-3" src="vendors/images/icon-upload.svg" alt="">

														</div>
														<div class=" text-center">
															<p class="h6 weight-300 mb-0">Drag and drop to upload</p>
															<button type="button" class="h6 weight-500 color-darkpink"
																style="background-color: transparent; border: none;">or
																browse files</button>
														</div>
													</div>

													<div class=" text-right">
														<button class="btn btn-primary btn-sm poppins" id="submit_disastgov"
															type="submit">Submit</button>
													</div>

												</form>
											</div>
											<!--Core Gvernance Area 3 Upload Box -->
											<div class="tab-pane fade mx-4" id="core-gov-3" role="tabpanel"
												aria-labelledby="">
												<div class="h5 w-100 mb-0">Safety, Peace and Order</div>
												<form id="spogovDropzone" method="POST"
													class="dropzone dz-message my-3 w-100 py-4 "
													enctype="multipart/form-data">
													<div class="dz-message">
														<div class="col-auto" style="color: gray;">
															<img class="my-3" src="vendors/images/icon-upload.svg" alt="">

														</div>
														<div class=" text-center">
															<p class="h6 weight-300 mb-0">Drag and drop to upload</p>
															<button type="button" class="h6 weight-500 color-darkpink"
																style="background-color: transparent; border: none;">or
																browse files</button>
														</div>
													</div>

													<div class=" text-right">
														<button class="btn btn-primary btn-sm poppins" id="submit_spogov"
															type="submit">Submit</button>
													</div>

												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Core Governance END -->

						<!-- Essential Governance -->
						<!--Essential Side tabs-->
						<div class="row px-3 mb-5">
							<div class="col-5">
								<div class="card-box">
									<div class="card">
										<button type="button" class="collapsible-header " data-toggle="collapse"
											data-target="#esseGovernance" aria-expanded="true">
											<div class="d-flex justify-content-center">
												<h4 class="weight-700" style="color: whitesmoke;">Essential Governance
													Area
												</h4>
											</div>
										</button>
									</div>
									<div class="card-body  h-100" class="collapse show" id="esseGovernance">
										<nav class="nav flex-column px-4 pb-4" id="" role="tablist">
											<a class="nav-link section-nav show active" id="" data-toggle="tab"
												data-target="#esse-gov-1" role="tab" aria-controls="" aria-selected="true">
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
															viewBox="0 0 13 17" fill="none">
															<path
																d="M5.11601 8.83197C6.6208 8.83197 7.84455 7.03797 7.84455 4.83197C7.84455 2.62597 6.6208 0.83197 5.11601 0.83197C3.61122 0.83197 2.38747 2.62597 2.38747 4.83197C2.38747 7.03797 3.61122 8.83197 5.11601 8.83197ZM6.13921 9.83197H4.09281C1.83562 9.83197 0 12.523 0 15.832V16.832H10.232V15.832C10.232 12.523 8.39639 9.83197 6.13921 9.83197Z"
																fill="currentColor" />
															<path
																d="M9.96194 7.88C10.3774 6.84209 10.5568 5.63731 10.4742 4.44C10.3521 2.656 9.67271 1.079 8.5622 0L7.80844 1.666C8.57175 2.408 9.03628 3.465 9.11677 4.64C9.15389 5.1861 9.10751 5.73746 8.98102 6.25398C8.85453 6.77051 8.6511 7.23921 8.38552 7.626L7.57242 8.818L8.67611 9.293C11.5629 10.533 11.5963 14.789 11.5963 14.832H12.9606C12.9606 13.043 12.3085 9.547 9.96194 7.88Z"
																fill="currentColor" />
														</svg>
													</div>
													Social Protection and Sensitivity
												</div>
											</a>
											<a class="nav-link section-nav " id="" data-toggle="tab"
												data-target="#esse-gov-2" role="tab" aria-controls="" aria-selected="false">
												<div class="d-flex align-items-center">
													<div class=" mr-3">
														<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
															viewBox="0 0 20 17" fill="none">
															<path
																d="M16.277 5C16.624 5.596 17.262 6 18 6C18.5304 6 19.0391 5.78929 19.4142 5.41421C19.7893 5.03914 20 4.53043 20 4C20 3.46957 19.7893 2.96086 19.4142 2.58579C19.0391 2.21071 18.5304 2 18 2C17.262 2 16.624 2.404 16.277 3H14V1C14 0.734784 13.8946 0.48043 13.7071 0.292893C13.5196 0.105357 13.2652 0 13 0H7C6.73478 0 6.48043 0.105357 6.29289 0.292893C6.10536 0.48043 6 0.734784 6 1V3H3.723C3.376 2.404 2.738 2 2 2C1.46957 2 0.960859 2.21071 0.585786 2.58579C0.210714 2.96086 0 3.46957 0 4C0 4.53043 0.210714 5.03914 0.585786 5.41421C0.960859 5.78929 1.46957 6 2 6C2.738 6 3.376 5.596 3.723 5H6V5.368C3.134 6.839 2.319 9.534 2.092 11H1C0.734784 11 0.48043 11.1054 0.292893 11.2929C0.105357 11.4804 0 11.7348 0 12V16C0 16.2652 0.105357 16.5196 0.292893 16.7071C0.48043 16.8946 0.734784 17 1 17H5C5.26522 17 5.51957 16.8946 5.70711 16.7071C5.89464 16.5196 6 16.2652 6 16V12C6 11.7348 5.89464 11.4804 5.70711 11.2929C5.51957 11.1054 5.26522 11 5 11H4.123C4.32 10.041 4.841 8.594 6.208 7.582C6.29753 7.70936 6.41601 7.81365 6.55369 7.88632C6.69137 7.95899 6.84433 7.99795 7 8H13C13.1558 7.99816 13.3089 7.95918 13.4467 7.88631C13.5844 7.81344 13.7028 7.70878 13.792 7.581C15.165 8.594 15.687 10.039 15.881 11H15C14.7348 11 14.4804 11.1054 14.2929 11.2929C14.1054 11.4804 14 11.7348 14 12V16C14 16.2652 14.1054 16.5196 14.2929 16.7071C14.4804 16.8946 14.7348 17 15 17H19C19.2652 17 19.5196 16.8946 19.7071 16.7071C19.8946 16.5196 20 16.2652 20 16V12C20 11.7348 19.8946 11.4804 19.7071 11.2929C19.5196 11.1054 19.2652 11 19 11H17.908C17.681 9.534 16.866 6.839 14 5.368V5H16.277ZM12 6H8V2H12V6Z"
																fill="currentColor" />
														</svg>
													</div>
													Business-Friendliness and Competitiveness
												</div>
											</a>
											<a class="nav-link section-nav" id="" data-toggle="tab"
												data-target="#esse-gov-3" role="tab" aria-controls="" aria-selected="false">
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
															viewBox="0 0 20 20" fill="none">
															<path
																d="M8.84 19.871L10 20C9.71518 17.7208 8.67098 15.6041 7.03581 13.991C5.40064 12.378 3.26982 11.3627 0.987 11.109L0 11L0.0209999 11.173C0.300031 13.4028 1.3219 15.4736 2.92184 17.0516C4.52179 18.6296 6.60656 19.6228 8.84 19.871ZM19.979 11.173L20 11L19.013 11.109C14.313 11.632 10.586 15.309 10 20L11.16 19.871C13.3934 19.6228 15.4782 18.6296 17.0782 17.0516C18.6781 15.4736 19.7 13.4028 19.979 11.173ZM16.063 3.5C15.7315 2.92582 15.1854 2.50685 14.545 2.33525C13.9046 2.16366 13.2222 2.25349 12.648 2.585C12.586 2.62 12.537 2.666 12.48 2.706C12.485 2.637 12.5 2.57 12.5 2.5C12.5 1.83696 12.2366 1.20107 11.7678 0.732233C11.2989 0.263392 10.663 0 10 0C9.33696 0 8.70107 0.263392 8.23223 0.732233C7.76339 1.20107 7.5 1.83696 7.5 2.5C7.5 2.57 7.515 2.637 7.521 2.706C7.464 2.666 7.414 2.62 7.353 2.585C6.7791 2.25871 6.09944 2.17266 5.46234 2.34563C4.82523 2.5186 4.28241 2.93655 3.95231 3.50826C3.62222 4.07998 3.53167 4.75906 3.70041 5.3973C3.86915 6.03553 4.28348 6.58112 4.853 6.915C4.914 6.95 4.979 6.971 5.041 7C4.979 7.029 4.914 7.05 4.853 7.085C4.28348 7.41888 3.86915 7.96447 3.70041 8.6027C3.53167 9.24094 3.62222 9.92002 3.95231 10.4917C4.28241 11.0635 4.82523 11.4814 5.46234 11.6544C6.09944 11.8273 6.7791 11.7413 7.353 11.415C7.415 11.38 7.464 11.334 7.521 11.294C7.515 11.363 7.5 11.43 7.5 11.5C7.5 12.163 7.76339 12.7989 8.23223 13.2678C8.70107 13.7366 9.33696 14 10 14C10.663 14 11.2989 13.7366 11.7678 13.2678C12.2366 12.7989 12.5 12.163 12.5 11.5C12.5 11.43 12.485 11.363 12.479 11.294C12.536 11.334 12.585 11.38 12.647 11.415C13.2209 11.7413 13.9006 11.8273 14.5377 11.6544C15.1748 11.4814 15.7176 11.0635 16.0477 10.4917C16.3778 9.92002 16.4683 9.24094 16.2996 8.6027C16.1309 7.96447 15.7165 7.41888 15.147 7.085C15.086 7.05 15.021 7.029 14.959 7C15.022 6.971 15.086 6.95 15.147 6.915C15.4314 6.75093 15.6807 6.53244 15.8806 6.27202C16.0806 6.0116 16.2273 5.71434 16.3123 5.39722C16.3974 5.08011 16.4191 4.74934 16.3764 4.42381C16.3336 4.09829 16.2271 3.78437 16.063 3.5ZM10 10C9.20435 10 8.44129 9.68393 7.87868 9.12132C7.31607 8.55871 7 7.79565 7 7C7 6.20435 7.31607 5.44129 7.87868 4.87868C8.44129 4.31607 9.20435 4 10 4C10.7956 4 11.5587 4.31607 12.1213 4.87868C12.6839 5.44129 13 6.20435 13 7C13 7.79565 12.6839 8.55871 12.1213 9.12132C11.5587 9.68393 10.7956 10 10 10Z"
																fill="currentColor" />
														</svg>
													</div>
													Environmental Management
												</div>
											</a>
										</nav>
										<div class="small note ml-3">
											<i class="small">Note: Fill at least one (1) essential governance area.</i>
										</div>
									</div>
								</div>
							</div>

							<div class="col-7">
								<div class="card-box p-4 height-100-p">
									<div class="row">
										<div class="tab-content w-100" id="">
											<!--Essential Gvernance Area 1 Upload Box -->
											<div class="tab-pane fade show active  mx-4" id="esse-gov-1" role="tabpanel"
												aria-labelledby="">
												<div class="h5 w-100 mb-0">Social Protection and Sensitivity</div>

												<form id="spsgovDropzone" method="POST"
													class="dropzone dz-message my-3 w-100 py-4 "
													enctype="multipart/form-data">
													<div class="dz-message">
														<div class="col-auto" style="color: gray;">
															<img class="my-3" src="vendors/images/icon-upload.svg" alt="">

														</div>
														<div class=" text-center">
															<p class="h6 weight-300 mb-0">Drag and drop to upload</p>
															<button type="button" class="h6 weight-500 color-darkpink"
																style="background-color: transparent; border: none;">or
																browse files</button>
														</div>
													</div>

													<div class=" text-right">
														<button class="btn btn-primary btn-sm poppins" id="submit_sps"
															type="submit">Submit</button>
													</div>

												</form>
											</div>

											<!--Essential Gvernance Area 2 Upload Box -->
											<div class="tab-pane fade  mx-4" id="esse-gov-2" role="tabpanel"
												aria-labelledby="">
												<div class="h5 w-100 mb-0">Business-Friendliness and Competitiveness</div>
												<form id="bfcgovDropzone" method="POST"
													class="dropzone dz-message my-3 w-100 py-4 " action="#"
													enctype="multipart/form-data">
													<div class="fallback">
														<input type="file" name="" id="" accept="application/pdf"
															multiple />

													</div>
													<div class="dz-message">
														<div class="col-auto" style="color: gray;">
															<img class="my-3" src="vendors/images/icon-upload.svg" alt="">

														</div>
														<div class=" text-center">
															<p class="h6 weight-300 mb-0">Drag and drop to upload</p>
															<button type="button" class="h6 weight-500 color-darkpink"
																style="background-color: transparent; border: none;">or
																browse files</button>
														</div>
													</div>
													<div class=" text-right">
														<button type="submit" id="submit_bfc"
															class="btn btn-primary btn-sm poppins">Submit</button>
													</div>
												</form>

											</div>

											<!--Essential Gvernance Area 3 Upload Box -->
											<div class="tab-pane fade mx-4" id="esse-gov-3" role="tabpanel"
												aria-labelledby="">
												<div class="h5 w-100 mb-0">Environmental Management</div>
												<form id="envgovDropzone" method="POST"
													class="dropzone dz-message my-3 w-100 py-4 " action="#"
													enctype="multipart/form-data">
													<div class="fallback">
														<input type="file" name="" id="" accept="application/pdf"
															multiple />

													</div>
													<div class="dz-message">
														<div class="col-auto" style="color: gray;">
															<img class="my-3" src="vendors/images/icon-upload.svg" alt="">

														</div>
														<div class=" text-center">
															<p class="h6 weight-300 mb-0">Drag and drop to upload</p>
															<button type="button" class="h6 weight-500 color-darkpink"
																style="background-color: transparent; border: none;">or
																browse files</button>
														</div>
													</div>
													<div class=" text-right">
														<button type="submit" id="submit_envgov"
															class="btn btn-primary btn-sm poppins">Submit</button>
													</div>
												</form>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Essential Governance END -->

					</div>

					<!-- Completed Tab -->
					<div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
						<table id="submittedTbl" class="data-table table hover nowrap mb-5">
							<thead>
								<tr>
									<th><img class="pr-1" src="vendors/images/icon-letter-format.svg" alt="">Document</th>
									<th><img class="mb-1 pr-1" src="vendors/images/icon-governance.svg" alt="">Governance
										Area</th>
									<th class="d-flex justify-content-center">

										<img class="pr-1" src="vendors/images/icon-status.svg" alt="">Status

									</th>
									<th class=""><img class="mb-1 pr-1" src="vendors/images/icon-date.svg" alt="">Date
									</th>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_POST['search-submittedTbl']) && !empty(trim($_POST['search-submittedTbl']))) {
									$search = mysqli_real_escape_string($db, $_POST['search-submittedTbl']);
									$sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE doc_name LIKE '%$search%' OR govarea LIKE '%$search%' OR status LIKE '%$search%' ";
									$_POST['search-submittedTbl'] = '';
								} else {
									$user = $_SESSION["user_id"];
									$sql = "SELECT doc_name, govarea, status, DATE_FORMAT(time_submitted, '%m/%d/%Y') AS f_date FROM mov WHERE user_id = $user";
								}
								$result_submittedTbl = mysqli_query($db, $sql);
								while ($row = mysqli_fetch_assoc($result_submittedTbl)):
									?>
									<tr>
										<td class="td-text-truncate-250">
											<a href="vendors/documents/MOVs/<?php echo $row['doc_name']; ?>" target="_blank"><u>
													<?php echo $row['doc_name']; ?>
												</u></a>
										</td>

										<td>
											<?php echo $row['govarea']; ?>
										</td>

										<td class="d-flex justify-content-center">

											<div class="d-inline-block doc-status text-capitalize small px-3 py-1">

												<?php echo $row['status']; ?>
											</div>

										</td>

										<td>
											<?php echo $row['f_date']; ?>
										</td>
									</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
						<div>
						</div>

						<div class="modal fade" id="invalidModal" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="card-box w-100 p-3">
									<div class="modal-header ">
										<svg xmlns="http://www.w3.org/2000/svg" width="36" height="34" viewBox="0 0 36 34"
											fill="none">
											<path
												d="M19.5919 0.879658C18.9691 -0.293219 17.0324 -0.293219 16.4097 0.879658L0.210473 31.3673C0.0646505 31.6406 -0.00764193 31.9468 0.00063931 32.2562C0.00892055 32.5655 0.097493 32.8675 0.257727 33.1326C0.41796 33.3978 0.64439 33.617 0.914953 33.769C1.18552 33.921 1.49098 34.0006 1.80159 34H34.2C34.5104 34.0006 34.8156 33.9211 35.086 33.7692C35.3564 33.6173 35.5826 33.3982 35.7427 33.1332C35.9028 32.8682 35.9912 32.5664 35.9994 32.2573C36.0075 31.9481 35.9352 31.6421 35.7893 31.3691L19.5919 0.879658ZM19.8007 28.6198H16.2009V25.033H19.8007V28.6198ZM16.2009 21.4463V12.4793H19.8007L19.8025 21.4463H16.2009Z"
												fill="var(--red)" />
										</svg>
										<h2 class="poppins d-inline-block weight-600 ml-2" id="exampleModalLabel">Invalid
											Document</h2>
										<button class="ml-auto" type="button" class="close" data-dismiss="modal"
											aria-label="Close">
											<img src="vendors/images/icon-close.svg" alt="close button" srcset="">
										</button>
									</div>
									<div class="modal-body">
										<img class="" src="" alt="Invalid Document Sample" srcset="">
										<p></p>
										<p>Please <a href="" onclick="location.href='#submission'" data-dismiss="modal"
												style="text-decoration: underline blue; color: blue;">resubmit</a> the
											document with the necessary changes.</p>
									</div>
								</div>
							</div>
						</div>
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
		<!-- <script>
		var jq360 = $.noConflict();
		</script> -->
		<script src="src/plugins/dropzone/src/dropzone.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<script src="vendors/scripts/data-table-init.js"></script>
		<script src="vendors/scripts/submission.js"></script>

		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  -->



		<script>
			function triggerFileInput() {
				document.getElementById('fileCoreGov1').click();
			}
		</script>

	</body>

	</html>
<?php } else {
	echo "<script>alert('Access denied.');</script>";
} ?>