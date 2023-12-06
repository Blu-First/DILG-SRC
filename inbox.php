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
	<title>SGLGB Portal</title>


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


<?php include('header.php'); ?>
	<div class="main-container">

		<div class="xs-pd-20-10 pd-ltr-20">
			<div class="row pb-10">
				<div class="col-12 mb-20">
					<div class="title pb-20">
						<h2 class="h3 mb-0">Inbox</h2>
					</div>
					<div class="d-flex">
						<div class="pl-3 align-self-start"><svg width="4.877px" height="219.195px"
								xmlns="http://www.w3.org/2000/svg">
								<line x1="2.4385" y1="0" x2="2.4385" y2="219.195" stroke="var(--darkpink)"
									stroke-width="4.877" />
							</svg>
						</div>
						<div class="card-box d-inline-block w-100 py-4 px-3 mx-3">
							<!-- Chat Header -->
							<div class="d-flex align-items-center px-5">
								<div class="flex-shrink-0 mr-2">
									<img class="logo" src="vendors/images/logo-dilg.png" alt="DILG Logo Small">
								</div>
								<div class="flex-grow-1">
									<h4 class="truncate-text" >Department of Interior and Local Governance (DILG) Santa Rosa City</h4>
								</div>
							</div>
							<div class="px-5">
								<hr class="w-100 mt-3 mb-3">
							</div>
							<!-- Chat Header END -->
							
							<!-- Chat Box -->
							<div class="chat-area py-2 px-5">
								<div class="chat incoming d-flex">
									<div class="bubble" dir=auto>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat.</p>
									</div>
								</div>
								<div class="chat outgoing d-flex">
									<div class="bubble" dir=auto>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
								<div class="chat incoming d-flex">
									<div class="bubble" dir=auto>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat.</p>
									</div>
								</div>
								<div class="chat outgoing d-flex">
									<div class="bubble" dir=auto>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
							</div>
							<!-- Chat Box END -->

							<!-- Typing Area -->
							<div class="send-chat-area px-5 py-3 d-flex">
								<div class="add-attachment"><button class="btn-add-attachment"><img src="vendors/images/icon-add-attachment.svg" alt=""></button></div>
								<div class="type-area h-100 w-100 d-flex py-2">
									<textarea class="input-txt-chat h-100 w-100 placeholder-wrap" name="msg" id="msg" placeholder="Type your message" onkeydown="checkKeyPress(event)"></textarea>
									<div class="send-msg h-100"><button class="btn-send-msg" onclick="sendMessage()"><img src="vendors/images/icon-send-chat.svg" alt=""></button></div>
								</div>
							</div>
							<!-- Typing Area END -->
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
	<script>
		function sendMessage() {
		  // Get the value of the textarea
		  var message = document.getElementById('msg').value;
		
		  if (message.trim() !== '') {
			// Create a new chat message element
			var chatMessage = document.createElement('div');
			chatMessage.className = 'chat outgoing d-flex';
		
			var bubble = document.createElement('div');
			bubble.className = 'bubble';
			bubble.setAttribute('dir', 'auto');
		
			var paragraph = document.createElement('p');
			paragraph.textContent = message;
		
			bubble.appendChild(paragraph);
			chatMessage.appendChild(bubble);
		
			// Insert the new chat message into the chat area container
			var chatArea = document.querySelector('.chat-area');
			chatArea.appendChild(chatMessage);
		
			// Clear the textarea
			document.getElementById('msg').value = '';
		  }
		}

		function checkKeyPress(event) {
			if (event.keyCode === 13) { // 13 is the key code for Enter
				sendMessage();
				event.preventDefault(); // Prevent Enter key from adding a new line in the textarea
			}
		}
		</script>
		

</body>

</html>
<?php }
else {
	echo "<script>alert('Access denied.');</script>";
} ?>