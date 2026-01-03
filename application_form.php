<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Application Form</title>
<style>
/* General Body Styling */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to right, #6a11cb, #2575fc);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
}

/* Form Container */
form {
    background: #ffffff;
    padding: 30px 40px;
    border-radius: 15px;
    box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    width: 100%;
    max-width: 450px;
    transition: transform 0.3s ease;
}

form:hover {
    transform: translateY(-5px);
}

/* Form Heading */
h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
    font-size: 26px;
}

/* Input Fields */
input[type="text"],
input[type="email"],
input[type="number"] {
    width: 100%;
    padding: 14px 16px;
    margin-bottom: 18px;
    border-radius: 10px;
    border: 1px solid #ccc;
    font-size: 15px;
    transition: all 0.3s ease;
    box-sizing: border-box;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="number"]:focus {
    border-color: #2575fc;
    box-shadow: 0 0 8px rgba(37,117,252,0.3);
    outline: none;
}

/* Submit Button */
input[type="submit"] {
    width: 100%;
    padding: 14px;
    background: linear-gradient(to right, #6a11cb, #2575fc);
    color: white;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
}

input[type="submit"]:hover {
    background: linear-gradient(to right, #2575fc, #6a11cb);
    transform: scale(1.03);
}

/* Notification Styling */
#notification {
    display: none;
    background: #28a745;
    color: white;
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 10px;
    text-align: center;
    font-weight: 500;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

/* PHP Session Message Styling */
.session-message {
    background: #28a745;
    color: white;
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 10px;
    text-align: center;
    font-weight: 500;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

/* Responsive Design */
@media (max-width: 500px) {
    form {
        padding: 25px 20px;
    }

    h2 {
        font-size: 22px;
    }

    input[type="submit"] {
        padding: 12px;
        font-size: 15px;
    }
}
</style>
<script>
function showNotification(message) {
    const notif = document.getElementById('notification');
    notif.innerText = message;
    notif.style.display = 'block';
    setTimeout(() => { notif.style.display = 'none'; }, 3000);
}
</script>
</head>
<body>

<form method="POST" action="submit_form.php" onsubmit="showNotification('Submitting your application...')">
    <h2>Application Form</h2>

    <div id="notification"></div>
    <?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<div class='session-message'>" . $_SESSION['message'] . "</div>";
        unset($_SESSION['message']);
    }
    ?>

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Enter your name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Enter your email" required>

    <label for="number">Number:</label>
    <input type="number" id="number" name="number" placeholder="Enter your phone number" required>

    <label for="branch">Branch:</label>
    <input type="text" id="branch" name="branch" placeholder="Enter your branch" required>

    <label for="usn">USN:</label>
    <input type="text" id="usn" name="usn" placeholder="Enter your USN" required>

    <input type="submit" value="Submit Application">
    <div style="width:100%; max-width:450px; margin:20px auto; text-align:center;">
    <a href="up.php" 
       style="display:inline-block; padding:12px 25px; background:#007bff; color:#fff; text-decoration:none; border-radius:10px; font-weight:500; transition:0.3s;">
       ← Back
    </a>
</div>
</form>

</body>
</html>
