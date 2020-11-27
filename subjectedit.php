<?php
//require('subject.php');
include("subject.php");
$id=$_REQUEST['id'];
$query = "SELECT * from student where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Subject</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="form">
<!--<p><a href="dashboard.php">Dashboard</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="logout.php">Logout</a></p>-->
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
//$trn_date = date("Y-m-d H:i:s");
$code =$_REQUEST['Code & Subject Name'];
$course = $_REQUEST['Course'];
$group    = $_REQUEST['Group Course'];
$num_students = $_REQUEST['Number of Students'];
$duration = $_REQUEST['Duration (hours)'];
$faculty = $_REQUEST['Faculty'];

$submittedby = $_SESSION["id"];
$update="
Code & Subject Name='".$code."', 
Course='".$course."',
Group Course='".$group."', 
Number of Students='".$num_students."',
Duration (hours)='".$duration."', 
Faculty='".$faculty."',
submittedby='".$submittedby."' where code='".$code."'";

mysqli_query($conn, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='subject.php'>View Updated Record</a>";
echo 
'<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />

<p><input type="text" name="code" placeholder="Code & Subject Name" 
required value="<?php echo $row['code'];?>" /></p>

<p><input type="text" name="course" placeholder="Course" 
required value="<?php echo $row['course'];?>" /></p>

<p><input type="text" name="group" placeholder="Group Course" 
required value="<?php echo $row['group'];?>" /></p>

<p><input type="number" name="num_students" placeholder="Number of Students" step="1" min="1" max="100" 
required value="<?php echo $row['num_students'];?>" /></p>

<p><input type="number" name="duration" placeholder="Duration (hours)" step="0.5" min="1" max="3"
required value="<?php echo $row['duration'];?>" /></p>

<p><input type="text" name="faculty" placeholder="Faculty" 
required value="<?php echo $row['faculty'];?>" /></p>

<p><input name="submit" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>