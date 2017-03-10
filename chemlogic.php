<?php 	ob_start(); ?>

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

	    // echo($compname);
	    // echo($doorno);
	    // echo($streetno);
	    // echo($locality);
	    // echo($town);
	    // echo($state);
	    // echo($pin);
	    // echo($contactno);
	    // echo($email);
	    // echo($producttype);

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
			// echo($addressid);
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
			            // header('location:addchemical.php');
			        }
			    }
			}
		}
	}
	ob_end_flush();
?>