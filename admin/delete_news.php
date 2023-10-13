<div class="container">
    <?php
    include "header.php";
    include "../dbhelper.php";
    echo "Haqiqatdan ham ushbu postni o'chirmoqchimsiz? <br>";
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $post_value = getValuePost($id);
    }

    if(isset($_GET['confirm']) && $_GET['confirm'] === "yes"){
        deletePost($id);
        header("Location: /admin/news.php");
    }else if(isset($_GET['confirm']) && $_GET['confirm'] === "no"){
        header("Location: /admin/news.php");
    }

    ?>

    <a href="/admin/delete_news.php?id=<?= $id ?>&confirm=yes" class="btn btn-danger">Yes</a>
    <a href="/admin/delete_news.php?id=<?= $id ?>&confirm=no" class="btn btn-primary">No</a>
</div>