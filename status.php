<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: login2.php');
    exit();
}
if ($_SESSION['username'] == 'incharge') {
    header('Location: incharge.php');
    exit();
}
if ($_SESSION['username'] == 'principal') {
    header('Location: principal.php');
    exit();
}

$con = mysqli_connect("localhost", "root", "", "emsprojectdata");
if (!$con) {
    die("Could not connect: " . mysqli_connect_error());
}

$username = $_SESSION['username'];
$sql = "SELECT v.vname, b.edate, b.start, b.end, b.requestedby, b.department, b.inchargeApproval, b.principalApproval 
        FROM booking b 
        JOIN venues v ON b.venueid = v.venueid 
        WHERE requestedby='$username'";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Venue Status</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />

  <style>
    /* ---------- Base Styles ---------- */
    * { margin:0; padding:0; box-sizing:border-box; font-family:"Poppins", sans-serif; }
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
      background: rgba(255,255,255,0.15);
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
    table { width: 100%; border-collapse: collapse; text-align: left; border-radius: 10px; overflow: hidden; }
    th, td { padding: 14px 18px; }
    th { background: rgba(255,255,255,0.2); color: #fff; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
    tr:nth-child(even) { background: rgba(255,255,255,0.1); }
    tr:hover { background: rgba(255,255,255,0.25); transform: scale(1.01); transition: 0.3s ease; }
    td { color: #f8f8f8; }
    .badge-approved { background-color: #28a745; color: #fff; padding: 4px 10px; border-radius: 12px; }
    .badge-pending { background-color: #ffc107; color: #000; padding: 4px 10px; border-radius: 12px; }

    /* ---------- Responsive ---------- */
    @media (max-width:768px){ nav{gap:10px;} nav a{padding:8px 20px;font-size:14px;} .content{padding:20px;} table, th, td{font-size:14px;} }
    @media (max-width:480px){ nav{flex-direction:column;} nav a{width:80%;text-align:center;} h2{font-size:1.4rem;} }
  </style>
</head>

<body>

<!-- ---------- Navigation ---------- -->
<nav>
  <a href="Homepage.php">🏠 Home</a>
  <a href="status.php" class="active">📍 Venue Status</a>
  <a href="up.php">📅 Upcoming Events</a>
  <a href="logoutprocess.php">🚪 Logout</a>
</nav>

<!-- ---------- Content Section ---------- -->
<div class="content">
  <h2>Venue Status</h2>
  <table>
    <tr>
      <th>Venue</th>
      <th>Date</th>
      <th>Time</th>
      <th>Requested By</th>
      <th>Department</th>
      <th>Incharge Approval</th>
      <th>Principal Approval</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $inchargeStatus = strtolower($row["inchargeApproval"])=="approved" ? '<span class="badge-approved">Approved</span>' : '<span class="badge-pending">Pending</span>';
        $principalStatus = strtolower($row["principalApproval"])=="approved" ? '<span class="badge-approved">Approved</span>' : '<span class="badge-pending">Pending</span>';

        echo "<tr>
                <td>{$row['vname']}</td>
                <td>{$row['edate']}</td>
                <td>{$row['start']} - {$row['end']}</td>
                <td>{$row['requestedby']}</td>
                <td>{$row['department']}</td>
                <td>$inchargeStatus</td>
                <td>$principalStatus</td>
              </tr>";
      }
    } else {
      echo "<tr><td colspan='7' style='text-align:center;'>No bookings found</td></tr>";
    }
    $con->close();
    ?>
  </table>
</div>

</body>
</html>
