<?php


session_start();
// echo $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TechNest</title>
  <link rel="shortcut icon" href="/project/assests/logo.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    .card {
      background: #ffffff;
      border: 1px solid #dcdcdc;
      border-radius: 6px;
      /* thoda sharp look */
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
      padding: 5px;
      transition: all 0.25s ease-in-out;
      cursor: pointer;
      margin-top: 150px !important;
    }

    html {
      scroll-behavior: smooth;
    }

    html,
    body {
      overflow: auto;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);

    }

    .header1 {
      background: #ffffff;
      border: 1px solid #dcdcdc;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
      transition: all 0.25s ease-in-out;
      cursor: pointer;

    }

    .table {
      background: #ffffff;
      border: 1px solid #dcdcdc;
      border-radius: 6px;
      /* thoda sharp look */
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg  text-dark header1 fixed-top" style="background: linear-gradient(90deg, #f8f9fa 0%, #f1f1f1 100%); border-bottom: 1px solid #ddd;"
  >
    <div class="container">
      <a class="navbar-brand" href="/project/dashboard.php" style="font-size: 22px;">
        <img src="/project/assests/logo.png" alt="" height="60px" width="100px" style="border-radius: 50%;"><span style="color: red; font-weight:bolder">T</span>ech<span style="color: red; font-weight:bolder ">N</span>est</a>
      <?php if (!isset($_SESSION['user'])) { ?>
        <a class="nav-link active" style="font-size: 18px;" aria-current="page" href="login.php"><i class="fa-solid fa-id-card" style="color: red;"></i> Login</a>
      <?php } else { ?>
        <div class="d-flex gap-3" style="font-size: 18px;">
          <a class="nav-link active" aria-current="page" href="/project/admin/MangeCategory.php"><i class="fa-solid fa-layer-group" style="color: red;"></i> manage category</a>
          <a class="nav-link active" aria-current="page" href="/project/admin/MangeProduct.php"><i class="fa-solid fa-box" style="color: red;"></i> manage product</a>
          <a class="nav-link active logout" style="margin-left: 20px;" aria-current="page" href="/project/admin/logout.php"><i class="fa-solid fa-user" style="color: red;"> </i><?php echo $_SESSION['user']['name'] ?> <i class="fa-solid fa-right-from-bracket" style="color: red;"></i></a>
        </div>
      <?php } ?>

    </div>
  </nav>