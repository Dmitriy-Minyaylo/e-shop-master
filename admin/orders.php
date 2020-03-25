<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "orders";

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
                            <li class="breadcrumb-item" aria-current="page">Orders</a></li>
                        </ol>
                    </nav>
                        <h4 class="card-title">Orders</h4>
                    </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>#</th>
                            <th>#Users</th>
                            <th>Username</th>
                            <th>Products</th>
                            <th>Telephone</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Options</th>
                        </thead>
                        <tbody>
                            <?php
                                //достать все из таблицы "zakaz"
                                $sql = "SELECT * FROM telezhka";
                                // приконектить полученные данные
                                $result = $conn->query($sql);
                                while ($row = mysqli_fetch_assoc($result)) {  
        
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['user_id'] ?></td>
                                            <td><?php echo $row['name_user'] ?></td>
                                            <td><?php echo $row['products'] ?></td>
                                            <td><?php echo $row['telephone'] ?></td>
                                            <td><?php echo $row['data_create'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                            <!-- выбор статуса товара -->
                                            <td>
                                            <form method="POST">
                                                <div class="form-group">
                                                    <input type="text"  name="status" class="form-control" id="exampleFormControlInput1" placeholder="Отправлено">
                                                    <button name ="submit" type="submit" class="btn btn-sm btn-outline-success">Ок</button>
                                                </div>
                                            </form>
                                            
                                            <?php

                                                if (isset($row["id"])) {
                                                // мониторим таблицу telezhka
                                                    $sql = "INSERT INTO telezhka (`status`) VALUES ('" . $_POST["status"] . "')";
                                                };
                                            ?>       
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
