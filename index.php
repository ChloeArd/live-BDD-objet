<?php

require_once "imports.php";

$articleManager = new ArticleManager();
$articles = $articleManager->getArticles();


foreach ($articles as $article) {
    /** @var $article Article */
    echo $article->getTitle();
}

/** @var  $premierArticle Article */
//Mise à jour d'un article.
$premierArticle = $articles[0];
$premierArticle->setTitle('Mon nouveau titre');
$premierArticle->setContent('Mon nouveau contenu');
$articleManager->update($premierArticle);

//Ajout d'un nouvel article.
$monArtcile = new Article();
$monArtcile->setTitle("Hello World, new article");
$monArtcile->setContent('Mon nouveau contenu');
$articleManager->insert($monArtcile);
$articleManager->delete($monArtcile);
