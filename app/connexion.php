<?php

$connexion = dbConnect();



$sql = $connexion->prepare('
							SELECT * FROM blog_user WHERE u_email=:email
						');

	$sql->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
	
	$sql->execute();

	$resultat = $sql->fetch();
	
	// echo '<pre>';
	// print_r($resultat);
	// echo '</pre>';
	// exit;

	$password_verify = password_verify($_POST['password'], $resultat['u_password']);

	// echo '<pre>';
	// var_dump($password_verify);
	// echo '</pre>';
	// exit;

	if($password_verify){

		$_SESSION['access'] = true;//création de la session d'accès

		$_SESSION['name'] = $resultat['u_surname'];
		$_SESSION['avatar'] = $resultat['u_avatar'];

	// echo '<pre>';
	// print_r($_SESSION);
	// echo '</pre>';
	// exit;

		header ('Location: index.php?id=1');
		}else{
			echo '<p><b>Echec connexion !</b></p>';
		}

