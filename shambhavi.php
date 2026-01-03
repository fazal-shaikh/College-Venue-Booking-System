<?php
session_start();
if (empty($_SESSION['username'])) {
  header('Location: login2.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Computer Science Seminar Hall Booking</title>
  <style>
    /* ===== RESET ===== */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    /* ===== BACKGROUND ===== */
    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(135deg, #1b2735 0%, #090a0f 100%);
      overflow: hidden;
      position: relative;
    }

    /* Floating gradient orbs */
    body::before, body::after {
      content: "";
      position: absolute;
      border-radius: 50%;
      filter: blur(100px);
      z-index: 0;
    }

    body::before {
      width: 400px;
      height: 400px;
      background: #6c63ff;
      top: -100px;
      right: -150px;
      opacity: 0.4;
      animation: float1 10s ease-in-out infinite alternate;
    }

    body::after {
      width: 300px;
      height: 300px;
      background: #ff6ec4;
      bottom: -100px;
      left: -120px;
      opacity: 0.3;
      animation: float2 12s ease-in-out infinite alternate;
    }

    @keyframes float1 {
      from { transform: translateY(0px); }
      to { transform: translateY(40px); }
    }

    @keyframes float2 {
      from { transform: translateY(0px); }
      to { transform: translateY(-40px); }
    }

    /* ===== CARD ===== */
    .booking-card {
      position: relative;
      z-index: 2;
      width: 95%;
      max-width: 450px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(12px);
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
      padding: 40px 35px;
      color: #fff;
      transition: all 0.3s ease-in-out;
      overflow: hidden;
    }

    .booking-card:hover {
      transform: scale(1.02);
    }

    .close {
      position: absolute;
      top: 15px;
      right: 25px;
      font-size: 1.6rem;
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      opacity: 0.8;
      transition: 0.3s;
    }

    .close:hover {
      opacity: 1;
      color: #ff6ec4;
    }

    h1 {
      font-size: 1.9rem;
      font-weight: 600;
      margin-bottom: 1.2rem;
      color: #e6e9ff;
      text-shadow: 0 0 10px rgba(108, 99, 255, 0.5);
    }

    /* ===== FORM ===== */
    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    label {
      font-weight: 500;
      text-align: left;
      color: #dbe4ff;
      margin-bottom: 5px;
      font-size: 0.95rem;
    }

    input, select {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: none;
      outline: none;
      font-size: 1rem;
      color: #222;
      background: rgba(255, 255, 255, 0.9);
      transition: all 0.2s ease;
    }

    input:focus, select:focus {
      border: 2px solid #9dc0ff;
      background: #fff;
    }

    .btn {
      padding: 12px;
      border: none;
      border-radius: 12px;
      background: linear-gradient(135deg, #6c63ff, #8e9eff);
      color: #fff;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 0 12px rgba(108, 99, 255, 0.5);
    }

    .btn:hover {
      transform: translateY(-2px);
      background: linear-gradient(135deg, #5a53ff, #7a89ff);
      box-shadow: 0 0 18px rgba(108, 99, 255, 0.7);
    }

    /* Floating labels style */
    .input-group {
      position: relative;
      margin-top: 10px;
    }

    .input-group input {
      background: transparent;
      border-bottom: 2px solid rgba(255, 255, 255, 0.3);
      color: #fff;
      padding: 10px 5px;
      transition: all 0.3s;
    }

    .input-group label {
      position: absolute;
      top: 10px;
      left: 5px;
      color: rgba(255, 255, 255, 0.7);
      font-size: 0.9rem;
      pointer-events: none;
      transition: all 0.3s;
    }

    .input-group input:focus + label,
    .input-group input:valid + label {
      top: -10px;
      font-size: 0.8rem;
      color: #9dc0ff;
    }

    @media (max-width: 480px) {
      .booking-card {
        padding: 25px 20px;
      }
      h1 {
        font-size: 1.6rem;
      }
    }
  </style>
</head>

<body>
  <div class="booking-card">
    <a href="FFFFFF.php" class="close">&times;</a>
    <h1>Computer Science Seminar Hall</h1>

    <form action="sadanandaslot.php" method="post" onsubmit="return confirmBooking()">
      <label for="datepick">Choose a date:</label>
      <input type="date" name="date" id="datepick" required>

      <label for="dept">Department:</label>
      <select name="department" id="dept" required>
        <option value="">Select Department</option>
        <option value="AI/ML">Artificial Intelligence and Machine Learning</option>
        <option value="BT">Biotechnology Engineering</option>
        <option value="CV">Civil Engineering</option>
        <option value="CSE">Computer Science and Engineering</option>
        <option value="CC">Computer and Communication Engineering</option>
        <option value="EEE">Electrical and Electronics Engineering</option>
        <option value="ECE">Electronics and Communication Engineering</option>
        <option value="ISE">Information Science and Engineering</option>
        <option value="Robotics/AI">Robotics and Artificial Intelligence</option>
        <option value="ME">Mechanical Engineering</option>
      </select>

      <div class="input-group">
        <input type="text" id="ename" name="ename" required />
        <label for="ename">Event Name</label>
      </div>

      <div class="input-group">
        <input type="text" id="eid" name="eid" required />
        <label for="eid">Event ID</label>
      </div>

      <button type="submit" class="btn">Check Slots</button>
    </form>
  </div>

  <script>
    function confirmBooking() {
      return confirm("Confirm booking?");
    }
  </script>
</body>
</html>
