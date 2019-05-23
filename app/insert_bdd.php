<?php

// $dbname = 'mon_blog';
// $user = 'root';
// $pass = '';

// try {
// 	$connexion = new PDO('mysql:host=localhost;charset=UTF8;dbname=' . $dbname, $user, $pass);

// } catch (PDOException $e) { 
// 	print "erreur ! : " . $e->getMessage() . "<br/>"; 
// 	die();
// }

// $sql = $connexion->prepare('
// 						INSERT INTO blog_post (p_title, p_content, p_image)
// 						VALUES(:title, :content, :image)
// 						');

// require 'article_fake.php';
// 	foreach ($arr_articles as $k => $v){
		
// 		$sql->bindValue(':title', $k['title'], PDO::PARAM_STR);
// 		$sql->bindValue(':content', $k['content'], PDO::PARAM_STR);
// 		$sql->bindValue(':image', $k['image'], PDO::PARAM_STR);
	
// 	$sql->execute();
// };

