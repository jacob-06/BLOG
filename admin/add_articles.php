<?php 
	session_start();
	if(empty($_SESSION))
	{
		header('location: index.php');
	} 
	require '../db.php';
?>

<?php  

	if (!empty($_POST)) 
		{ 

			$title = strtoupper($_POST['title']);
			$stext = $_POST['stext'];
			$btext = $_POST['btext'];
			if (isset($_FILES['image'])) 
				{
					$errors = array();
					// fin kayn lfolder ta3 tophs
					$dir = "C:/xampp/htdocs/BLOG/images/";
					// les donnee dyal toph
					$image_name = $_FILES['image']['name'];
					$image_size = $_FILES['image']['size'];
					$image_tmp = $_FILES['image']['tmp_name'];
					$image_type = $_FILES['image']['type'];
					// $image_ext = strtolower(end(explode('.',$image_name)));
					$mime = array("jpeg","jpg","png");
					// src li 4adi yat7at fdata base
					$move = "images/".$image_name;
					// if(in_array($image_ext,$mime)=== false)
					// 	{
				    //     	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
					//     }
				      
				    if($image_size > 2097152)
					    {
					        $errors[]='File size must be excately 2 MB';
					    }
				      
				    if(empty($errors)==true)
					    {
					        move_uploaded_file($image_tmp,$dir.$image_name);
					        echo "Success"."<br>";
					    }
				    else
					    {
					        print_r($errors);
					    }

				}
			$sql = 'INSERT INTO articles (Title,Image,Text,Resume) VALUES ("'.$title.'","'.$move.'","'.$btext.'","'.$stext.'")';
			$query = $db->prepare($sql);
			if($query->execute()) 
				{
					var_dump($query);
				}
			else 
				{
					echo 'test2';
				}
		}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>ADD ARTICLES</title>
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
								<li>ADD</li>
								<a href="edit_articles.php"><li>EDIT</li></a>
							</ul>
						</div>	
					</li>
					<li class="ol"><a href="edit_about.php"><h2>About</h2></a></li>
					<li class="ol"><a href="edit_contacts.php"><h2>Contact</h2></a></li>
					<li class="ol"><a href="new_admin.php"><h2>Add admin</h2></a></li>
					<li class="ol"><a href="log_out.php"><h2>Log out</h2></a></li>
				</ul>
			</aside>
			<section id="add_articles">
				<form action="add_articles.php" method="POST" enctype="multipart/form-data">
					<input type="text" name="title" placeholder="ENTER THE TITLE" id="title" required>
					<input type="file" name="image" placeholder="ENTER THE IMAGE SRC" id="image" required>
					<input type="text" name="stext" placeholder="ENTER THE RESUME" id="stext" required>
					<textarea name="btext" placeholder="ENTER THE TEXT" id="btext" required></textarea>
					<input type="submit" name="submit" value="ADD" class="but">
				</form>
			</section>
		</main>
		<footer>
			
		</footer>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/style.js"></script>
</html>


