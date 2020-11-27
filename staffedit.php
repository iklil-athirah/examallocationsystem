<?php 
//session_start();
// initializing variables
$username = "";
$staffname = "";
$email    = "";
$department = "";

$errors = array(); 
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'examallocationsystem');

// STAFF
{ if (isset($_POST['staff'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $staffname = mysqli_real_escape_string($db, $_POST['staffname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $department = mysqli_real_escape_string($db, $_POST['department']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($staffname)) { array_push($errors, "Staff name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($department)) { array_push($errors, "Department is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM `staff` WHERE username='$username'";
  $result = mysqli_query($db, $user_check_query);
  $staff = mysqli_fetch_assoc($result);
  
  if ($staff) { // if user exists
    if ($staff['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($staff['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "UPDATE `staff` SET `username`='$username',`staffname`='$staffname',`email`='$email',`department`='$department') WHERE 1";
	
  	mysqli_query($db, $query);
  	//$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are successful submit";
  	//header('location: staff_update.php');
  }
}}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Exam Allocation System</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  
  
<body>
  <div class="header">
  	<h2>Staff</h2>
  </div>
	
  <form method="post" action="staff_update.php">
  	<?php include('functions.php'); ?>
	
	<div class="topnav">
	<a href="index.php">Home</a>
	<a href="staff.php">Staff </a>
	<a href="subject.php">Subject </a>
	<a href="room.php">Room </a>
	<a href="exam.php">Examination </a>
	<a href="schedule.php">Schedule </a>
</div>
	</div><br>
	
  	<div class="input-group">
  	  <label>Username</label>
	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
	<div class="input-group">
  	  <label>Staff Name</label>
	  <input type="text" name="staffname" value="<?php echo $staffname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
	<div class="input-group">
  	  <label>Department</label>
  	  <input type="text" name="department" value="<?php echo $department; ?>">
  	</div>
	<div class="input-group">
  	  <button type="submit" class="btn" name="staff">Submit</button>
  	</div>
  	<!--<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>-->
	
<class="content">
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
	
    <?php  if (isset($_SESSION['username'])) : ?>
	
    	<h3 valign="center"> Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
	
    <?php endif ?>
	
	<br>

	<!-- redirect to index -->
	
	
    <?php  if (isset($_SESSION['username'])) : ?>
		
    	<h3> <a href="staff.php?staff='1'" text-align="center" style="color: black;">Staff</a> </h3>
		
    <?php endif ?>
	
    <!-- logged our user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
		
    	<h3> <a href="index.php?logout='1'" text-align="center" style="color: black;">Logout</a></h3>
		
    <?php endif ?>
		
	<br>
	<br>
	
<class="content">

<width = "100%" border = "0" color = "black">
<table width = "100%" border = "0" color = "black">

<tr>

<th>Username &nbsp&nbsp&nbsp&nbsp </th>
<th>Staff Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </th>
<th>Email &nbsp&nbsp&nbsp&nbsp </th>
<th>Department &nbsp&nbsp&nbsp&nbsp </th><br>
</tr>

<?php

$conn = mysqli_connect("localhost", "root", "", "examallocationsystem");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `staff`";
$result = $conn->query($sql);

if ($result->num_rows > 0) 

{
	
// output data of each row
while($row = $result->fetch_assoc()) 


{

echo  "<tr>
<td>" . $row["username"]. " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " . "</td>
<td>" . $row["staffname"] . " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " . "</td>
<td>" . $row["email"]. " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " . "</td>
<td>" . $row["department"]. " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp " . "</td><br>
</tr>"; 
}

echo "</table>";
} 



else { echo "0 results"; }
$conn->close();
?>

  </form>
</body>
</html>