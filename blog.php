<!DOCTYPE html>
<html>
<head>
	<title>BLOG</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower|ZCOOL+KuaiLe" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light">
			<h1 class="navbar-brand"><img src="images/logo.jpg" alt="logo"></h1>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="index.php"><i class="fas fa-home"></i> HOME</a>
					</li>
					<li class="nav-item active">
						<a><i class="fas fa-blog"></i> BLOG</a>
					</li>
					<li class="nav-item">
						<a href="about.php"><i class="fab fa-napster"></i> ABOUT US</a>
					</li>
					<li class="nav-item">
						<a href="contact.php"><i class="fas fa-envelope"></i> CONTACT</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<main id="blog">
		
		<?php  
			require 'db.php';
			if(!empty($_GET)):
				$id = $_GET['id'];
				$sql = 'SELECT * FROM articles WHERE Id = "'.$id.'"';
				$query = $db->prepare($sql);
				$query->execute();
				$rslt = $query->fetchAll();
				foreach ($rslt as $element): 
		?>
				<article>
					<img src="<?= $element["Image"]; ?>">
					<div>
						<h2><?= $element["Title"]; ?></h2>
						<p><?= $element["Text"]; ?></p>
					</div>
				</article>		
		<?php 
			endforeach;
			endif;
		 ?>
		<div class="div">
			<?php
				if(!empty($id)):
					$query = $db->prepare("SELECT * FROM fed_back WHERE Id_article = '".$id."'");
					$query->execute();
					$rslt = $query->fetchAll();
					foreach ($rslt as $element):
			?>
				<h4><?= $element['Name'] ?> :</h4>
				<p><?= $element['Comments'] ?></p>	
				<p>/ <?= $element['Date_fed'] ?> /</p>
			<?php 
			endforeach;
			endif;
			?>
		</div>
		<section>
			<form>
				<input type="hidden" name="art" value="<?php echo $_GET['id']; ?>" id="art">
				<input type="text" name="name" placeholder="ENTER YOUR NAME" id="name">
				<input type="email" name="email" placeholder="ENTER YOUR EMAIL" id="email">
				<textarea placeholder="ENTER YOUR MESSAGE" name="msg" id="msg"></textarea>
				<div id="ddiv"></div>
				<input type="button" name="submit" value="SEND" class="but" onclick="fedback()">
			</form>
		</section>
	</main>
	<footer>
		<div id="div1">
			<div>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="#">BLOG</a></li>
					<li><a href="about.php">ABOUT US</a></li>
					<li><a href="contact.php">CONTACT</a></li>
				</ul>
			</div>
			<div id="gal">
				<h3>GALLERY</h3>
				<div id="slider">
					<figure>
				<?php  

					require 'db.php';
					$sql = 'SELECT * FROM articles';
					$query = $db->query($sql);
					$query->execute();
					$rslt = $query->fetchAll();
					foreach ($rslI as $element):
				?>	
					<a href="blog.php?id=<?= $element['Id']; ?>">
						<div class="switch" style="background-image: url('<?= $element['Image']; ?>');"></div>
					</a>
				<?php endforeach; ?>
					</figure>
				</div>
			</div>
			<div>
				<h3>CONTACT</h3>
				<p>example@xzy.com</p>
				<p>06-**-**-**-**</p>
				<a href="#"><i class="fab fa-facebook-f"></i></a>
				<a href="#"><i class="fab fa-twitter"></i></a>
				<a href="#"><i class="fab fa-instagram"></i></a>
			</div>
		</div>
		<div class="copy">
			<p>&copy made by jacob</p>
		</div>	
	</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src='js/style.js'></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

<?php  
	if (!empty($_POST)) 
		{
			$email = $_POST['email'];
			$name = $_POST['name'];
			$msg = $_POST['msg'];
			$id = $_POST['id'];
			require 'db.php';
			$sql = 'INSERT INTO fed_back (Id_article,Comments,Email,Name) VALUES ("'.$id.'","'.$msg.'","'.$email.'","'.$name.'")';
			$query = $db->prepare($sql);
			if($query->execute()) 
				{
					echo 'thank you for your comment';
				}
			else 
				{
					echo 'test2';
				}
		}
?>