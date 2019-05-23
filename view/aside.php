<!--BOUTON CONNEXION-->
	<div class="text-center cst-connect">
		<a href="index.php?id=8"><button type="button" class="btn btn-success w-100 cst-btn-connect">Connexion</button></a>
	</div>

<?php
	// echo '<pre>';
	// print_r($_SESSION);
	// echo '</pre>';
	

	if(!empty($_SESSION)){

	echo '<br><div class="alert alert-success" role="alert">
  			Bonjour ' . $_SESSION['name'] . '!</div>';

  	echo '<img src="avatar/miniature/'. $_SESSION['avatar'] .'">';		
}