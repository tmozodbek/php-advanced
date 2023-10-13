<?php

include "constants.php";

# -------------------------------Categoryaga oid funksiyalar--------------------------------------
function getCategoryList($page, $withoutlimit = false){
    include "dbconnect.php";
    $offset = ($page - 1) * LIMIT;
    if($withoutlimit){
        $sql = "SELECT * FROM category";
        $state = $conn->prepare($sql);
    }else{
        $sql = "SELECT * FROM category LIMIT :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindValue(":limit", LIMIT, PDO::PARAM_INT);
        $state->bindValue(":offset", $offset, PDO::PARAM_INT);
    }
    
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function addCategory($title){
    include "dbconnect.php";
    $sql_insert = "INSERT INTO category (title) VALUES(:title)";
    $state = $conn->prepare($sql_insert);
    
    $state->bindValue(":title",$title);

    $state->execute();
}

function rowcount($table){
    include "dbconnect.php";
    $sql = "SELECT * FROM ". $table;
    $state = $conn->prepare($sql);
    $state->execute();
    $total_rows = $state -> rowCount();
    return ceil($total_rows / LIMIT);
}

function getValueCategory($id){
    include "dbconnect.php";
    $sql = "SELECT * FROM category WHERE id=:id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function UpdateCategory($id, $title){
    include "dbconnect.php";
    $sql = "UPDATE category SET title = :title WHERE id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->bindValue(":title", $title);
    $state->execute();
}

function deleteCategory($id){
    include "dbconnect.php";
    $sql = "DELETE FROM category WHERE id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
}

#------------------------------ Post ga aloqador funksiyalar --------------------------------
function getPostList($page, $withoutlimit = false){
    include "dbconnect.php";
    $offset = ($page - 1) * LIMIT;
    if($withoutlimit){
        $sql = "SELECT * FROM post";
        $state = $conn->prepare($sql);
    }else{
        $sql = "SELECT * FROM post LIMIT :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindValue(":limit", LIMIT, PDO::PARAM_INT);
        $state->bindValue(":offset", $offset, PDO::PARAM_INT);
    }
    
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function addPost($title, $content, $category_id, $author_id, $created_at, $visited_count, $tags = null){
    include "dbconnect.php";
    $sql_insert = "INSERT INTO post (title, content, category_id, author_id, visited_count, created_at) 
    VALUES(:title, :content, :category_id, :author_id, :visited_count, :created_at)";
    $state = $conn->prepare($sql_insert);
    
    $state->bindValue(":title", $title);
    $state->bindValue(":content", $content);
    $state->bindValue(":category_id", $category_id);
    $state->bindValue(":author_id", $author_id);
    $state->bindValue(":visited_count", 0);
    $state->bindValue(":created_at", date("Y:m:d H:i:s"));
    $state->execute();
    
    $post_id = $conn->lastInsertId();
    $sql_post_tag = "INSERT INTO post_tag (post_id, tag_id) VALUES(:post_id, :tag_id)";
    if($tags != null){
        foreach ($tags as $tag) {
            $state_tag = $conn->prepare($sql_post_tag);
            $state_tag->bindValue(":post_id", $post_id, PDO::PARAM_INT);
            $state_tag->bindValue(":tag_id", $tag, PDO::PARAM_INT);
            $state_tag->execute();
        }
        
    }
}

function getAuthorbyID($id){
    include "dbconnect.php";
    $sql = "SELECT * FROM user WHERE id=:id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function getValuePost($id){
    include "dbconnect.php";
    $sql = "SELECT * FROM post WHERE id=:id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function UpdatePost($id, $title, $content, $category, $author){
    include "dbconnect.php";
    $sql = "UPDATE post SET title = :title, content = :content, category_id = :category_id, author_id = :author_id,
     updated_at = :updated_at, visited_count = :visited_count  
     WHERE id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->bindValue(":title", $title);
    $state->bindValue(":content", $content);
    $state->bindValue(":category_id", $category);
    $state->bindValue(":author_id", $author);
    $state->bindValue(":updated_at", date("Y:m:d H:i:s"));
    $state->bindValue(":visited_count", 0);
    
    $state->execute();
}

function deletePost($id){
    include "dbconnect.php";
    $sql = "DELETE FROM post WHERE id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
}

#-------------------------Tagga oid funksiyalar-------------------------
function getTagList($page, $withoutlimit = false){
    include "dbconnect.php";
    $offset = ($page - 1) * LIMIT;
    if($withoutlimit){
        $sql = "SELECT * FROM tag";
        $state = $conn->prepare($sql);
    }else{
        $sql = "SELECT * FROM tag LIMIT :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindValue(":limit", LIMIT, PDO::PARAM_INT);
        $state->bindValue(":offset", $offset, PDO::PARAM_INT);
    }
    
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function addTag($title){
    include "dbconnect.php";
    $sql_insert = "INSERT INTO tag (name) VALUES(:name)";
    $state = $conn->prepare($sql_insert);
    
    $state->bindValue(":name",$title);

    $state->execute();
}

function getValueTag($id){
    include "dbconnect.php";
    $sql = "SELECT * FROM tag WHERE id=:id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function UpdateTag($id, $title){
    include "dbconnect.php";
    $sql = "UPDATE tag SET name = :name WHERE id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->bindValue(":name", $title);
    $state->execute();
}

function deleteTag($id){
    include "dbconnect.php";
    $sql = "DELETE FROM tag WHERE id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
}

#----------------------------Qo'shimcha funksiyalar-----------------------------------------

function getAhuthorList($page, $withoutlimit = false){
    include "dbconnect.php";
    $offset = ($page - 1) * LIMIT;
    if($withoutlimit){
        $sql = "SELECT * FROM user";
        $state = $conn->prepare($sql);
    }else{
        $sql = "SELECT * FROM user LIMIT :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindValue(":limit", LIMIT, PDO::PARAM_INT);
        $state->bindValue(":offset", $offset, PDO::PARAM_INT);
    }
    
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}