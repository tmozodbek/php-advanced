<div class="container">
    <?php
    include "header.php";
    include "../dbhelper.php";
    echo "Haqiqatdan ham o'chirmoqchimsiz? <br>";
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $tag_value = getValueTag($id);
    }

    if(isset($_GET['confirm']) && $_GET['confirm'] === "yes"){
        deleteTag($id);
        header("Location: /admin/tag.php");
    }else if(isset($_GET['confirm']) && $_GET['confirm'] === "no"){
        header("Location: /admin/tag.php");
    }

    ?>

    <a href="/admin/delete_tag.php?id=<?= $id ?>&confirm=yes" class="btn btn-danger">Yes</a>
    <a href="/admin/delete_tag.php?id=<?= $id ?>&confirm=no" class="btn btn-primary">No</a>
</div>