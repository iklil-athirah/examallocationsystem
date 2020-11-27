$db = mysqli_connect('localhost', 'root', 'examallocationsystem') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'mydb' ) or die(mysqli_error($db));
?>

<html lang="en-US">
  <head>
  <title>Exam Allocation System</title>
  <link rel="stylesheet" href="libs/css/bootstrap.min.css">
  <link rel="stylesheet" href="libs/style.css">
  </head>
  <?php
  include 'connection.php';
  session_start();
$id=$_SESSION['id'];
$query=mysqli_query($db,"SELECT * FROM users where user_id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
  <h1>Profile</h1>
<div class="profile-input-field">
        <h3>Profile</h3>
        <form method="post" action="#" >
          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" name="fname" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row['full_name']; ?>" required />
          </div>
      
          
      
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" style="width:20em; margin:0;"><br><br>
            <center>
             <a href="logout.php">Log out</a>
           </center>
          </div>
        </form>
      </div>
      </html>
      <?php
      if(isset($_POST['submit'])){
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address'];
      $query = "UPDATE users SET full_name = '$fullname',
                      gender = '$gender', age = $age, address = '$address'
                      WHERE user_id = '$id'";
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "index.php";
        </script>
        <?php
             }              
?>

