<?php 
	session_start();
	if(empty($_SESSION))
	{
		header('location: index.php');
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>NEW ADMIN</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	</head>
	<body id="dashb">
		<header>
			<nav>
				<ul>
					<li><a href="../index.php"><i class="fas fa-home"></i> HOME</a></li>
					<li><a href="../blog.php"><i class="fas fa-blog"></i> BLOG</a></li>
					<li><a href="../about.php"><i class="fab fa-napster"></i> ABOUT US</a></li>
					<li><a href="../contact.php"><i class="fas fa-envelope"></i> CONTACT</a></li>
				</ul>
			</nav>
		</header>
		<main>
			
			<aside>
				<a href="dashboard.php">
					<div id="div"><h1>DASHBOARD</h1></div>
				</a>
				<ul>
					<li class="li ol">
						<div class="front">
							<h2>Articles</h2>
						</div>
						<div class="back">
							<ul>
								<a href="add_articles.php"><li>ADD</li></a>
								<a href="edit_articles.php"><li>EDIT</li></a>
							</ul>
						</div>	
					</li>
					<li class="ol"><a href="edit_about.php"><h2>About</h2></a></li>
					<li class="ol"><a href="edit_contacts.php"><h2>Contact</h2></a></li>
					<li class="ol"><h2>Add admin</h2></li>
					<li class="ol"><a href="log_out.php"><h2>Log out</h2></a></li>
				</ul>
			</aside>
			<section id="add_admin">
				<form>
						<h2>SIGN_up</h2>
						<input type="text" placeholder="ENTER YOUR SURNAME" name="name" id='name' required>
						<input type="email" placeholder="ENTER YOUR EMAIL" name="email" id='email' required>
						<input type="password" placeholder="ENTER YOUR PASSWORD" name="password" id='password' required>
						<input type="button" class="but" name="submit" onclick="add_admn()" value="ADD ADMIN">
				</form>
			</section>
		</main>
		<footer>
			
		</footer>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/style.js"></script>
</html>


<?php  

	$name = strtolower($_GET['name']);
	$email = strtolower($_GET['email']);
	$pword = $_GET['password'];
	$image = $_GET['image'];
	require '../db.php';
	$sql = "INSERT INTO user (Name,Email,Password) VALUES ('".$name."','".$email."','".$pword."')";
	$info = $db->prepare($sql);
	if ($info->execute()) 
		{
			echo "good";
		}
	else
		{
			echo "<h1>"."something wrong"."</h1>";
		}

?>