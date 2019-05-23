<?php

// echo '<pre>';
// 	print_r($fileInfo);
// echo '</pre>';exit;



if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){//vérif mail
	if(!empty($_POST['password'])){

		//cryptage password :
		$passHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

		//traitement de l'image :

		if(!empty($_FILES)){
			if($_FILES['avatar']['error'] === 0){
				$maxSize = 1000 * 1024;
				if($_FILES['avatar']['size'] <= $maxSize){
					$fileInfo = pathinfo($_FILES['avatar']['name']);//monfichier.jpg
					
						$extension = strtolower($fileInfo['extension']);
						$extension_autorisees = ['jpg', 'jpeg', 'png', 'svg', 'gif'];
						if(in_array($extension, $extension_autorisees)){
							$image_name = md5(uniqid(rand(), true));//nom unique
								$config_miniature_width = 150;

								if($extension == 'jpg' || $extension == 'jpeg'){
									$new_image = imagecreatefromjpeg($_FILES['avatar']['tmp_name']);
								}elseif($extension == 'gif'){
									$new_image = imagecreatefromgif($_FILES['avatar']['tmp_name']);
								}elseif($extension == 'png'){
									$new_image = imagecreatefrompng($_FILES['avatar']['tmp_name']);
								}

								$original_width = imagesx($new_image); 
								$original_height = imagesy($new_image); 
								$miniature_height = ($original_height * $config_miniature_width / $original_width);

								$miniature = imagecreatetruecolor($config_miniature_width, $miniature_height);

								imagecopyresampled($miniature, $new_image, 0, 0, 0, 0, $config_miniature_width, $miniature_height, $original_width, $original_height);

								$folder = './avatar/miniature/';
								if($extension === 'jpg' || $extension === 'jpeg'){
									imagejpeg($miniature, $folder . $image_name . '.' . $extension);
								}elseif($extension === 'png'){
									imagepng($miniature, $folder . $image_name . '.' . $extension);
								}elseif($extension === 'gif'){
									imagegif($miniature, $folder . $image_name . '.' . $extension);
								}

								move_uploaded_file($_FILES['avatar']['tmp_name'], './avatar/' . $image_name . '.' . $extension);


								$connexion = dbConnect();

								$request = $connexion->prepare('
													INSERT INTO blog_user (u_email, u_password, u_name, u_surname, u_avatar)
													VALUES(:email, :password, :name, :surname, :avatar)
													');
								$request->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
								$request->bindValue(':password', $passHash, PDO::PARAM_STR);
								$request->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
								$request->bindValue(':surname', $_POST['surname'], PDO::PARAM_STR);
								$request->bindValue(':avatar', $image_name . '.' . $extension, PDO::PARAM_STR);

								$request->execute();

								$_SESSION['email'] = $_POST['email']; //création session

								header('Location: index.php?id=5&message=2');

						}else{
		
							header('Location: index.php?id=5&message=1');
						}

				}else{
					header('Location: index.php?id=5&message=1');
				}

			}else{
				header('Location: index.php?id=5&message=1');
			}	
		}else{
			header('Location: index.php?id=5&message=1');
		}	
	}
}	