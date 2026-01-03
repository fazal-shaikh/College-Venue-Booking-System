<?php
session_start();
$con =mysqli_connect ("localhost","root","","emsprojectdata");
if (!$con)
{
die("Could not connect: " . mysql_error());
}
else{
  echo"connected successfully";
}
if(isset($_POST['submit']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  $query=mysqli_query($con,"select * from users where username='$username' and password='$password'") or die(mysqli_error($con));
  $row=$query->fetch_assoc();

  $counter=mysqli_num_rows($query);
  if($counter==0)
  {
    echo "<script type='text/javascript'>alert('Invalid password or username!');
    document.location='login2.php';</script>";
  }
  else {
    $_SESSION['username']=$username;
    echo "<script type='text/javascript'>document.location='FFFFFF.php'</script>";
  }
}
 ?>
