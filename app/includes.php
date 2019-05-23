<?php

require_once 'bdd.php';
require_once 'toolbox.inc.php';

//on envoie vers l'index un tableau des titres des pages : accessible par tout le monde car dans l'index

/**
 * Views 
 */

$arr_content[1]='home';
$arr_content[2]='randonnees';
$arr_content[3]='trail';
$arr_content[4]='vtt';
$arr_content[5]='inscription';
$arr_content[6]='contact';
$arr_content[7]='article';
$arr_content[8]='connexion';


/**
 * Treatments
 */

$arr_content[100]='inscription';
$arr_content[101]='article';
$arr_content[102]='connexion';

/**
 * Messages
 */

$arr_message[1]='Erreur connexion.';
$arr_message[2]='Vous êtes inscrit.';


//ces infos sont envoyées ensuite au routeur