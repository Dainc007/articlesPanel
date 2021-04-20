<?php

use Src\Core\Helpers;

require_once "layouts/app.php";
?>

<div class="container shadow-sm col-10 offeset-1">
  <h1 class="text-center py-3 my-3">Edycja Artykułu</h1>
</div>

<div class="container shadow-sm col-10 offset-1">
  <form action="/articles/update/<?= $article['id'] ?>" method="POST">

    <div class="mb-3">
      <label for="title" class="form-label">Tytuł</label>
      <input type="text" class="form-control" id="title"
       name="title" value="<?= Helpers::escape($article['title']) ?>" required>
    </div>

    <div class="form-group">
      <label for="description">Treść</label>
      <input type="text" class="form-control" id="description" name="description"
       value="<?= Helpers::escape($article['description']) ?>"></input>
    </div>

    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" name="status" id="status">
        <option selected value="active">Aktywny</option>
        <option value="waiting">Oczekujący</option>
        <option value="archived">Zarchiwizowany</option>
      </select>
    </div>

    <button type="submit" name="update" class="btn btn-primary mb-3">Edytuj</button>
  </form>
</div>
<?php unset($_SESSION['errors']) ?>

</main>
</body>

</html>