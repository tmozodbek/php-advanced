<div class="container">
    <?php
    include "header.php";
    include "../dbhelper.php";
    echo "Haqiqatdan ham o'chirmoqchimsiz? <br>";
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $category_value = getValueCategory($id);
    }

    if(isset($_GET['confirm']) && $_GET['confirm'] === "yes"){
        deleteCategory($id);
        header("Location: /admin/category.php");
    }else if(isset($_GET['confirm']) && $_GET['confirm'] === "no"){
        header("Location: /admin/category.php");
    }

    ?>

    <a href="/admin/delete_category.php?id=<?= $id ?>&confirm=yes" class="btn btn-danger">Yes</a>
    <a href="/admin/delete_category.php?id=<?= $id ?>&confirm=no" class="btn btn-primary">No</a>
</div>