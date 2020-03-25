<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "categories";

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories</a></li>
                        
                    </ol>
                </nav>
                    <h4 class="card-title">Categories</h4>
                    <a href="options/categories/cat_add.php" type="button" style="float: left;" class="btn btn-success">Add</a> 
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                            <?php
                                //достать все из таблицы "products"
                                $sql = "SELECT * FROM categories";
                                // приконектить полученные данные
                                $result = $conn->query($sql);
                                while ($row = mysqli_fetch_assoc($result)) {  
        
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['title'] ?></td>
                                            <td><?php echo $row['image'] ?></td>
                                            
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="options/categories/cat_edit.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-warning">Edit</a>
                                                    
                                                    <a href="options/categories/cat_dell.php?id=<?php echo $row['id'] ?>" type="button" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>  
