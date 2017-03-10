<?php 	ob_start(); ?>

<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	if(!isset($_SESSION['admin']))
	{
		$_SESSION['error'] = "Admin Login needed";
		header('location:admin.php');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<link rel = "stylesheet" href = "css/bootstrap.css">
		<link rel = "stylesheet" href = "css/style.css">
		<link rel = "stylesheet" href = "css/styletable.css">
		<script type="text/javascript" src="adder.js"></script>
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
					padding: 25px 15px;
					background-color: #f5f5f5;
					border-top: 1px solid #ddd;
					border-bottom-right-radius: 3px;
					border-bottom-left-radius: 3px;
				}
				table {
				    font-family: arial, sans-serif;
				    border-collapse: collapse;
				    width: 100%;
				}

				td, th {
				    border: 1px solid #dddddd;
				    text-align: left;
				    padding: 2px;
				}

				tr{
				    background-color: #dddddd;
				}
				input {
					margin-top: 10px;
					margin-bottom: 10px;
					color: #2e3d49;
					width: 250px !important;
					font-size: 14px;
					border-radius: 2px;
					border: 1px solid #dbe2e8;
					box-shadow: 0 0.25em 0.5em 0 rgba(46, 61, 73, 0.12);
					transition: box-shadow 0.3s ease, border 0.3s ease;
				}
			</style>
		</header>
	</head>
	<body>
		<div class="col-md-12">
			<p id="err" class="error1"></p>
			<form autocomplete = "on" method="post" action="<?php $_SESSION['enrolluser'] = "true";echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table id="myTable2">
					<fieldset>
					<legend><span style="color: #307699;"> Enroll User </span></legend>
					  <tr>
					    <th>User Name</th>
					    <th>Password</th>
					  </tr>
					  <tr>
					    <td class="column1"><input type="text" name="1" placeholder="User Name"  ></td>
					    <td class="column1"><input type="text" name="2" placeholder="Password"  ></td>
					   </tr>
					   </fieldset>
				</table>
					<input type = "submit" name="submit" value="SUBMIT" class="button" style="float: right;">
			</form>
					<button onclick="insertnewRow()">Add Another</button>
		</div>
		<div class="col-md-12" style="margin-top: 10px;">
			<p id="err" class="error1"></p>
			<form autocomplete = "on" method="post" action="<?php $_SESSION['deleteuser'] = "true"; echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table>
					<fieldset>
					<legend><span style="color: #307699;"> Delete User </span></legend>
					  <tr>
					    <th>User Name</th>
					  </tr>
					  <tr>
					    <td class="column1"><input type="text" name="username" placeholder="User Name"  ></td>
					   </tr>
					   </fieldset>
				</table>
					<input type = "submit" name="submit" value="SUBMIT" class="button" style="float: right;">
			</form>
		</div>

		<div class="col-md-12" style="margin-top: 10px;">
			<p id="err" class="error1"></p>
			<form autocomplete = "on" method="post" action="<?php $_SESSION['deletechemical'] = "true"; echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table>
					<fieldset>
					<legend><span style="color: #307699;"> Delete Chemical </span></legend>
					  <tr>
					    <th>CAS Number</th>
					  </tr>
					  <tr>
					    <td class="column1"><input type="text" name="casno" placeholder="CAS Number"  ></td>
					   </tr>
					   </fieldset>
				</table>
					<input type = "submit" name="submit" value="SUBMIT" class="button" style="float: right;">
			</form>
		</div>

		<div class="col-md-12" style="margin-top: 10px;">
			<p id="err" class="error1"></p>
			<form autocomplete = "on" method="post" action="<?php $_SESSION['deletecomp'] = "true"; echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<table>
					<fieldset>
					<legend><span style="color: #307699;"> Delete Company </span></legend>
					  <tr>
					    <th>Company Name</th>
					  </tr>
					  <tr>
					    <td class="column1"><input type="text" name="compname" placeholder="Company Name"  ></td>
					   </tr>
					   </fieldset>
				</table>
					<input type = "submit" name="submit" value="SUBMIT" class="button" style="float: right;">
			</form>
		</div>

	</body>
	<footer class="foot">
	    <p>
	        Vendor DataBase System | &copy; 2017-2019 reserved.
	    </p>
	</footer>
</html>
<?php

    $server = "localhost";
    $mysqli_username = "root";
    $mysqli_password = "datta";
    $db_name = "chemicals";
    $link = mysqli_connect("$server", "$mysqli_username" ,"$mysqli_password","$db_name") or die("can not connect");

	if(isset($_POST['submit']) && isset($_SESSION['enrolluser']))
	{

	    $index = 1;
	    while (isset($_POST[$index + ''])) {
	        $username = $_POST[$index++ +''];
	        $password = $_POST[$index++ +''];

	        $sql = "SELECT username FROM USERINFO WHERE username='$username'";
	        $result = mysqli_query($link,$sql);

	        $count = mysqli_num_rows($result);

	        // echo $count;
	        // If result matched $myusername and $mypassword, table row must be 1 row
	        if($count > 0)
	        {
	            $str = "<script>document.getElementById('err').innerHTML = '";
	            $str .= $username;
	            $str .= " already Exists';</script>";
	            echo $str;
	        }
	        else 
	        {
	            $sql = "INSERT INTO USERINFO VALUES ('$username','$password')";            
	            $result = mysqli_query($link,$sql);
	            if($result)
	                echo "<script>document.getElementById('err').innerHTML = 'user Successfully added';</script>";
	            else
	            {
	                echo "<script>document.getElementById('err').innerHTML = 'Wrong Credentials';</script>";
	            }
	            // header('location:addchemical.php');
	        }
	    }
	    unset($_SESSION['enrolluser']);
	}

	if(isset($_POST['submit']) && isset($_SESSION['deleteuser']))
	{
        $username = $_POST['username'];

        $sql = "DELETE FROM USERINFO WHERE username='$username'";
        $result = mysqli_query($link,$sql);
        $count = mysqli_num_rows($result);

        // echo $count;
        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count > 0)
        {
            $str = "<script>document.getElementById('err').innerHTML = '";
            $str .= $username;
            $str .= " do not Exists';</script>";
            echo $str;
        }
        else 
        {
        	$str = "<script>document.getElementById('err').innerHTML = '";
            $str .= "Action Successfull';</script>";
            echo $str;
            // header('location:enroller.php');
        }
        unset($_SESSION['deleteuser']);
	}

	if(isset($_POST['submit']) && isset($_SESSION['deletechemical']))
	{
        $casno = $_POST['casno'];

        $sql = "DELETE FROM CHEMICALS WHERE CASRN='$casno'";
        $result = mysqli_query($link,$sql);
        $count = mysqli_num_rows($result);

        // echo $count;
        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count > 0)
        {
            $str = "<script>document.getElementById('err').innerHTML = '";
            $str .= $casno;
            $str .= " do not Exists';</script>";
            echo $str;
        }
        else 
        {
        	$str = "<script>document.getElementById('err').innerHTML = '";
            $str .= "Action Successfull';</script>";
            echo $str;
            // echo "<script>document.getElementById('err').innerHTML = 'chemical Successfully deleted';</script>";
            // header('location:enroller.php');
        }
        unset($_SESSION['deletechemical']);
	}

	if(isset($_POST['submit']) && isset($_SESSION['deletecomp']))
	{
        $compname = $_POST['compname'];

        $sql = "SELECT COMP_ID FROM COMPANY WHERE COMP_NAME='$compname'";
        $result = mysqli_query($link,$sql);
        $count = mysqli_num_rows($result);

        if($count > 0){

			$row = mysqli_fetch_assoc($result);
			$compid = $row['COMP_ID'];
	        $sql = "DELETE FROM COMPANY WHERE COMP_ID ='$compid'";
	        $result = mysqli_query($link,$sql);
	        $count = mysqli_num_rows($result);

	        // echo $count;
	        // If result matched $myusername and $mypassword, table row must be 1 row
	        if($count > 0)
	        {
	            $str = "<script>document.getElementById('err').innerHTML = '";
	            $str .= $compname;
	            $str .= " do not Exists';</script>";
	            echo $str;
	        }
	        else 
	        {
	        	$str = "<script>document.getElementById('err').innerHTML = '";
	            $str .= "Action Successfull';</script>";
	            echo $str;
	            // echo "<script>document.getElementById('err').innerHTML = 'company Successfully deleted';</script>";
	            // header('location:enroller.php');
	        }
	        unset($_SESSION['deletecomp']);
        }
	}
	ob_end_flush();
?>