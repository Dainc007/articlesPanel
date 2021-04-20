<?php

use Src\Core\Helpers;

require_once "layouts/app.php";
?>

<div class="container shadow-sm col-10 offeset-1">
    <h2 class="text-center py-3 my-3">Artykuły</h2>
</div>

<?php foreach ($articles as $article): ?>
    <div class="container shadow-sm col-10 offeset-2 mb-3 py-1">
        <h6 class="text-center"><?= Helpers::escape($article['title']) ?></h6>
        <div class="d-flex justify-content-end"><small><?= $article['updated_at'] ?></small></div>
        <a href="/articles/show/<?= $article['id']?>"><img class="img-fluid mx-auto d-block py-3" src="https://picsum.photos/300"></a>
        <p class="text-center mx-3"><?= $article['description'] ?></p>
    </div>
<?php endforeach ?>

</main>
</body>

</html>