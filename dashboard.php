<?php include 'includes/header.php'; ?>
<style>
/* ---------- Hero Section ---------- */
.hero-section {
  margin-top: 90px;
}

.carousel-item img {
  height: 480px;
  object-fit: cover;
  object-position: center;
  filter: brightness(100%);
}

.carousel-caption {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  text-align: center;
}

.carousel-caption h1 {
  font-size: 2.8rem;
  font-weight: 700;
  color: #fff;
}

.carousel-caption p {
  font-size: 1.1rem;
  color: #f8f9fa;
  margin: 15px 0 25px 0;
}

.carousel-caption .btn-hero {
  background: linear-gradient(45deg, #ff416c, #ff4b2b);
  border: none;
  padding: 12px 30px;
  color: white;
  font-weight: 500;
  border-radius: 30px;
  transition: all 0.3s ease;
}

.carousel-caption .btn-hero:hover {
  transform: translateY(-3px);
  background: linear-gradient(45deg, #ff4b2b, #ff416c);
}

/* ---------- Product Section ---------- */
.wrapper {
  margin-top: 60px !important;
  margin-bottom: 60px !important;
}

.card-custom {
  margin-top: 30px !important;
  transition: all 0.3s ease-in-out;
  background-color: #fff;
}

.card-custom:hover {
  transform: translateY(-8px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}

.btn-danger {
  background: linear-gradient(45deg, #ff416c, #ff4b2b);
  border: none;
}

.btn-danger:hover {
  background: linear-gradient(45deg, #ff4b2b, #ff416c);
}

.card-title {
  font-size: 1.1rem;
}
</style>

<?php
// ---------- Welcome Message ----------
if (isset($_SESSION['user']['name'])) {
  echo "
  <div class='col-lg-6 offset-lg-3 alert alert-success alert-dismissible fade show fixed-top text-center' style='margin-top: 100px;' data-aos='fade-down' role='alert'>
    <p><strong style='font-size: 20px; margin-left:50px;'>Welcome {$_SESSION['user']['name']} 🎉👋✨</strong><br><span>✨ Explore the latest Apple and Samsung products with authentic quality. ✨</span></p>
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";
}
?>

<!-- ---------- HERO SECTION (Auto Image Slider) ---------- -->
<section class="hero-section">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="1500">
    <div class="carousel-inner">

      <!-- Image 1 -->
      <div class="carousel-item active">
        <img src="assests/17 pro max.jpg" class="d-block w-100" alt="Apple iPhone">
        <div class="carousel-caption">
          <h1>Discover Premium Smartphones</h1>
          <p>Experience innovation with the latest Apple & Samsung phones.</p>
          <a href="#products" class="btn btn-hero">Shop Now</a>
        </div>
      </div>

      <!-- Image 2 -->
      <div class="carousel-item">
        <img src="assests/ipad.jpg" class="d-block w-100" alt="Samsung Galaxy">
        <div class="carousel-caption">
          <h1>Power Meets Elegance</h1>
          <p>Explore Samsung Galaxy series crafted for brilliance.</p>
          <a href="#products" class="btn btn-hero">Explore</a>
        </div>
      </div>

      <!-- Image 3 -->
      <div class="carousel-item">
        <img src="assests/s21.jpg" class="d-block w-100" alt="iPhone Collection">
        <div class="carousel-caption">
          <h1>Style, Speed & Power</h1>
          <p>Get your dream iPhone or Galaxy today.</p>
          <a href="#products" class="btn btn-hero">View Products</a>
        </div>
      </div>

    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>

<!-- ---------- PRODUCT SECTION ---------- -->
<section id="products">
<?php
include 'admin/connection.php';
$sql = "SELECT * FROM product WHERE status='active'";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
  echo "<div class='container'><div class='row g-3 wrapper'>";

  while ($row = mysqli_fetch_assoc($query)) {
    $imgPath = !empty($row['image']) ? "/project/assests/{$row['image']}" : "../assests/image.png";

    echo "
    <div class='col-md-4 col-sm-6 col-12 '>
      <div class='card shadow-lg border-0 rounded-4 overflow-hidden card-custom h-100 mt-5  ' data-aos='fade-up'>
        <div class='position-relative'>
          <img src='{$imgPath}' class='card-img-top' alt='{$row['name']}' style='height:220px; object-fit:cover;'>
          <button class='btn btn-light position-absolute top-0 end-0 m-2 rounded-circle shadow-sm'>
            <i class='fa-solid fa-heart text-danger'></i>
          </button>
        </div>
        <div class='card-body d-flex flex-column justify-content-between'>
          <div>
            <h5 class='card-title fw-bold text-dark mb-2'>{$row['name']}</h5>
            <p class='card-text text-muted small mb-2'>{$row['description']}</p>
          </div>
          <div>
            <p class='mb-1'>
              <span class='fw-semibold text-danger fs-5'>₹{$row['price']}</span>
            </p>
            <p class='mb-1 text-secondary small'>
              <strong>Vendor:</strong> {$row['added_by']}
            </p>
            <p class='mb-3 text-secondary small'>
              <strong>Category:</strong> {$row['category_name']}
            </p>
            <a href='#' class='btn btn-danger w-100 rounded-3'>Buy Now</a>
          </div>
        </div>
      </div>
    </div>";
  }

  echo "</div></div>";
} else {
  echo "<p class='text-center my-5'>No Product Available Now!</p>";
}
?>
</section>

<?php include 'includes/footer.php'; ?>
