<?php

use Src\Core\Helpers;

require_once "layouts/app.php";

?>

<div class="container shadow-sm col-10 offeset-1">
  <h1 class="text-center py-3 my-3">Tworzenie Artykułu</h1>
</div>

<div class="container shadow-sm col-10 offset-1">
  <form action="/articles/store" method="POST">

    <div class="mb-3">
      <label for="title" class="form-label">Tytuł</label>
      <input type="text" class="form-control" id="title" name="title" required>
      <?php if (isset($_SESSION['errors']['title'])) : ?>
        <div><?= Helpers::escape($_SESSION['errors']['title']) ?></div>
      <?php endif ?>

    </div>

    <div class="form-group">
      <label for="description">Treść</label>
      <?php if (isset($_SESSION['errors']['description'])) : ?>
        <div><?= Helpers::escape($_SESSION['errors']['description']) ?></div>
      <?php endif ?>
      <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>

    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" name="status" id="status">
        <option value="active" selected>Aktywny</option>
        <option value="waiting">Oczekujący</option>
        <option value="archived">Zarchiwizowany</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary mb-3">Dodaj</button>
  </form>
</div>
<?php unset($_SESSION['errors']) ?>

</main>
</body>

</html>