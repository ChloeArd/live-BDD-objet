<?php

require_once "imports.php";

$articleManager = new ArticleManager();
$articles = $articleManager->getArticles();


foreach ($articles as $article) {
    /** @var $article Article */
    echo $article->getTitle();
}

/** @var  $premierArticle Article */
$premierArticle = $articles[0];
$premierArticle->setTitle('Mon nouveau titre');
$premierArticle->setContent('Mon nouveau contenu');
$articleManager->update($premierArticle);

