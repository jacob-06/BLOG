<!DOCTYPE html>
<html>
<head>
	<title>ABOUT US</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Coiny|ZCOOL+QingKe+HuangYou" rel="stylesheet">
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
					<li class="nav-item">
						<a href="blog.php"><i class="fas fa-blog"></i> BLOG</a>
					</li>
					<li class="nav-item active">
						<a><i class="fab fa-napster"></i> ABOUT US</a>
					</li>
					<li class="nav-item">
						<a href="contact.php"><i class="fas fa-envelope"></i> CONTACT</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<main id="about">
		<?php  

			require 'db.php';
			$sql = 'SELECT * FROM about';
			$query = $db->query($sql);
			$query->execute();
			$rslt = $query->fetchAll();
			foreach ($rslt as $element):
		?>
			<article>
				<img src="<?= $element['About_img']; ?>">
				<div>
					<h2><?= $element["About_title"]; ?></h2>
					<p><?= $element["About_text"]; ?></p>
				</div>
			</article>	
		<?php endforeach; ?> 
	</main>
	<footer>
		<div id="div1">
			<div>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="blog.php">BLOG</a></li>
					<li><a href="#">ABOUT US</a></li>
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
					foreach ($rslt as $element):
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