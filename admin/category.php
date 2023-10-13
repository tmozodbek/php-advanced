<?php 
include "header.php";
include "../dbhelper.php";

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
?>

<div class="container">
    <a href="/admin/add_category.php" class="btn btn-success">Qo'shish</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Kategoriya nomi</th>
                <th scope="col">#</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                foreach (getCategoryList($page) as $item) {
                    echo "<tr>";
                        echo "<td>" . $item["id"] . "</td>";
                        echo "<td>" . $item["title"] . "</td>";
                        echo '<td>'. "<a href='/admin/update_category.php?id=". $item['id'] ."' class='btn btn-primary'>Update</a> "  . 
                        "<a href='/admin/delete_category.php?id=". $item['id'] ."' class='btn btn-danger'>Delete</a>".'</td>';
                    echo "</tr>";
                } 
            
            ?>
    </tbody>
 </table>

 <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only"></span>
      </a>
    </li>
    <?php for ($i = 1; $i <= rowcount("category"); $i++) { ?>
        <li class="page-item"><a class="page-link" href="/admin/category.php?page=<?= $i ?>"><?= $i ?></a></li>
    <?php } ?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only"></span>
      </a>
    </li>
  </ul>
</nav>

</div>