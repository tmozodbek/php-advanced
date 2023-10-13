<?php
include "header.php";
include "../dbhelper.php";

if(isset($_POST['add_tag'])){
    $title = $_POST['title'];
    addTag($title);
    header("Location: /admin/tag.php");exit;
}

?>
<div class="container">
    <h2>Tag qo'shish</h2>
    <form method="post">
        <div class="input">
            <label for="add_tag" class="col-sm-2 col-form-label">Name</label>
            <input type="text" class="form-control" id="add_tag" name="title">
        </div>
        <button type="submit" class="btn btn-primary" name = "add_tag" style="margin-top: 10px;">Qo'shish</button>
    </form>
</div>