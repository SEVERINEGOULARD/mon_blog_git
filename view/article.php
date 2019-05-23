<?php

$connexion = dbConnect();

$id_art = $_GET['article']; //id de l'article dans la table

// echo'<pre>';
// print_r($_GET);
// echo'</pre>';

if(!empty($_GET['article'])){

	$sql = $connexion->prepare('
			SELECT * FROM blog_post AS p WHERE p.p_id=:id_art ORDER BY p.p_id DESC
		');
	$sql->bindValue(':id_art', $id_art, PDO::PARAM_INT);

	$sql->execute();

	$resultat = $sql->fetch();

}

if(!empty($_GET['article'])){

	$sql2 = $connexion->prepare('
			SELECT * FROM blog_comment AS c WHERE c.c_id=:id_art ORDER BY c.c_id DESC
		');
	$sql2->bindValue(':id_art', $id_art, PDO::PARAM_INT);

	$sql2->execute();

	$resultat2 = $sql2->fetch();

}

// echo '<pre>';

// print_r($resultat);

// echo '</pre>';

	echo '<div class="row">';

		//image
		echo '<div class="col-md-12">';
			echo '<img src="" class="image-art">';
		echo '</div>';	 

		//titre & texte
		echo '<div class="col-md-12">';
			echo '<h2 class="titre-art">' . $resultat['p_title'] . '</h2><br>';
			echo '<p class="para-art">' . $resultat['p_content'] . '</p>';
		echo '</div>';

		//commentaires
		echo '<div class="col-md-12">';
			echo '<p class="comment-art">' . $resultat2['c_content'] . '</p>';
		echo '</div>';

	echo '</div>';


