<?php include "dbhelper.php";
$row = rowcount("post");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yangiliklar.uz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Yangiliklar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
      </div>
      </nav><br>
      <?php $postq = getPostList($row, $withoutlimit = true);
      ?>

      <?php foreach ($postq as $post) { ?>
      
      <div class="card">
        <div class="card-header form-text text-secondary">Date: <?= $post['created_at'] ?> <br> Author: <?= getAuthorbyID($post['author_id'])["firstname"]." ".getAuthorbyID($post['author_id'])["lastname"] ?> </div>
        <div class="card-body">
        <p><a href='/post_detail.php?id=<?= $post["id"] ?>' class="link-underline-light"><?= $post["title"] ?></a></p>
        <p><?= $post["content"] ?></p>  
        <a href='/post_detail.php?id=<?= $post["id"] ?>' class="btn btn-primary">Batafsil</a>
        </div>
      </div><br>

      <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>