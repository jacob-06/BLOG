<?php  

	$title = strtoupper($_POST['title']);
	$image = $_POST['image'];
	$stext = $_POST['stext'];
	$btext = $_POST['btext'];
	require '../db.php';
	$sql = 'INSERT INTO Articles (Title,Image,Text,Resume) VALUES ("'.$title.'","'.$image.'","'.$btext.'","'.$stext.'")';
	$query = $db->prepare($sql);
	if($query->execute()) 
		{
			header('location: add_articles.php');
		}
	else 
		{
			echo 'test2';
		}

?>