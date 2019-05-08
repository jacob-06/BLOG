<?php 
	session_start();
	if(empty($_SESSION))
	{
		header('location: index.php');
	} 
	if(!empty($_GET))
	{
		$id = $_GET['id'];
		require '../db.php';
		$sql = "DELETE FROM `msgs` WHERE `Id_msg` = '".$id."'";
		$query = $db->query($sql);
		if ($query->execute()) 
			{
				header('location: edit_contacts.php');
			}
		else
			{
				echo "something wrong";
			}
	} 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>EDIT CONTACTS</title>
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
					<li class="ol"><h2>Contact</h2></li>
					<li class="ol"><a href="new_admin.php"><h2>Add admin</h2></a></li>
					<li class="ol"><a href="log_out.php"><h2>Log out</h2></a></li>
				</ul>
			</aside>
			<section id="edit_con">
				<?php  
					require '../db.php';
					$sql = 'SELECT * FROM msgs';
					$query = $db->query($sql);
					$query->execute();
					$rslt = $query->fetchAll();
					foreach ($rslt as $element):
				?> 		
						<article>
							<div id='na_em'>
								<p><?= $element["Name_msg"] ?></p>
								<p><?= $element["Email_msg"] ?></p>
							</div>
							<div>
								<p><?= $element["Msg"] ?></p>
							</div>
							<div id='ed_re'>
								<a href="http://localhost/blog/admin/edit_contacts.php?id=<?= $element['Id_msg'] ?>" id="red">REMOVE</a>
							</div>
						</article>
					<?php endforeach; ?>
			</section>
		</main>
		<footer>
			
		</footer>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/style.js"></script>
</html>
