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
<?php
	
	$server = "us-cdbr-iron-east-03.cleardb.net";
    $mysqli_username = "b0802f70ec104e";
    $mysqli_password = "b1ea8495";
    $db_name = "heroku_f766fea1b6951ab";
    $link = mysqli_connect("$server", "$mysqli_username" ,"$mysqli_password","$db_name") or die("can not connect");
	
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
            echo "<script>document.getElementById('err').innerHTML = 'user Successfully deleted';</script>";
            header('location:enroller.php');
        }
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
            echo "<script>document.getElementById('err').innerHTML = 'chemical Successfully deleted';</script>";
            header('location:enroller.php');
        }
	}
?>