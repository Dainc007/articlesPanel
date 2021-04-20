<?php

namespace Src\Controllers;

use Src\Core\View;
use Src\Models\Article;

class ArticleController
{
    public function index()
    {
        $article = new Article();
        $articles = $article->getAllArticles();

        return new View('index.php', ['articles' => $articles]);
    }

    public function create()
    {
        return new View('create.php');
    }

    public function store()
    {
        $errors = [];
        if (mb_strlen($_POST['title']) > 100 ) {
            $errors['title'] = 'Tytuł musi mieścić się w przedziale 1-100 znaków'; 
        }

        if (mb_strlen($_POST['description']) > 1000 ) {
            $errors['description'] = 'Opis moze miec maksymalnie 1000 znaków';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: /articles/create');
            exit;
        }

        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'status' => $_POST['status'],
        ];

        $article = new Article();
        $article->storeArticle(...$data);

        header('Location: ../articles');
        exit();
    }

    public function show(int $id)
    {
        $article = new Article();
        $article = $article->getArticleById($id);
        return new View('show.php', ['article' => $article]);
    }

    public function update(int $id)
    {
        $article = new Article();

        if (!isset($_POST['update'])) {

            $article = $article->getArticleById($id);
            return new View('update.php', ['article' => $article]);
        }

        $errors = [];
        if (mb_strlen($_POST['title']) > 100 ) {
            $errors['title'] = 'Tytuł musi mieścić się w przedziale 1-100 znaków'; 
        }

        if (mb_strlen($_POST['description']) > 1000 ) {
            $errors['description'] = 'Opis moze miec maksymalnie 1000 znaków';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("Location: /articles/update/$id");
            exit;
        }

        $data = [$_POST['title'], $_POST['description'], $_POST['status'], $id];

        $article->updateArticle(...$data);
        header('Location: /articles');
        exit();
    }

    public function delete(int $id)
    {
        $article = new Article();
        $article = $article->deleteArticle($id);

        header('Location: /articles');
        exit();

    }
}
