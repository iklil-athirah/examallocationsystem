<?php 
	include('functions.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Exam Allocation System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">
			<!--<img src="images/user_profile.png"  > -->

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong>Welcome<?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>
					
				<?php endif ?>
				
				<div class="topnav">
	<a href="index.php">Home</a>
	<a href="staff.php">Staff </a>
	<a href="subject.php">Subject </a>
	<a href="room.php">Room </a>
	<a href="exam.php">Examination </a>
	<a href="schedule.php">Schedule </a>
</div>

<br>CONTACT US <br><br>

Academic Management Division <br>
Universiti Sains Islam Malaysia <br> 
Bandar Baru Nilai<br>
71800, Nilai, Negeri Sembilan, MALAYSIA <br><br>

Phone Number : +606-798 8000 <br>
Fax: +606-798 8334 <br>
Email: bpa@usim.edu.my

<br><br>
			</div>
		</div>
	</div>
</body>
</html>





