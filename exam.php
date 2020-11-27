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
		<h2>Examination</h2>
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
<br>

<width = "100%" border = "1" color = "black" align = "center" style="text-transform:uppercase" face="Arial">
<table width = "100%" border = "1" color = "black" align = "center" style="text-transform:uppercase" face="Arial">

<tr>
<th>#</th>
<th>date</th>
<th>day</th>

<tr>
<td>day 1</td>
<td>8 february 2021</td>
<td>monday</td>
</tr>

<tr>
<td>day 2</td>
<td>9 february 2021</td>
<td>tuesday</td>
</tr>

<tr>
<td>day 3</td>
<td>10 february 2021</td>
<td>wednesday</td>
</tr>

<tr>
<td>day 4</td>
<td>11 february 2021</td>
<td>thursday</td>
</tr>

<tr>
<td>day 5</td>
<td>12 february 2021</td>
<td>friday</td>
</tr>

<tr>
<td>day 6</td>
<td>15 february 2021</td>
<td>monday</td>
</tr>

<tr>
<td>day 7</td>
<td>16 february 2021</td>
<td>tuesday</td>
</tr>

<tr>
<td>day 8</td>
<td>17 february 2021</td>
<td>wednesday</td>
</tr>

<tr>
<td>day 9</td>
<td>18 february 2021</td>
<td>thursday</td>
</tr>

<tr>
<td>day 10</td>
<td>19 february 2021</td>
<td>friday</td>
</tr>

<tr>
<td>day 11</td>
<td>22 february 2021</td>
<td>monday</td>
</tr>

<tr>
<td>day 12</td>
<td>23 february 2021</td>
<td>tuesday</td>
</tr>

<tr>
<td>day 13</td>
<td>24 february 2021</td>
<td>wednesday</td>
</tr>

<tr>
<td>day 14</td>
<td>25 february 2021</td>
<td>thursday</td>
</tr>

<tr>
<td>day 15</td>
<td>26 february 2021</td>
<td>friday</td>
</tr>


			</div>
		</div>
	</div>
</body>
</html>





