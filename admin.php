<?php ob_start(); ?>
<?php
	if (isset($_SESSION['username'])) {
		header('location:index.php');
		exit;
	}
?>
<?php
		$Err = $username = $password = "";
		$usernameErr = $passwordErr = "";
	if(isset($_POST["submit"])) 
	{
		$count = 0;
		if ($_POST["submit"]) 
		{
		   if (empty($_POST["username"])) 
		   {
		   		$count = 1;
		   		$usernameErr = "UserName is required";
		   } 	
		   else 
		   {
		   	  	$username = test_input($_POST["username"]);
		   		if(strlen($username) <= 0 || strlen($username) > 20)
		   		{
		   			$count = 1;
		   			$usernameErr = "username limit is only 20 chatacters";	
		   		}
				// check if name only contains letters and whitespace
				if (!preg_match("/^[a-zA-Z ]*$/",$username)) 
				{
		   			$count = 1;
			   		$usernameErr = "Only letters and white space allowed"; 
			 	}
		   }

		   if (empty($_POST["password"])) 
		   {
		   		$count = 1;
		   		$passwordErr = "Password is required";
		   } 	
		   else 
		   {
		   	  	$password = test_input($_POST["password"]);
		   		if(strlen($password) <= 0 || strlen($password) > 20)
		   		{
		   			$count = 1;
		   			$passwordErr = "password limit is only 20 chatacters";	
		   		}
		   }
		}
	}
   function test_input($data) 
   {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<link rel = "stylesheet" href = "css/bootstrap.css">
		<link rel = "stylesheet" href = "css/style.css">
		<link rel = "stylesheet" href = "css/styletable.css">
		<header>
 			<div class = "navbar-inverse" style="background-color: #1e3547;height : 60px;">
				<div class="col-10" style="float: left;padding: 1em">
					<a href = "index.php" style="text-transform: uppercase;font-weight: bold;color:white;letter-spacing: inherit;">Chemical Database System</a>
				</div>
				<div class="col-2" style="float: right;">
					<div class="col-2" style="float: left;text-align: center;"><p style="padding: 1em;"><a href="logout.php" style="emtext-decoration: none;">Logout</a></p></div>
				</div>
			</div>
			<style type="text/css">
				.foot {
					padding: 15px 15px;
					background-color: #f5f5f5;
					border-top: 1px solid #ddd;
					border-bottom-right-radius: 3px;
					border-bottom-left-radius: 3px;
				}
			</style>
		</header>
	</head>
	<body>
		<div class="container" >
			<table style="width:100%; margin-top: 30px; margin-bottom: 30px;">
				<tr>
					<td class="column1"></td>
					<td class="column">
						<form autocomplete = "off" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
							<fieldset>
								<legend><span style="color: #307699;">SIGN IN</span></legend>
								<div id = "err" class="error"></div>
								<span class="htext">UserName </span>
								<span class="error">* <?php echo $usernameErr;?></span>
								<br/>
								<input type = "text" placeholder="UserName" name="username" class="inp"><br/>
								<span class="htext">Password </span>
								<span class="error">* <?php echo $passwordErr;?></span>
								<br/>
								<input type = "password" placeholder="Password" name="password" class="inp"><br/>
								<input type = "submit" name="submit" value="submit" class="button">
							</fieldset>
						</form>
					</td>
					<td class="column1"></td>
				</tr>
			</table>
		</div>
	</body>
	<footer class="foot navbar-fixed-bottom">
	    <p>
	        Vendor DataBase System | &copy; 2017-2019 reserved.
	    </p>
	</footer>
</html>
<?php
	if(isset($_POST['submit']))
	{
		if($count == 0)
		{
			$server = "us-cdbr-iron-east-03.cleardb.net";
		    $mysqli_username = "b0802f70ec104e";
		    $mysqli_password = "b1ea8495";
		    $db_name = "heroku_f766fea1b6951ab";
		    $link = mysqli_connect("$server", "$mysqli_username" ,"$mysqli_password","$db_name") or die("can not connect");

			$sql = "SELECT username,password FROM ADMIN WHERE username='$username' and password='$password'";
			$result = mysqli_query($link,$sql);

			$count = mysqli_num_rows($result);

			// If result matched $myusername and $mypassword, table row must be 1 row
			if($count == 1)
			{
				// Register $myusername, $mypassword and redirect to file "login_success.php"
				session_start();

				$_SESSION['admin'] = $username;
				// $_SESSION['password'] = $password;
				// session_register("username");
				// session_register("password"); 
				header('location:enroller.php');
				exit;
			}
			else 
			{
				echo "<script>document.getElementById('err').innerHTML = 'Wrong UserName or Password';</script>";
			}
			ob_end_flush();
		}
	}
?>