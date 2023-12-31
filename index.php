<?php require 'dbconnect.php';
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>HOME | Vanilla</title>
  <link rel="stylesheet" href="style.css">
  <link rel="shortcut icon" href="./img/clogo.png"  type="image/x-icon">
</head>

<body>
  <!-- header -->
  <div class="navv sticky-top " style="position: sticky">
  <?php require'navbar.php'?>
  </div>
  
  <div class="sale mt-3">
  <img name="main-banner" src="./img/hurryup.webp" alt="asd" style="position: relative; width: 100%;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
  </div>

<!-- slider -->
  <div id="carouselExampleIndicators" class="carousel slide mt-3" data-bs-ride="carousel">
    <div class="carousel-indicators ">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./img/vk.webp" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img src="./img/slide2.webp" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img src="./img/slide3.webp" class="d-block w-100" alt="..." />
      </div>
      <div class="carousel-item">
        <img src="./img/slide4.webp" class="d-block w-100" alt="..." />
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
      <span class="visually-hidden ">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  

  <div class="container"> </div>
  <!-- brans section -->
  <div class="brands">

    <h2 class="m-4 me-2 text-center"><b>GRAND GLOBAL BRANDS</b></h2>
  </div>

  <div class="row m-1 mb-4">
    <div class="col">
      <div class="card" style="width: 300px;">
        <img src="./img/puma.webp" class="card-img-top" alt="..." />
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 300px;">
        <img src="./img/nike.webp" class="card-img-top" alt="..." />
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 300px;">
        <img src="./img/tommy.jpg" class="card-img-top" alt="..." />
      </div>
    </div>

    <div class="col">
      <div class="card" style="width: 300px;">
        <img src="./img/jack.webp" class="card-img-top" alt="..." />
      </div>
    </div>
  </div>

  <div class="img mt-3">
  <img name="main-banner"  src="./img/festive.gif" alt="1" style="position: relative; width: 100%; box-shadow: rgba(0, 0, 0, 0.35) 0px 10px 15px;">
  </div>

  <!-- trendings -->
  <div class="new mt-3 trendings"id="trendings">
  <!-- <img name="main-banner" src="./img/newstyle.png" alt="1" style="position: relative; width: 100%;"> -->
  <img name="main-banner" src="./img/trending.png" alt="1" style="position: relative; width: 100%;">
  </div>
  <section class="section1 mt-3 " id="trendingcard" style="background-color: #ffffff;">

    <div class="container py-5 d-flex flex-wrap">
      <div class="row">
        <?php

        // Search query
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        // Query to include the search filter
        $sql = "SELECT * FROM cards WHERE title LIKE '%$search%'";
        $sql = "SELECT * FROM cards LIMIT 8";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

          while ($row = $result->fetch_assoc()) {
        ?>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-5 mt-3">
              <div class="card trends" id="card">
                <img src="images/<?php echo $row['img']; ?>" class="card-img-top" alt="error" />
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <p class="medium"><b><a href="#!" class="text-muted" id="tr"><?php echo $row['title']; ?></a></b></p>
                    <p class="small"><?php echo 'Rs ' . $row['price']; ?></p>
                    <!-- <p class="small"><?php echo 'Pid ' . $row['pid']; ?></p> -->
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <!-- Inside the foreach loop for displaying products -->
                    <!-- <a href="cart.php" class="btn btn-dark buy-now">
                      <span>Buy Now</span>
                    </a> -->

                      <a href="product.php?product_id=<?php echo $row['pid']; ?>" class="btn btn-dark buy-now" id="tr">See more</a>
                     <form method="POST" action="add_to_cart.php?product_id=<?php echo $productID; ?>">
                        <input type="hidden" name="product_id" value=" <?php echo $product_id; ?>">
                          <input type="hidden" name="product_name" value="<?php echo $product['title']; ?>">
                          <input type="hidden" name="description" value="<?php echo $product['descr']; ?>">
                          <input type="hidden" name="quantity" value="1">
                          <input type="hidden" name="category" value="<?php echo $product['category']; ?>">
                          <input type="hidden" name="size" value="Small"> <!-- Set the default size as needed -->
                          <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                          <!-- Add the 'img' input field here -->
                          <input type="hidden" name="img" value="<?php echo $product['img']; ?>">
                          <!-- <button type="submit"  class="btn btn-dark btn-block mt-1"  name="addtocart">Add to Cart</button> -->
                        </form>
                    <div class="icon">
                      <!-- <i class="fas fa-shopping-cart m-1 "><a href="./card.php"><img src="./img/cart.png" alt="" style="width:1rem;"></i></a> Shopping cart icon -->
                      <i class="far m-1"><img src="./img/heart.png" alt="" style="width:1rem;"></i> <!-- Like icon -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo "No item found.";
        }
        ?>

      </div>
    </div>
  </section>




  <!-- Footer -->
  <?php require'footer.php';?>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




  <script>
    document.getElementById('search-form').addEventListener('submit', function(e) {
      e.preventDefault(); // Prevent form submission
      const searchValue = document.getElementById('search-input').value.toUpperCase();
      const cards = document.querySelectorAll('.card.trends');

      cards.forEach(card => {
        const title = card.querySelector('.text-muted').textContent.toUpperCase();
        if (title.includes(searchValue)) {
          card.style.display = ''; // Show the card
        } else {
          card.style.display = 'none'; // Hide the card
        }
      });
    });
  </script>
</body>

</html>
