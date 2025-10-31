<?php

// echo $_GET['id'];
// exit;

include '../includes/header.php';
include 'connection.php';

$sql="SELECT * FROM product where id ='{$_GET['id']}'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($query);



?>

<div class="col-lg-6  col-md-8 col-sm-8 offset-md-2  offset-lg-3 mt-5">
<div class="card">
  <div class="card-header text-center">
   Edit Product
  </div>
  <div class="card-body">
  <form action="EditProductHandle.php" enctype="multipart/form-data" method="post">
  <input type="text" name="id"  hidden value="<?= $row['id'] ?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="category-name" aria-describedby="emailHelp" name="name" value="<?= $row['name'] ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <textarea  type="text" class="form-control"  aria-describedby="emailHelp" name="msg"><?= $row['description'] ?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="text" class="form-control" id="category-name" aria-describedby="emailHelp" name="price" value="<?= $row['price'] ?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">image</label>
    <input type="file" class="form-control"  aria-describedby="emailHelp" name="img" >
  </div>

  <button type="submit"  class="btn btn-primary d-block px-4  mx-auto">Edit Product</button>
</form>

</div>
</div>


<?php include '../includes/footer.php'; ?>