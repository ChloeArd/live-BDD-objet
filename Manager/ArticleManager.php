<?php

class ArticleManager {
    private ?PDO $db;

    /**
     * ArticleManager constructor.
     */
    public function __construct() {
        $this->db = DB::getInstance();
    }

    /**
     * Return all Articles.
     */
    public function getArticles(): array {
        $articles = [];
      $stmt = $this->db->prepare("SELECT * FROM article");
      if($stmt->execute()) {
          foreach ($stmt->fetchAll() as $item) {
              // On crée nos objets de type Article.
              //$articles[] = new Article($item['id'], $item['title'], $item['content'], $item['date_add']);
              $article = new Article($item['id']);
              $article->setTitle($item['title'])
                      ->setContent($item['content'])
                      ->setDateAdd($item['date_add'])
                  ;
              $articles[] = $article;
          }
      }
      return $articles;
    }

    /**
     * Update an Article.
     * @param Article $article
     * @return bool
     */
    public function update(Article $article) {
        if ($article->getId()) { // si l'id est null ou pas null
            $stmt = $this->db->prepare("
                UPDATE article SET 
                    title = :title,
                    cotent = :content
                WHERE id = :id
            ");

            $stmt->bindValue(':title', $article->getTitle());
            $stmt->bindValue(':content', $article->getContent());
            $stmt->bindValue(':id', $article->getId());

            return $stmt->execute();
        }
    }
}