<?php
session_start();
if (empty($_SESSION['username'])) {
    header('Location: login2.php');
    exit();
}

// Database connection
$con = mysqli_connect("localhost", "root", "", "emsprojectdata");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// ------------------- Handle Approval -------------------
if(isset($_POST['approve'])){
    $venueid = $_POST['venueid'];
    $edate = $_POST['edate'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    // Use prepared statement to update
    $stmt = $con->prepare("UPDATE booking SET principalApproval='approved' WHERE venueid=? AND edate=? AND start=? AND end=?");
    $stmt->bind_param("isss", $venueid, $edate, $start, $end);

    if($stmt->execute()){
        // Refresh page to show updated data
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error updating record: " . $con->error;
    }

    $stmt->close();
}

// ------------------- Fetch Pending Requests -------------------
$sql = "SELECT b.venueid, v.vname, b.edate, b.start, b.end, b.requestedby, b.department, b.inchargeApproval 
        FROM booking b 
        JOIN venues v ON b.venueid = v.venueid 
        WHERE b.principalApproval='pending'";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Requests</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
* { margin:0; padding:0; box-sizing:border-box; font-family:"Poppins", sans-serif; }
body {
    min-height:100vh;
    background: linear-gradient(135deg,#6a11cb,#2575fc,#ff758c);
    background-size:300% 300%;
    animation: gradientMove 12s ease infinite;
    color:#fff;
    display:flex;
    flex-direction:column;
    align-items:center;
}
@keyframes gradientMove { 0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%} }

nav {
    width:100%;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(12px);
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:20px;
    padding:14px 10px;
    position:sticky;
    top:0;
    z-index:10;
    box-shadow:0 3px 15px rgba(0,0,0,0.25);
}
nav a {
    position:relative;
    color:#fff;
    text-decoration:none;
    padding:10px 26px;
    border-radius:30px;
    font-weight:500;
    transition: all 0.3s ease;
    overflow:hidden;
    background: rgba(255,255,255,0.15);
}
nav a::before {
    content:"";
    position:absolute;
    top:0; left:-100%;
    width:100%; height:100%;
    background: linear-gradient(90deg,#ff7eb3,#ff758c,#fd5e53);
    transition: all 0.4s ease;
    z-index:-1;
    border-radius:30px;
}
nav a:hover::before { left:0; }
nav a:hover { transform:translateY(-2px); }
nav a.active { background: linear-gradient(90deg,#ff7eb3,#ff758c,#fd5e53); box-shadow:0 4px 10px rgba(255,118,136,0.5); }

.content {
    margin-top:40px;
    width:90%;
    max-width:1000px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(10px);
    border-radius:16px;
    padding:30px;
    box-shadow:0 4px 25px rgba(0,0,0,0.25);
    overflow-x:auto;
}

h2 { text-align:center; margin-bottom:25px; font-size:1.8rem; font-weight:600; letter-spacing:1px; color:#fff; }

table { width:100%; border-collapse:collapse; text-align:left; border-radius:10px; overflow:hidden; }
th, td { padding:14px 18px; }
th { background: rgba(255,255,255,0.2); color:#fff; font-weight:600; text-transform:uppercase; letter-spacing:0.5px; }
tr:nth-child(even){ background: rgba(255,255,255,0.1); }
tr:hover { background: rgba(255,255,255,0.25); transform: scale(1.01); transition: 0.3s ease; }
td { color:#f8f8f8; }

.btn-approve {
    background: #28a745;
    color: #fff;
    border:none;
    padding:4px 10px;
    border-radius:12px;
    cursor:pointer;
    transition: 0.3s;
}
.btn-approve:hover { background:#218838; }

@media (max-width:768px){ nav{gap:10px;} nav a{padding:8px 20px;font-size:14px;} .content{padding:20px;} table, th, td{font-size:14px;} }
@media (max-width:480px){ nav{flex-direction:column;} nav a{width:80%;text-align:center;} h2{font-size:1.4rem;} }
</style>
</head>
<body>

<nav>
  <a href="FFFFFF.php">🏠 Home</a>
  <a href="status.php">📍 Venue Status</a>
  <a href="up.php">📅 Upcoming Events</a>
  <a href="logoutprocess.php">🚪 Logout</a>
</nav>

<div class="content">
<h2>Pending Requests</h2>
<table>
<tr>
<th>Venue</th>
<th>Date</th>
<th>Start Time</th>
<th>End Time</th>
<th>Requested By</th>
<th>Department</th>
<th>Incharge Approval</th>
<th>Action</th>
</tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['vname']}</td>
                <td>{$row['edate']}</td>
                <td>{$row['start']}</td>
                <td>{$row['end']}</td>
                <td>{$row['requestedby']}</td>
                <td>{$row['department']}</td>
                <td>{$row['inchargeApproval']}</td>
                <td>
                    <form method='post'>
                        <input type='hidden' name='venueid' value='{$row['venueid']}'>
                        <input type='hidden' name='edate' value='{$row['edate']}'>
                        <input type='hidden' name='start' value='{$row['start']}'>
                        <input type='hidden' name='end' value='{$row['end']}'>
                        <button type='submit' name='approve' class='btn-approve'>Approve</button>
                    </form>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='8' style='text-align:center;'>No Pending Requests</td></tr>";
}

$con->close();
?>
</table>
</div>

</body>
</html>
