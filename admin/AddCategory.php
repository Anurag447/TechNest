<?php include '../includes/header.php' ?>


<div class="col-lg-6  col-md-8 col-sm-8 offset-md-2  offset-lg-3 mt-5">
<div class="card">
  <div class="card-header text-center">
   Add Category
  </div>
  <div class="card-body">
  <form action="HandleAddCateogory.php" enctype="multipart/form-data" method="post">
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="category-name" aria-describedby="emailHelp" name="name" placeholder="Enter category  Name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Icon</label>
    <input type="file" class="form-control"  aria-describedby="emailHelp" name="img">
  </div>

  <button type="submit"  class="btn btn-primary d-block px-4  mx-auto">Add Category</button>
</form>

</div>
</div>

</div>


<?php include '../includes/footer.php' ?>