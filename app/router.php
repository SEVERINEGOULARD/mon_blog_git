<?php //contenu principal de la page affichée
require 'includes.php';


if(isset($_GET['id']) && array_key_exists ($_GET['id'], $arr_content)){
	if($_GET['id']<100) {
		$dir = './view/';
	} else {
		$dir = './app/';
	}

	require $dir . $arr_content[$_GET['id']] . '.php';
}else{
	require './view/' . $arr_content[1] . '.php';
}
//arr_content = tableau des titres des pages

