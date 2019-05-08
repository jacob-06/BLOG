<?php  

	try
		{
			$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
		}
	catch (Exception $e)
		{
			echo $e->getMessage();
		}

?>