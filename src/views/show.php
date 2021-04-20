<?php

use Src\Core\Helpers;

require_once "layouts/app.php"; ?>

<div class="container shadow-sm col-10 offeset-1">
    <h1 class="text-center py-3 my-3"><?= Helpers::escape($article['title']) ?></h1>
    <div class="d-flex justify-content-end"><small><?= $article['updated_at'] ?></small></div>
</div>

<div class="container shadow-sm col-10 offeset-1 mb-3 py-1">

    <div class="d-flex justify-content-end">
        <form action="/articles/update/<?= $article['id'] ?>" method="POST">
            <button type="submit" class="btn btn-secondary btn-sm m-1">Edytuj</button>
        </form>

        <form action="/articles/delete/<?= $article['id'] ?>" method="POST">
            <button type="submit" class="btn btn-danger btn-sm m-1">Usuń</button>
        </form>
    </div>

    <img class="img-fluid mx-auto d-block py-1" src="https://picsum.photos/500">
    <p class="text-center m-3"><?= Helpers::escape($article['description']) ?></p>
    
</div>

</main>
</body>

</html>