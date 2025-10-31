<style>
    /* .table{
        margin: 100px;
        width: 800px;
    } */
</style>
<?php


include '../includes/header.php'; ?>

<?php

include 'connection.php';
$sql = "SELECT * FROM category";
$query = mysqli_query($conn, $sql);

?>


<div class="row" data-aos="fade-up">
    <div class="col-lg-8 offset-lg-2" style="margin-top: 200px;">
        <table class="table  table-hover table-striped  text-center  mb-5">
            <thead class="text-right table">
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th><a class="btn btn-success" href="/project/admin/AddCategory.php"> Add category</a></th>
            </thead>
            <thead class="text-center table table-success">
                <th></th>
                <th></th>
                <th></th>
                <th style="font-size: 25px; ">Category Table</th>
                <th></th>
                <th></th>
            </thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>icon</th>
                <th>status</th>
                <th>created by</th>
                <th>Action</th>
            </tr>


            <?php



            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td><img src='../assests/{$row['icon']}' alt='icon' style='width:50px; height:50px; object-fit:cover;'></td>
        <td>{$row['status']}</td>
        <td>{$row['added_by']}</td>";

                $admin = ($_SESSION['user']['email'] == "admin@gmail.com");

                if ($admin || $row['added_by'] == $_SESSION['user']['name']) {
                    echo "<td><a class='btn btn-success' href='EditCategory.php?id={$row['id']}'>Edit</a> <a  class='btn btn-danger' href='DismissCategory.php?id={$row['id']}'>Delete</a></td> ";
                    ;
                } else {
                    echo "<td>Can't perform </td>";
                }


                echo "</tr>";
            }
            ?>


        </table>
    </div>
</div>





<?php include '../includes/footer.php'; ?>