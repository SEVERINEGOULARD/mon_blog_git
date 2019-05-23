<?php 



$results = home_getArticles();//array


// echo '<pre>';
// print_r($results);
// echo '</pre>';


foreach($results as $k => $v){
	
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

	echo '<a href="index.php?id=7&article=' . $v['p_id'] . ' "><button>En savoir plus ...</button></a>'; //renvoie sur page article


}

