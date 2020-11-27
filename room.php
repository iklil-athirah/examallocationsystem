<?php 
//session_start();
// initializing variables
$hall = "";
$capacity = "";
$location    = "";

$errors = array(); 
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'examallocationsystem');

// SUBJECT
{ if (isset($_POST['room'])) {
  // receive all input values from the form
   $hall= mysqli_real_escape_string($db, $_POST['hall']);
  $capacity = mysqli_real_escape_string($db, $_POST['capacity']);
  $location = mysqli_real_escape_string($db, $_POST['location']);
 

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($hall)) { array_push($errors, "Hall is required"); }
  if (empty($capacity)) { array_push($errors, "Capacity is required"); }
  if (empty($location)) { array_push($errors, "Location is required"); }


  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM `room`";
  $result = mysqli_query($db, $user_check_query);
  $room = mysqli_fetch_assoc($result);
  
  //if ($staff) { // if user exists
   // if ($staff['username'] === $username) {
     // array_push($errors, "Username already exists");
    //}

    //if ($staff['email'] === $email) {
      //array_push($errors, "email already exists");
    //}
  //}

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$query = "INSERT INTO `room`(`Hall`, `Capacity`, `Location`) 
	VALUES ('$hall', '$capacity','$location')";
	
	mysqli_query($db, $query);
  	//$_SESSION['group'] = $group;
  	$_SESSION['success'] = "You are successful submit";
  	//header('location: room.php');
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
  <div class="header"><h2>Room</h2></div>
	
  <form method="post" action="room.php">
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
	

<class="content">

<width = "100%" border = "1" color = "black" align = "center" style="text-transform:uppercase" face="Arial">
<table width = "100%" border = "1" color = "black" align = "center" style="text-transform:uppercase" face="Arial">

<tr>
<th>Hall</th>
<th>Capacity  </th>
<th>Location  </th>
</tr>

<?php

$conn = mysqli_connect("localhost", "root", "", "examallocationsystem");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Hall`, `Capacity`, `Location`
FROM `room` ORDER BY `Capacity` desc";


$result = $conn->query($sql);

if ($result->num_rows > 0) 

{
	
// output data of each row
while($row = $result->fetch_assoc()) 
{
echo  "<tr>
<td>" . $row["Hall"] . " " . "</td>
<td>" . $row["Capacity"]. " " . "</td>
<td>" . $row["Location"]. " " . "</td>
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