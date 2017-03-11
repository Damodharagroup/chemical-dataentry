<?php   ob_start(); ?>
<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	if(isset($_SESSION['username']))
    {}
	else{
		header('location:index.php');
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Chemicals</title>
		<link rel = "stylesheet" href = "css/bootstrap.css">
		<link rel = "stylesheet" href = "css/style.css">
		<link rel = "stylesheet" href = "css/styletable.css">
		<script src="adder.js"></script>
		<header>
 			<div class = "navbar-inverse" style="background-color: #1e3547;height : 60px;">
				<div class="col-4" style="float: left;padding: 1em">
					<a href = "index.php" style="text-transform: uppercase;font-weight: bold;color:white;letter-spacing: inherit;">Chemical Database System</a>
				</div>
				<div class="col-8" style="float: right;">
					<div class="col-2" style="text-align: center;float: right;margin-right: 5em;"><p style="padding: 1em;"><a href="admin.php" style="emtext-decoration: none;">Admin</a></p></div>
					<div class="col-2" style="float: right;text-align: center;"><p style="padding: 1em;"><a href="logout.php" style="emtext-decoration: none;">Logout</a></p></div>					
					<div class="col-2" style="text-align: center;float: right;"><p style="padding: 1em;"><a href="addcompany.php" style="emtext-decoration: none;text-align: center;">ADD COMPANY</a></p></div>
					<div class="col-2" style="text-align: center;float: right;"><p style="padding: 1em;"><a href="addchemical.php" style="emtext-decoration: none;">ADD CHEMICAL</a></p></div>
				</div>
			</div>
		</header>
	<style>
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
</head>
<body>
	<div class="col-md-12">
		<p id="err" class="error1"></p>
		<form autocomplete = "on" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table id="myTable">
				<fieldset>
				<legend><span style="color: #307699;"> CHEMICALS </span></legend>
				  <tr>
				    <th>Chemical Name</th>
				    <th>CAS number</th>
				    <th>PUB CHEM Number</th>
				    <th>Molecular Weight</th>
				    <th>Density (g/cm3)</th>
				  </tr>
				  <tr>
				    <td class="column1"><input type="text" name="1" placeholder="Chemical Name"  ></td>
				    <td class="column1"><input type="text" name="2" placeholder="CAS number"  ></td>
				    <td class="column1"><input type="text" name="3" placeholder="PUB CHEM Number"  ></td>
				    <td class="column1"><input type="text" name="4" placeholder="Molecular Weight"  ></td>
				    <td class="column1"><input type="text" name="5" placeholder="Density (g/cm3)"  ></td>
				   </tr>
				   </fieldset>
			</table>
				<input type = "submit" name="submit" value="SUBMIT" class="button" style="float: right;">
		</form>
				<button onclick="insertRow()">Add Another</button>
	</div>
</body>
	<footer class="foot">
	    <p>
	        Vendor DataBase System | &copy; 2017-2019 reserved.
	    </p>
	</footer>
</html>

<?php
	if(isset($_POST['submit']))
	{
	    $server = "us-cdbr-iron-east-03.cleardb.net";
	    $mysqli_username = "b0802f70ec104e";
	    $mysqli_password = "b1ea8495";
	    $db_name = "heroku_f766fea1b6951ab";
	    $link = mysqli_connect("$server", "$mysqli_username" ,"$mysqli_password","$db_name") or die("can not connect");

	    $index = 1;
	    while (isset($_POST[$index + ''])) {
	        // echo $_POST[$index++ +''];
	        // echo $_POST[$index++ +''];
	        // echo $_POST[$index++ +''];
	        // echo $_POST[$index++ +''];
	        // echo $_POST[$index++ +''];
	        $chemname = $_POST[$index++ +''];
	        $casno = $_POST[$index++ +''];
	        $pubchemno = $_POST[$index++ +''];
	        $molwt = $_POST[$index++ +''];
	        $density = $_POST[$index++ +''];

	        // echo $chemname;
	        // echo $casno;
	        // echo $pubchemno;
	        // echo $molwt;
	        // echo $density;
	        $sql = "SELECT CHEM_NAME FROM CHEMICALS WHERE CHEM_NAME='$chemname'";
	        $result = mysqli_query($link,$sql);

	        $count = mysqli_num_rows($result);

	        // echo $count;
	        // If result matched $myusername and $mypassword, table row must be 1 row
	        if($count > 0)
	        {
	            $str = "<script>document.getElementById('err').innerHTML = '";
	            $str .= $chemname;
	            $str .= " already Exists';</script>";
	            echo $str;
	        }
	        else 
	        {
	            $sql = "INSERT INTO CHEMICALS (CHEM_NAME,CASRN,PUBCHEMID,MOLECULAR_WEIGHT,DENSITY) VALUES ('$chemname','$casno','$pubchemno','$molwt','$density')";            
	            $result = mysqli_query($link,$sql);
	            if($result)
	                echo "<script>document.getElementById('err').innerHTML = 'chemicals Successfully added';</script>";
	            else
	            {
	                echo "<script>document.getElementById('err').innerHTML = 'Wrong Credentials';</script>";
	            }
	            // header('location:addchemical.php');
	        }
	    }
	}
	ob_end_flush();
?>