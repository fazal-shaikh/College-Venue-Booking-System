<?php 
session_start(); 

// Check if the user is already logged in
if (isset($_SESSION['username'])) {     
    header('Location: FFFFFFF.php'); 
    exit();
}

// Handle login form submission (process in loginprocess.php)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Here, validate the login credentials, for example
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Assuming you have a database connection and a users table
    // You would typically check the credentials from the database
    // Example:
    // $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    // $result = mysqli_query($conn, $query);
    // if (mysqli_num_rows($result) > 0) {
    //     $_SESSION['username'] = $username;
    //     header('Location: FFFFFFF.php');
    //     exit();
    // } else {
    //     echo "Invalid credentials";
    // }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <script src="scripts.js"></script>
    <link rel="stylesheet" href="login2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="container" class="container">
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->

			<div class="col align-items-center flex-col sign-up">
				<div class="form-wrapper align-items-center">
					<div class="form sign-up">
						<div class="input-group">
							<i class="bx bxs-user"></i>
                <form id="signup1" method="post" action="FFFFFFFF.php" autocomplete="off">
                  <i class="fa fa-user"></i>
              <input type="text" name="username" placeholder="Username" onchange="user()" required/>
						</div>
						<div class="input-group">
							<i class="bx bx-mail-send"></i>
              <i class="fa fa-envelope"></i>
							<input name="email" type="email" placeholder="Email" required/>
						</div>
						<div class="input-group">
							<i class="bx bxs-lock-alt"></i>
              <i id="eye" class="fa fa-eye-slash" onclick="itoggle()"></i>
							<input name="password" id="psw" type="password" placeholder="Password" onchange="len()" required/>
              <p id="len"></p>
						</div>
						<div class="input-group">
							<i class="bx bxs-lock-alt"></i>
              <i id="eye2" class="fa fa-eye-slash" onclick="itoggle2()"></i>
							<input name="confirmpassword" id="cpsw" type="password" placeholder="Confirm password" onchange="check()" required/>
              <p id="msg"></p>
						</div>
            <input type="submit" value="Sign up">
						<!--<button>
							Sign up
						</button>-->
						<p>
							<span>
								Already have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign in here
                    </form>
							</b>
						</p>
					</div>
				</div>

			</div>

			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
					<div class="form sign-in">
						<div class="input-group">
							<i class="bx bxs-user"></i>
              <form id="signin" action="loginprocess.php" method="post">
                <i class="fa fa-user"></i>
							<input type="text" name="username" placeholder="Username" required/>
						</div>
						<div class="input-group">
							<i class="bx bxs-lock-alt"></i>
              <i id="leye" class="fa fa-eye-slash" onclick="etoggle()"></i>
                <input type="password" name="password" id="lpsw" placeholder="Password" required/>

						</div>
                <input type="submit" name='submit' value="Sign in">
						<!--<button>
							Sign in
						</button>-->
						
						<p>
							<span>
								Don't have an account?
							</span>
							<b onclick="toggle()" class="pointer">
								Sign up here
							</b>
            </form>
						</p>
					</div>
				</div>
				<div class="form-wrapper">

				</div>
			</div>
			<!-- END SIGN IN -->
		</div>
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2>
						Welcome
					</h2>

				</div>
				<div class="img sign-in">

				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">

				</div>
				<div class="text sign-up">
					<h2>
						Join with us
					</h2>

				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>
    <script>
       let container = document.getElementById('container');

function toggle() {
    container.classList.toggle('sign-in');
    container.classList.toggle('sign-up');
}

setTimeout(() => {
    container.classList.add('sign-in');
}, 200);

    </script>
</body>
</html>
