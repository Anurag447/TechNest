<?php include '../includes/header.php' ?>

<?php 

include 'connection.php';
$sql="SELECT name FROM category where status='Publish'";
$query=mysqli_query($conn,$sql);
?>


<div class="col-lg-6  col-md-8 col-sm-8 offset-md-2  offset-lg-3 mt-5">
<div class="card">
  <div class="card-header text-center">
   Add Product
  </div>
  <div class="card-body">
  <form action="HandleAddProduct.php" enctype="multipart/form-data" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="category-name" aria-describedby="emailHelp" name="name" placeholder="Enter Product  Name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Description</label>
    <textarea  type="text" class="form-control"  aria-describedby="emailHelp" name="msg" placeholder="Enter Product  Description"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Price</label>
    <input type="text" class="form-control" id="category-name" aria-describedby="emailHelp" name="price" placeholder="Enter Product  Price">
  </div>
  <div class="mb-3">
  <label for="exampleInputEmail1" class="form-label">Select a Category</label>
  <div>
  <select name="category" id="fruits" style="width: 100%; height:40px;">
  <option value="">Select a Category</option>
<?php while($row=mysqli_fetch_assoc($query)){ 
    
    echo "<option value='{$row['name']}'>{$row['name']}</option>";

}

    
    ?>

</select>
  </div>
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">image</label>
    <input type="file" class="form-control"  aria-describedby="emailHelp" name="img">
  </div>

  <button type="submit"  class="btn btn-primary d-block px-4  mx-auto">Add Product</button>
</form>

</div>
</div>
</div>

<?php include '../includes/footer.php' ?>