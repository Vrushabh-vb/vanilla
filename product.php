<?php require 'navbar.php'; ?>


<?php
require 'dbconnect.php';
session_start(); // Start the session

if (isset($_GET['product_id'])) {
  $productID = $_GET['product_id'];
  $userID = $_SESSION['user_id']; // Replace with your actual session variable name


  $sql = "SELECT * FROM cards WHERE pid = $productID";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <title><?php echo $product['title']; ?> Details</title>
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link rel="shortcut icon" href="./img/cart.png" type="image/x-icon">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    </head>

    <body>
      <section class="h-100 h-custom" style="background-color: #0000;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
              <div class="cards card-registration card-registration-2" style="border-radius: 15px;">
                <div class="card-body p-0">
                  <div class="row g-0">
                    <div class="col-lg-8">
                      <div class="p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                          <h1 class="fw-bold mb-0 text-black">Product Details</h1>
                          <h6 class="mb-0 text-muted">1 item</h6>
                        </div>
                        <hr class="my-4">

                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                          <div class="col-md-4 col-lg-4 col-xl-4">
                            <img src="./images/<?php echo $product['img']; ?>" class="img-fluid rounded-3" alt="<?php echo $product['title']; ?>">
                          </div>
                          <div class="col-md-8 col-lg-8 col-xl-8">
                            <h6 class="text-muted">Product Category: <?php echo $product['category']; ?></h6>
                            <h3 class="text-black mb-0"><?php echo $product['title']; ?></h3>
                            <p class="mt-3"><b>Description :</b><?php echo $product['descr']; ?></p>
                          </div>
                        </div>

                        <hr class="my-4">

                        <div class="row mb-4 d-flex justify-content-between align-items-center">

                          <div class="col-md-3 col-lg-3 col-xl-3 d-flex">
                            <h5 class="mt-2">Quantity:</h5>
                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                              <i class="fas fa-minus"></i>
                            </button>
                            <input id="qty" min="1" max="10" name="quantity" value="1" type="number" class="form-control form-control-sm my-2" />
                            <button class="btn btn-link px-2" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                          <div class="col-md-6 col-lg-6 col-xl-6">
                            <h4 class="mb-0">Price: ₹<?php echo $product['price']; ?></h4>
                          </div>

                        </div>

                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                          <div class="col-md-6 col-lg-6 col-xl-6 d-flex">
                            <h5>Select Size:</h5>
                            <form id="size-form" class="d-flex" style="margin-left: 2rem;">
                              <div class="form-check " style="margin-left: 0.5rem;">
                                <input class="form-check-input" type="radio" name="size" id="small" value="Small">
                                <label class="form-check-label" for="small">Small</label>
                              </div>
                              <div class="form-check" style="margin-left: 0.5rem;">
                                <input class="form-check-input" type="radio" name="size" id="medium" value="Medium">
                                <label class="form-check-label" for="medium">Medium</label>
                              </div>
                              <div class="form-check" style="margin-left: 0.5rem;">
                                <input class="form-check-input" type="radio" name="size" id="large" value="Large">
                                <label class="form-check-label" for="large">Large</label>
                              </div>
                            </form>
                          </div>
                        </div>

                        <hr class="my-4">

                        <div class="pt-5">
                          <h6 class="mb-0"><a href="./index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 bg-grey">
                      <div class="p-5">
                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                        <hr class="my-4">

                        <div class="d-flex justify-content-between mb-4">
                          <h5 class="text-uppercase">Total Price:</h5>
                          <h5 class="" id="total-price"> ₹<?php echo $product['price']; ?></h5>
                        </div>

                        <hr class="my-4">

                        <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark" id="checkout-button">
                          Checkout
                        </button>
                        <!-- ... Your existing HTML code ... -->

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
                          <button type="submit"  class="btn btn-dark btn-block mt-1"  name="addtocart">Add to Cart</button>
                        </form>


                        <!-- ... The rest of your HTML code ... -->

                        <img id="loading-gif" src="./img/checkout.gif" alt="Loading" style="display: none; width: 150px">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script>
        const quantityInput = document.getElementById("qty");
        const totalPriceElement = document.getElementById("total-price");
        const productPrice = <?php echo $product['price']; ?>;

        quantityInput.addEventListener("input", function() {
          const quantity = parseInt(quantityInput.value);
          const total = productPrice * quantity;
          totalPriceElement.textContent = `₹${total.toFixed(2)}`;
        });
      </script>
      <script>
        const checkoutButton = document.getElementById("checkout-button");
        const loadingGif = document.getElementById("loading-gif");

        checkoutButton.addEventListener("click", function() {
          // Hide the Checkout button
          checkoutButton.style.display = "none";

          // Display the loading GIF
          loadingGif.style.display = "block";

          setTimeout(function() {
            // After a delay, you can redirect the user to the checkout page or perform any other action
            window.location.href = "checkout.php";
          }, 2000); // Adjust the delay time as needed
        });
      </script>

      <script src="https://cdn.jsdelivr.net/npm bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>

    </html>
<?php
  } else {
    echo "Product not found.";
  }
} else {
  echo "Product ID not provided.";
}
?>