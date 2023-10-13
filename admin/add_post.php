<?php
include "header.php";
include "../dbhelper.php";

if(isset($_POST['add_post'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];
    $created_at = $_POST['created_at'];
    $visited_count = $_POST['visited_count'];
    if(isset($_POST['post_tags'])){
        $tags = $_POST['post_tags'];
    }
    addPost($title, $content, $category_id, $author_id, $created_at, $visited_count, $tags);
    header("Location: /admin/news.php");exit;
}


$category_list = getCategoryList(1, true);

$taglist = getTagList(1, true);
?>
<div class="container">
    <h2>Post qo'shish</h2>
    <form method="post">
        <div class="mb-3">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-floating">
            <h6>Content</h6>
            <label for="floatingTextarea" class="form-label"></label>    
            <textarea class="form-control" id="floatingTextarea" name="content" rows="3"></textarea>
            
        </div>

        <div class="mb-3">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <select name="category_id" id="category" class="form-select" aria-label="Default select example">
                <?php foreach ($category_list as $item) {
                    echo "<option value='". $item['id'] ."'>". $item["title"] ."</option>";
                } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="author_add" class="col-sm-2 col-form-label">Author</label>
            <select name="author_id" id="author_add" class="form-select" aria-label="Default select example">
                <?php foreach ($author_list as $item) {
                    echo "<option value='". $item['id'] ."'>". $item["firstname"]. " ". $item["lastname"] ."</option>";
                } ?>
            </select>
            <!--<input type="text" class="form-control" id="author_add" name="author_id">-->
        </div>

        <div class="mb-3">
            <select class="form-select" multiple ari="Multiple select example" name="post_tags[]">
                <?php foreach ($taglist as $item) {
                    echo "<option value='". $item['id'] ."'>". $item["name"] ."</option>";
                } ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" name = "add_post" style="margin-top: 10px;">Qo'shish</button>
    </form>
</div>