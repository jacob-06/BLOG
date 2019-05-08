<?php 
	session_start();
	if(!empty($_SESSION))
	{
		header('location: dashboard.php');
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOG IN</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="index">
	<form>
		<h1>LOG_IN</h1>
		<input type="email" placeholder="ENTER YOUR EMAIL" name="email" required id="em">
		<input type="password" placeholder="ENTER YOUR PASSWORD" name="password" required id="pw">
		<input type="button" name="submit" onclick="log()"  value="LOG IN">
		<div id="div"></div>
	</form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/style.js"></script>
</html>

<?php  
	if (!empty($_POST)) {
	
	$email = strtolower($_POST['email']);
	$password = $_POST['password'];
	require '../db.php';
	$sql = "SELECT name FROM admin WHERE Email='".$email."' && Password='".$password."'";
	$info = $db->prepare($sql);
	$info->execute();
	$result = $info->fetchAll();
	if(count($result) == 0)
		{
			echo "<h1>"."EMAIL OR PASSWORD IS INCORRECT"."</h1>";
		}
	else
		{
			session_start();
			$_SESSION['email'] = $email;
			header('location: dashboard.php');
		}

}

?>
