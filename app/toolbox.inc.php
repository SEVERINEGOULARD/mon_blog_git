<?php
define('MAXARTBYPAGE', 10);

/**
 * Returns a range of recent Articles for the Home page
 *
 * @return Array The Articles from the DB
 */
function home_getArticles(){
    return getArticles(null, 0, 3);
};

/**
 * Returns Articles for a given category page
 *
 * @param int $category_id The given category id to target
 * @param int $num_page The requested page number (for pagination)
 *
 * @return Array The Articles from the DB
 */
function cat_getArticles($category_id, $num_page){
   return getArticles($category_id, ($num_page-1) * MAXARTBYPAGE);
};

/**
 * Retrieves the resquested Articles
 *
 * @param int $category_id The given category id to target
 * @param int $offset An offset for the request
 * @param int $limit A limit for the request
 *
 * @return Array The Articles from the DB
 */
function getArticles($category_id = null, $offset = 0, $limit = MAXARTBYPAGE){
	$connexion = dbConnect();

	$sql = 'SELECT * FROM blog_post';

	if(!is_null($category_id)){
		$sql .= ' WHERE p_fk_category_id=:category_id';
	}

	$sql .= ' ORDER BY p_id DESC';
	$sql .= ' LIMIT '.$limit;
	$sql .= ' OFFSET '.$offset;

	$articles=$connexion->prepare($sql);

	if(!is_null($category_id)){
		$articles->bindValue(':category_id', $category_id);
	}

	$articles->execute();

	$resultatArticles = $articles->fetchAll();
/*
	echo '<pre>';
	print_r($resultatArticles);
	echo '</pre>';
*/
	return $resultatArticles;//pour récup les données et les inclure dans ma fonction home_getArticles
}