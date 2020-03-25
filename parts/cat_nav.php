<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <a class="nav-link 
    <?php if(!isset($_GET["id"])) {?> active <?php } ?>" href="/">Все</a> <!-- пример php внутри HTML -->
        <?php
            //достать все из таблицы "products"
            $sql = "SELECT * FROM categories";
            // приконектить полученные данные
            $result = $conn->query($sql);
            
            while ($row = mysqli_fetch_assoc($result)) {  
                // активная вкладка, если существует GET и он равен row id 
                if(isset($_GET["id"]) && $_GET["id"] == $row['id']) {   
                echo "<a class='nav-link active' href='/cat.php?id=" . $row['id'] . "'>" . $row['title'] . "</a>";            
            } else {
                echo "<a class='nav-link' href='/cat.php?id=" . $row['id'] . "'>" . $row['title'] . "</a>";
                }
            };
        ?>
</div>