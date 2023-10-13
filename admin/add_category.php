<?php
include "header.php";
include "../dbhelper.php";

if(isset($_POST['add_cat'])){
    $title = $_POST['title'];
    addCategory($title);
    header("Location: /admin/category.php");exit;
}

?>
<div class="container">
    <h2>Kategoriya qo'shish</h2>
    <form method="post">
        <div class="input">
            <label for="add_category" class="col-sm-2 col-form-label">Kategoriya qo'shish</label>
            <input type="text" class="form-control" id="add_category" name="title">
        </div>
        <button type="submit" class="btn btn-primary" name = "add_cat" style="margin-top: 10px;">Qo'shish</button>
    </form>
</div>