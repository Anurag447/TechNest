<?php include 'includes/header.php' ?>


<div class="col-lg-6  col-md-8 col-sm-8 offset-md-2  offset-lg-3 " style="margin-top: 200px; margin-bottom:100px;">
<div class="card" data-aos="fade-up">
  <div class="card-header text-center">
   Register
  </div>
  <div class="card-body">
  <form>
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" placeholder="Enter Your Name">
  </div>
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Enter Your Email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
  </div>
  <button type="submit" id="submit" class="btn btn-primary d-block px-4  mx-auto">Register</button>
</form>
<a href="login.php" class="text-decoration-none text-dark">already register? Login </a> Now
  </div>
</div>
</div>



<?php include 'includes/footer.php' ?>