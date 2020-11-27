<?php 
//session_start();
// initializing variables
$code = "";
$course = "";
$group    = "";
$num_students = "";
$duration = "";
$faculty = "";

$errors = array(); 
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'examallocationsystem');

// SUBJECT
{ if (isset($_POST['subject'])) {
  // receive all input values from the form
   $code = mysqli_real_escape_string($db, $_POST['code']);
  $course = mysqli_real_escape_string($db, $_POST['course']);
  $group = mysqli_real_escape_string($db, $_POST['group']);
  $num_students = mysqli_real_escape_string($db, $_POST['num_students']);
  $duration = mysqli_real_escape_string($db, $_POST['duration']);
  $faculty = mysqli_real_escape_string($db, $_POST['faculty']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($code)) { array_push($errors, "Code & Subject Name is required"); }
  if (empty($course)) { array_push($errors, "Course is required"); }
  if (empty($group)) { array_push($errors, "Group is required"); }
  if (empty($num_students)) { array_push($errors, "Number of Students is required"); }
  if (empty($duration)) { array_push($errors, "Duration is required"); }
  if (empty($faculty)) { array_push($errors, "Faculty is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM `subject` WHERE code='$code'";
  $result = mysqli_query($db, $user_check_query);
  $subject = mysqli_fetch_assoc($result);
  
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
  	$query = "INSERT INTO `subject`(`Code & Subject Name`, `Course`, `Group Course`, `Number of Students`, `Duration (hours)`, `Faculty`) 
	VALUES ('$code', '$course','$group','$num_students','$duration', '$faculty')";
	
	mysqli_query($db, $query);
  	//$_SESSION['group'] = $group;
  	$_SESSION['success'] = "You are successful submit";
  	//header('location: subject.php');
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
  <div class="header"><h2>Schedule</h2></div>
	
  <form method="post" action="subject.php">
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
	
	
