<?php

namespace Src\Models;

use PDO;
use Src\Core\DatabaseConnection;

class Article
{
    private $databaseConnection;

    public function __construct()
    {
        $database = new DatabaseConnection();
        $this->databaseConnection = $database->getNewConnection();
    }

    public function getAllArticles()
    {
        $query = 'SELECT * from articles WHERE status="active" Order By updated_at DESC';
        $stmt = $this->databaseConnection->prepare($query);
        $stmt->execute();
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }

    public function getArticleById(int $id)
    {
        $query = "SELECT * from articles where id = ? ";
        $stmt = $this->databaseConnection->prepare($query);
        $stmt->execute([$id]);
        $article =  $stmt->fetch(PDO::FETCH_ASSOC);

        if ($article) {
            return $article;
        }

        return header('Location: /articles');
    }

    public function storeArticle(string $title, string $description, string $status)
    {
        $query = "INSERT INTO articles VALUES (
            null, :title, :description, :status, default, default
        )";

        $stmt = $this->databaseConnection->prepare($query);
        $stmt->execute(
            [
                ':title' => $title,
                ':description' => $description,
                ':status' => $status,
            ]
        );
    }

    public function updateArticle(string $title, string $description, string $status, int $id)
    {
        $query = "UPDATE articles SET
            updated_at=default,
            title = :title,
            description = :description,
            status = :status
        WHERE id = :id";

        $stmt = $this->databaseConnection->prepare($query);
        $stmt->execute(
            [
                ':title'       => $title,
                ':description' => $description,
                ':status'      => $status,
                ':id'          => $id,
            ]
        );
    }

    public function deleteArticle(int $id)
    {
        $query = 'DELETE from articles where id = ? ';
        $stmt = $this->databaseConnection->prepare($query);
        $stmt->execute([$id]);
    }
}
