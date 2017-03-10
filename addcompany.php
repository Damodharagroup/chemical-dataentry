<?php 	ob_start(); ?>
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
	<title>Add Company</title>
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
			width: 230px !important;
			font-size: 14px;
			border-radius: 2px;
			border: 1px solid #dbe2e8;
			box-shadow: 0 0.25em 0.5em 0 rgba(46, 61, 73, 0.12);
			transition: box-shadow 0.3s ease, border 0.3s ease;
		}
		.foot {
					padding: 15px 15px;
					background-color: #f5f5f5;
					border-top: 1px solid #ddd;
					border-bottom-right-radius: 3px;
					border-bottom-left-radius: 3px;
				}
	</style>
</head>
<body>
	<div class="col-md-12">
		<p id="err" class="error1"></p>
		<form autocomplete = "on" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<table style="width:100%; margin-bottom: 30px;">
				<fieldset>
				 <legend> <span style="color: #307699;"> ADD COMPANY </span></legend>
				  <tr>
				    <th style="padding: 1em;">Company Name</th>
				    <th style="padding: 1em;">Address</th>
				    <th style="padding: 1em;">Product Type</th>
				  </tr>
				  <tr>
				    <td class="column1"><input type="text" name="compname" placeholder="Company Name" ></td>
				    <td class="column1"><input type="text" name="doorno" placeholder="Door No" ></td>
				    <td class="column1"><input type="text" name="producttype" placeholder="Product Type" ></td>
				   </tr>
				   <tr>
					   	<td class="column1"></td>
					    <td class="column1"><input type="text" name="streetno" placeholder="Street No" ></td>
					   	<td class="column1"></td>
				   </tr>
				   <tr>
					   	<td class="column1"></td> 
					    <td class="column1"><input type="text" name="locality" placeholder="Locality" ></td>
					    <td class="column1"></td>
				    </tr>
				    <tr>
					   	<td class="column1"></td>
					   	<td class="column1"><input type="text" name="town" placeholder="Town/City" ></td>
					    <td class="column1"></td>
				    </tr>
				    <tr>
					   	<td class="column1"></td>
					    <td class="column1"><input type="text" name="state" placeholder="State" ></td>
					    <td class="column1"></td>
				    </tr>
				    <tr>
					   	<td class="column1"></td>
					    <td class="column1"><input type="text" name="pin" placeholder="PIN" ></td>
					    <td class="column1"></td>
					</tr>
				    <tr>
					   	<td class="column1"></td>
					    <td class="column1"><input type="text" name="contactno" placeholder="Contact No"></td>
					    <td class="column1"></td>
				    </tr>
				    <tr>
					   	<td class="column1"></td>
					    <td class="column1"><input type="text" name="email" placeholder="Email" ></td>
					   	<td class="column1"></td>
				   	</tr>
				   </fieldset>
			</table>
	
			<table id="myTable1" style="width:100%; margin-bottom: 30px;">
				<fieldset>
				<legend><span style="color: #307699;"> CHEMICALS </span></legend>
				  <tr>
				    <th style="padding: 1em;">CAS RN</th>
				    <th style="padding: 1em;">Purity</th>
				    <th style="padding: 1em;">Nature</th>
				    <th style="padding: 1em;">Min Quantity</th>
				    <th style="padding: 1em;">Max Quantity</th>
				  </tr>
				  <tr>
				    <td class="column1"><input type="text" name="1" placeholder="CAS RN"  ></td>
				    <td class="column1"><input type="text" name="2" placeholder="Purity"></td>
				    <td class="column1"><input type="text" name="3" placeholder="Nature"></td>
				    <td class="column1"><input type="text" name="4" placeholder="Min Quantity"  ></td>
				    <td class="column1"><input type="text" name="5" placeholder="Max Quantity"  ></td>
				   </tr>
				</fieldset>
			</table>
				<input type = "submit" name="submit" value="SUBMIT" class="button" style="float: right;">
		</form>
				<button onclick="insertRow1();">Add Another</button>
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
		$server = "localhost";
	    $mysqli_username = "root";
	    $mysqli_password = "datta";
	    $db_name = "chemicals";
	    $link = mysqli_connect("$server", "$mysqli_username" ,"$mysqli_password","$db_name") or die("can not connect");

	    $compname = $_POST['compname'];
	    $doorno = $_POST['doorno'];
	    $streetno = $_POST['streetno'];
	    $locality = $_POST['locality'];
	    $town = $_POST['town'];
	    $state = $_POST['state'];
	    $pin = $_POST['pin'];
	    $contactno = $_POST['contactno'];
	    $email = $_POST['email'];
	    $producttype = $_POST['producttype'];

	    $sql = "INSERT INTO ADDRESS (DOORNO,STREETNO,LOCALITY,TOWN,STATE,PIN,CONTACT,EMAIL) 
	    				VALUES('$doorno','$streetno','$locality','$town','$state','$pin','$contactno','$email')";
	    $result = mysqli_query($link,$sql);

		$sql = "SELECT AID FROM ADDRESS WHERE CONTACT='$contactno' AND EMAIL='$email'";

		$result = mysqli_query($link,$sql);

		$count = mysqli_num_rows($result);
	    $count =1 ;
		if($count > 0)
		{
			$row = mysqli_fetch_assoc($result);
			$addressid = $row['AID'];
			$sql = "SELECT COMP_NAME FROM COMPANY WHERE COMP_NAME ='$compname'";
			$result = mysqli_query($link,$sql);

			$count = mysqli_num_rows($result);

			if($count > 0)
			{
				echo "<script>document.getElementById('err').innerHTML = 'Company Already Exists';</script>";
			}
			else 
			{
				$sql = "INSERT INTO COMPANY (COMP_NAME,ADDRESSID,PRODUCT_TYPE) VALUES('$compname','$addressid','$producttype')";
				$result = mysqli_query($link,$sql);
				if(!($result))
				{
					echo "<script>document.getElementById('err').innerHTML = 'Wrong Credentials';</script>";
				}
				$sql = "SELECT COMP_ID FROM COMPANY WHERE COMP_NAME ='$compname'";
				$result = mysqli_query($link,$sql);
				$row = mysqli_fetch_assoc($result);
				$compid = $row['COMP_ID'];
				$index = 1;
			    while (isset($_POST[$index + ''])) {
			        $casno = $_POST[$index++ +''];
			        $purity = $_POST[$index++ +''];
			        $nature = $_POST[$index++ +''];
			        $minqty = $_POST[$index++ +''];
			        $maxqty = $_POST[$index++ +''];

			        $sql = "SELECT COMP_ID,CASRN,PURITY  FROM CHEMCOMP WHERE COMP_ID='$compid' AND CASRN='$casno' AND PURITY = '$purity'";
			        $result = mysqli_query($link,$sql);

			        $count = mysqli_num_rows($result);

			        if($count > 0)
			        {
			            echo "<script>document.getElementById('err').innerHTML = 'Some Chemicals already Exists';</script>";
			        }
			        else 
			        {
			            $sql = "INSERT INTO CHEMCOMP (COMP_ID,CASRN,PURITY,NATURE,MINQUANTITY,MAXQUANTITY) VALUES ('$compid','$casno','$purity','$nature','$minqty','$maxqty')";            
			            $result = mysqli_query($link,$sql);
			            if($result)
			                echo "<script>document.getElementById('err').innerHTML = 'chemicals Successfully added';</script>";
			            else
			            {
			                echo "<script>document.getElementById('err').innerHTML = 'Wrong Credentials';</script>";
			            }
			        }
			    }
			}
		}
	}
	ob_end_flush();
?>