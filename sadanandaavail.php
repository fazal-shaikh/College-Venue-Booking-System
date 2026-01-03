<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="venue.css">
</head>
<body>
  <?php
  $date=$_SESSION['date'];
  $start=$_POST['start'];
  $end=$_POST['end'];
  $eid=$_SESSION['eid'];
  $dept=$_SESSION['dept'];
  $ename=$_SESSION['ename'];
  $username=$_SESSION['username'];
  $con = new mysqli("localhost","root","", "emsprojectdata");
  $q="insert into booking(venueid,vname,eid,ename,edate,start,end,requestedby,department,inchargeApproval,principalApproval) values('NMV1','Civil Saminar Hall','$eid','$ename','$date',$start,$end,'$username','$dept','pending','pending')";
  $res=$con->query($q);
  if($res)
  {
    echo "";
  }
$con->close();
  ?>
    <div class="container">
    <form action="FFFFFF.php" style="border:1px solid rgb(0, 0, 0)" class="form">
        <!--<a href="sadananda.php" class="close">&times;</a>-->
        <h1>Booking successful!</h1>
        <!--<div class="input">
            <label for="datepick"><b>Date:</b></label>
            <input type="date" name="date" id= "datepick">
       </div>
       <div class="buttonslot">
         <a href="phalgunislot.html">
          <button class="button">Available Slots</button>
          </a>

       </div>
       <div class="department">
          <b> Department :</b><br>
            <select name="department" id="dept" required>
             <option value="1">Artificial Intelligence and Machine Learning</option>
             <option value="2">Biotechnology Engineering</option>
             <option value="3">Civil Engineering</option>
             <option value="4">Computer Science and Engineering</option>
             <option value="1">Computer and Communication Engineering</option>
             <option value="2">Electrical and Electronics Engineering</option>
             <option value="3">Electronics and Communication Engineering</option>
             <option value="4">Information Science and Engineering</option>
             <option value="3">Robotics and Artificial Intelligence</option>
             <option value="4">Mechanical Engineering</option>
            </select>
        </div>
       <div class="input-group">
           <input type="text" id="ename" name="ename" required>
           <label for="ename">Enter the event name</label>
         </div>
         <p> </p>-->
       <div class="buttons">
          <input type="submit" class="button" value="OK">
          <p id="demo"></p>
          <script>
             function bookevent() {
             var txt;
             var r = confirm("Confirm booking");
             if (r == true) {
               alert("Your slot has been booked");
             }
             else {
               alert( "Booking canceled");
             }
           }
          </script>


  </div>

</div>
    </div>


</body>
</html>
