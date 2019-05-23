<?php
	// if(isset($_GET['message'])){

	// 	if($_GET['message']==1){
	// 		echo '<div class="alert alert-danger" role="alert">';
	// 			echo $arr_message[$_GET['message']];
	// 		echo '</div>';
	// 	}elseif($_GET['message']==2){
	// 		echo '<div class="alert alert-success" role="alert">';
	// 			echo $arr_message[$_GET['message']];
	// 		echo '</div>';
	// 	}
	// }
?>

<form action="index.php?id=102" method="POST"">
	<fieldset>
    <legend>Connectez-vous :</legend>
		<div class="form-group">
			<label for="email">Votre Email</label>
			<input type="email" name="email" class="form-control">

			<label for="password">Votre mot de passe</label>
			<input type="password" name="password" class="form-control">

		</div>

		<button type="submit" class="btn btn-primary">Connexion</button>
	</fieldset>
</form>

