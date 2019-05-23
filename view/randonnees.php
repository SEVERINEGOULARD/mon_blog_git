<?php


$category_id = 1;
$num_page = 1;

$resultats = cat_getArticles($category_id, $num_page);

// echo '<pre>';
// print_r($resultats);
// echo '</pre>';

foreach($resultats as $k => $v){
	
	echo '<div class="row">';
		echo '<div class="bande-art"></div><br>';

		echo '<div class="col-md-5">';
			echo '<img src="image/' . $v['image'] . '" class="image-art">';
		echo '</div>';	 

		echo '<div class="col-md-7">';
			echo '<h2 class="titre-art">' . $v['p_title'] . '</h2><br>';

			echo '<p class="para-art">' . $v['p_content'] . '</p>';
		echo '</div>';
	echo '</div>';	
}