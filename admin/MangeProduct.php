
<?php


include '../includes/header.php'; ?>

<?php

include 'connection.php';
$sql = "SELECT * FROM product";
$query = mysqli_query($conn, $sql);

?>


<div class="row" data-aos="fade-up">
    <div class="col-lg-10 offset-lg-1">
        <h2 class="text-center" style="margin-top: 150px;">Product Table</h2>
        <table class="table table-bordered table-hover table-striped  text-center  mb-5">
            <thead class="text-right table">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th><a class="btn btn-success" href="/project/admin/AddProduct.php">Add Product</a></th>
            </thead>
         
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>image</th>
                <th>price</th>
                <th  >description</th>
                <th style="width: 200px;">category name</th>
                <th>status</th>
                <th>created by</th>
                <th style="width: 200px;" >Action</th>
            </tr>


            <?php
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td><img src='../assests/{$row['image']}' alt='icon' style='width:50px; height:50px; object-fit:contain;'></td>
        <td>{$row['price']}</td>
        <td>{$row['description']}</td>
        <td>{$row['category_name']}</td>
        <td>{$row['status']}</td>
        <td >{$row['added_by']}</td>";

                $admin = ($_SESSION['user']['email'] == "admin@gmail.com");

                if ($admin ) {
                    echo "<td style='width:250px; !important'><a class='btn btn-success' href='EditProduct.php?id={$row['id']}'>Edit</a> <a  class='btn btn-warning text-white' href='DismissProduct.php?id={$row['id']}'>Dismiss</a>
                    <a  class='btn btn-danger' href='DeleteProduct.php?id={$row['id']}'>Delete</a></td> ";
                    ;
                } else {
                    echo "<td>Can't perform any operation </td>";
                }


                echo "</tr>";
            }
            ?>


        </table>
    </div>
</div>





<?php include '../includes/footer.php'; ?>