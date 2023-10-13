<?php
include "header.php";
include "../dbhelper.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $category_value = getValueCategory($id);
}

if(isset($_POST['update_cat'])){
    $title = $_POST['title'];
    UpdateCategory($id, $title);
    header("Location: /admin/category.php");
    exit;
} 

?>
<div class="container">
    <form method="post">
        <div class="input">
            <label for="update_category" class="col-sm-2 col-form-label">Kategoriyani tahrirlash</label>
            <input type="text" class="form-control" id="update_category" name="title" value="<?=$category_value['title']?>">
        </div>
        <button type="submit" class="btn btn-primary" name = "update_cat" style="margin-top: 10px;">Update</button>
    </form>
</div>