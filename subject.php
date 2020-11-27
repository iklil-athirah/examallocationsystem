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
  <div class="header"><h2>Subject</h2></div>
	
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
	
	FINAL EXAMINATION SEM 1 2020/2021
	
	
	<div class="input-group">
  	  <label>Code & Subject Name</label>
	  <input style="text-transform:uppercase" type="text" name="code" value="<?php echo $code; ?>">
  	</div>
	
	
	<div class="input-group">
  	  <label>Course Name</label>
	  <input style="text-transform:uppercase" type="text" name="course" value="<?php echo $course; ?>">
  	</div>
	
  	<div class="input-group">
  	  <label>Group Course</label>
  	  <input style="text-transform:uppercase" type="text" name="group" value="<?php echo $group; ?>">
  	</div>
	
	<div class="input-group">
  	  <label>Number of Students</label>
  	  <input type="number" placeholder="" step="1" min="1" max="100" name="num_students" value="<?php echo $num_students; ?>">
  	</div>
	
	<div class="input-group">
  	  <label>Duration (hours)</label>
  	  <input type="number" placeholder="" step="0.5" min="1" max="3" name="duration" value="<?php echo $duration; ?>">
  	</div>
	
  	<div class="input-group">
  	  <label>Faculty</label>
	  <input style="text-transform:uppercase" type="text" name="faculty" value="<?php echo $faculty; ?>">
  	</div>
	
	<div class="input-group">
  	  <button type="submit" class="btn" name="subject">Submit</button>
  	</div>
  	<!--<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>-->
	

<class="content">

<width = "100%" border = "1" color = "black" align = "center" style="text-transform:uppercase" face="Arial">
<table width = "100%" border = "1" color = "black" align = "center" style="text-transform:uppercase" face="Arial">

<tr>
<th>Code & Subject Name </th>
<th>Course Name  </th>
<th>Group Course  </th>
<th>Number of Students  </th>
<th>Duration (hours)  </th>
<th>Faculty  </th>
<!--<td><a href="subjectedit.php?code=<?php echo $data['code']; ?>">Edit</a></td>
<td><a href="subjectdelete.php?code=<?php echo $data['code']; ?>">Delete</a></td>-->
</tr>

<?php

$conn = mysqli_connect("localhost", "root", "", "examallocationsystem");

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `Code & Subject Name`, `Course`, `Group Course`, `Number of Students`, `Duration (hours)`, `Faculty`
FROM `subject` ORDER BY `Number of Students` desc";


$result = $conn->query($sql);

if ($result->num_rows > 0) 

{
	
// output data of each row
while($row = $result->fetch_assoc()) 
{
echo  "<tr>
<td>" . $row["Code & Subject Name"] . " " . "</td>
<td>" . $row["Course"]. " " . "</td>
<td>" . $row["Group Course"]. " " . "</td>
<td>" . $row["Number of Students"]. "  " . "</td>
<td>" . $row["Duration (hours)"]. "  " . "</td>
<td>" . $row["Faculty"]. " " . "</td>
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