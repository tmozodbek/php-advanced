<?php
include "header.php";
include "../dbhelper.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tag_value = getValueTag($id);
}

if(isset($_POST['update_tag'])){
    $title = $_POST['title'];
    UpdateTag($id, $title);
    header("Location: /admin/tag.php");
    exit;
} 

?>
<div class="container">
    <form method="post">
        <div class="input">
            <label for="update_tag" class="col-sm-2 col-form-label">Tagni tahrirlash</label>
            <input type="text" class="form-control" id="update_tag" name="title" value="<?=$tag_value['name']?>">
        </div>
        <button type="submit" class="btn btn-primary" name = "update_tag" style="margin-top: 10px;">Update</button>
    </form>
</div>