<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
  include 'db.php';
  // If form submitted, insert values into the database.
  $conn = connectToDB();
  if (isset($_POST['username'])){
    $username = $_POST['username'];
	  $email = $_POST['email'];
    $password = $_POST['password'];
		// $username = stripslashes($username);
		// $username = mysqli_real_escape_string($username);
		$email = stripslashes($email);
		$email = mysqli_real_escape_string($email);
		$password = stripslashes($password);
		$password = mysqli_real_escape_string($password);
	  //$trn_date = date("Y-m-d H:i:s");
    $query = "INSERT into users (username, password, email) VALUES ('$username', '".md5($password)."', '$email')";
    $result = $conn -> query($query);
    if($result){
        echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
    } else {

        echo "something went wrong" . $query . " " . $conn->error;
    }
  }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>
