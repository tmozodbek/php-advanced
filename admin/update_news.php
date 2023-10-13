<?php
include "header.php";
include "../dbhelper.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post_value = getValuePost($id);
}

if(isset($_POST['update_post'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category_id'];
    $author = $_POST['author'];
    UpdatePost($id, $title, $content, $category, $author);
    header("Location: /admin/news.php");
    exit;
} 
$category_list = getCategoryList(1, true);
$selected = getValueCategory($post_value['category_id']);
?>
<div class="container">
    <form method="post">
        <h2>Postni tahrirlash</h2>
        <div class="mb-3">
            <label for="title_update" class="col-sm-2 col-form-label">Title</label>
            <input type="text" class="form-control" id="title_update" name="title" value="<?=$post_value['title']?>">
        </div>

        <div class="mb-3">
            <label for="content_update" class="col-sm-2 col-form-label">Content</label>
            <input type="text" class="form-control" id="content_update" name="content" value="<?=$post_value['content']?>">
        </div>

        <div class="mb-3">
        <label for="category" class="col-sm-2 col-form-label">Category</label>
            <select name="category_id" id="category" class="form-select" aria-label="Default select example">
                    <?php foreach ($category_list as $item) {
                        if($item['id'] === $post_value['category_id']){
                            echo "<option value='". $item['id'] ."' selected>". $item["title"] ."</option>";
                        }else{
                            echo "<option value='". $item['id'] ."'>". $item["title"] ."</option>";   
                        }
                    } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="author_update" class="col-sm-2 col-form-label">Author</label>
            <input type="text" class="form-control" id="author_update" name="author" value="<?=$post_value['author_id']?>">
        </div>

        <button type="submit" class="btn btn-primary" name = "update_post" style="margin-top: 10px;">Update</button>
    </form>
</div>