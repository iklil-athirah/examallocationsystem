<?php
require('subject.php');
$code=$_REQUEST['code'];
$course=$_REQUEST['course'];
$group=$_REQUEST['group'];
$num_students=$_REQUEST['num_students'];
$duration=$_REQUEST['duration'];
$faculty=$_REQUEST['faculty'];

$query = "DELETE FROM 'student' WHERE 'code=$code', 'course=$course', 'group=$group', 'num_students=$num_students', 'duration=$duration' 'faculty=$faculty'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: subject.php"); 
?>