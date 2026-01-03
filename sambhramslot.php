<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>slots</title>
        <link rel="stylesheet" href="slot.css">
    </head>
    <body>

        <div class="container">
        <form action="availsambhram.php" style="border:1px solid rgb(0, 0, 0)" method="post" class="form">
          <a href="sambhram.php" class="close">&times;</a>
          <h1>Available slots</h1>
          <h2>Start&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;End</h2>
          <div class="ss" required>
          <?php
          $con =mysqli_connect("localhost","root","","emsprojectdata");
          if(!$con)
          {
          die("Could not connect: " . mysql_error());
          }
          $username=$_SESSION['username'];
          $date=$_POST['date'];
          $dept=$_POST['department'];
          $ename=$_POST['ename'];
          $eid=$_POST['eid'];
          $_SESSION['date']=$date;
          $_SESSION['eid']=$eid;
          $_SESSION['dept']=$dept;
          $_SESSION['ename']=$ename;
          
       $sql="select s.start,s.end from slots s where s.start>=ALL(select b.end from booking b where b.venueid='NMV2' and b.edate='$date')and s.end>ALL(select b.start from booking b where b.venueid='NMV2' and b.edate='$date') and s.venueid='NMV2';";
           /* $sql="select s.start,s.end from slots s,booking b where s.start>=b.end and s.venueid='NMV4' and b.edate='$date';";*/
          $result=$con->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               $s=$row['start'];
               $e=$row['end'];
      echo " <label>
            <input type='radio' class='checkbox' name='start' value=".$s.">".$s.":00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='radio' class='checkbox' name='end' value=".$e.">".$e.":00</label><br>";

    }
}
else
{
  echo "No slots available";
}
  $con->close();
           ?>
          <!--<label>
                <input type="checkbox" class="checkbox" name="slot" > 8am &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="checkbox" name="slot" > 9am
          </label><br>
          <label>
                <input type="checkbox" class="checkbox" name="slot" > 9am&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="checkbox" name="slot" > 10am
          </label><br>
          <label>
                <input type="checkbox" class="checkbox" name="slot" > 10am &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="checkbox" name="slot" > 11am
          </label><br>
          <label>
                <input type="checkbox" class="checkbox" name="slot" > 11am&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="checkbox" name="slot" > 12pm

          </label><br>
          <label>
                <input type="checkbox" class="checkbox" name="slot" > 12pm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="checkbox" name="slot" > 1pm
          </label><br>
          <label>
                <input type="checkbox" class="checkbox" name="slot" > 1pm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="checkbox" name="slot" > 2pm
          </label><br>
          <label>
                <input type="checkbox" class="checkbox" name="slot" > 2pm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="checkbox" name="slot" > 3pm
          </label><br>
          <label>
                <input type="checkbox" class="checkbox" name="slot" > 3pm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="checkbox" class="checkbox" name="slot" > 4pm
          </label><br>
          <label>
               <input type="checkbox" class="checkbox" name="slot" > 4pm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input type="checkbox" class="checkbox" name="slot" > 5pm
           </label><br>
      </div>-->



      <div class="buttons">
         <input type="submit" class="button" value="Book" >
      </div>
</form>

    </body>
    </html>
