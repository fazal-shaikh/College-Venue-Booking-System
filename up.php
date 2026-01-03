<?php
session_start();
if (empty($_SESSION['username'])) {
  header('Location:login2.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upcoming Events</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* ---------- Base Styles ---------- */
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #6a11cb, #2575fc, #ff758c);
      background-size: 300% 300%;
      animation: gradientMove 12s ease infinite;
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* ---------- Navigation ---------- */
    nav {
      width: 100%;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(12px);
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      padding: 14px 10px;
      position: sticky;
      top: 0;
      z-index: 10;
      box-shadow: 0 3px 15px rgba(0,0,0,0.25);
    }

    nav a {
      position: relative;
      color: #fff;
      text-decoration: none;
      padding: 10px 26px;
      border-radius: 30px;
      font-weight: 500;
      transition: all 0.3s ease;
      overflow: hidden;
      background: rgba(255,255,255,0.15);
    }

    nav a::before {
      content: "";
      position: absolute;
      top: 0; left: -100%;
      width: 100%; height: 100%;
      background: linear-gradient(90deg, #ff7eb3, #ff758c, #fd5e53);
      transition: all 0.4s ease;
      z-index: -1;
      border-radius: 30px;
    }

    nav a:hover::before { left: 0; }
    nav a:hover { transform: translateY(-2px); }
    nav a.active { background: linear-gradient(90deg,#ff7eb3,#ff758c,#fd5e53); box-shadow: 0 4px 10px rgba(255,118,136,0.5); }

    /* ---------- Content Card ---------- */
    .content {
      margin-top: 40px;
      width: 90%;
      max-width: 900px;
      background: rgba(255,255,255,0.15);
      backdrop-filter: blur(10px);
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 4px 25px rgba(0,0,0,0.25);
      overflow-x: auto;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 1.8rem;
      font-weight: 600;
      letter-spacing: 1px;
      color: #fff;
    }

    /* ---------- Table Styles ---------- */
    table {
      width: 100%;
      border-collapse: collapse;
      text-align: center;
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 18px;
    }

    th {
      background: rgba(255,255,255,0.2);
      color: #fff;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    tr:nth-child(even) { background: rgba(255,255,255,0.1); }
    tr:hover { background: rgba(255,255,255,0.25); transform: scale(1.01); transition: 0.3s ease; }
    td { color: #f8f8f8; }

    /* ---------- Buttons ---------- */
    .register-btn {
      background: #28a745;
      color: #fff;
      padding: 6px 12px;
      border-radius: 6px;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .register-btn:hover {
      background: #218838;
      transform: scale(1.05);
    }

    .no-events {
      text-align: center;
      padding: 20px;
      color: #fff;
      font-weight: 500;
    }

    /* ---------- Responsive ---------- */
    @media (max-width:768px){
      nav {gap:10px;}
      nav a{padding:8px 20px;font-size:14px;}
      .content{padding:20px;}
      table, th, td{font-size:14px;}
    }

    @media (max-width:480px){
      nav{flex-direction:column;}
      nav a{width:80%;text-align:center;}
      h2{font-size:1.4rem;}
    }
  </style>
</head>

<body>

<!-- ---------- Navigation ---------- -->
<nav>
  <a href="Homepage.php"><i class="fa-solid fa-house"></i> Home</a>
  <a href="status.php"><i class="fa-solid fa-clipboard-list"></i> Venue Status</a>
  <a href="up.php" class="active"><i class="fa-solid fa-calendar-days"></i> Upcoming Events</a>
  <a href="logoutprocess.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
</nav>

<!-- ---------- Content Section ---------- -->
<div class="content">
  <h2>Upcoming Events</h2>
  <table>
    <tr>
      <th>Date</th>
      <th>Event</th>
      <th>Venue</th>
      <th>Department</th>
      <th>Registration</th>
    </tr>

    <?php
    $con = mysqli_connect("localhost", "root", "", "emsprojectdata");
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT b.edate, b.ename, v.vname, b.department 
            FROM booking b 
            JOIN venues v ON b.venueid = v.venueid 
            WHERE b.edate >= CURDATE()";

    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['edate']}</td>
                <td>{$row['ename']}</td>
                <td>{$row['vname']}</td>
                <td>{$row['department']}</td>
                <td>
                  <a href='application_form.php?event={$row['ename']}&venue={$row['vname']}&date={$row['edate']}' class='register-btn'>
                    Register
                  </a>
                </td>
              </tr>";
      }
    } else {
      echo '<tr><td colspan="5" class="no-events">No Upcoming Events Found</td></tr>';
    }

    $con->close();
    ?>
  </table>
</div>

</body>
</html>
