<?php
	if(isset($_GET['message'])){

		if($_GET['message']==1){
			echo '<div class="alert alert-danger" role="alert">';
				echo $arr_message[$_GET['message']];
			echo '</div>';
		}elseif($_GET['message']==2){
			echo '<div class="alert alert-success" role="alert">';
				echo $arr_message[$_GET['message']];
			echo '</div>';
		}
	}
?>

<form action="index.php?id=100" method="POST" enctype="multipart/form-data">
	<fieldset>
    <legend>Inscrivez-vous :</legend>
		<div class="form-group">
			<label for="email">Votre Email</label>
			<input type="email" name="email" class="form-control">

			<label for="password">Votre mot de passe</label>
			<input type="password" name="password" class="form-control">

			<label for="name">Votre nom</label>
			<input type="text" name="name" class="form-control">

			<label for="surname">Votre prénom</label>
			<input type="text" name="surname" class="form-control">

			<label for="avatar">Votre avatar (optionnel)</label>

			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="inputGroupFileAddon01">Votre avatar</span>
			  </div>
			  <div class="custom-file">
			    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="avatar">
			    <label class="custom-file-label" for="inputGroupFile01">Choisir un fichier</label>
			  </div>
			</div>

		</div>

		<button type="submit" class="btn btn-primary">Envoyer</button>
	</fieldset>
</form>

