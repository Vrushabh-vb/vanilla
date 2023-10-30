<?php
require 'dbconnect.php';
require 'navbar.php';

// Search query
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Price filter
$priceFilter = isset($_GET['priceFilter']) ? $_GET['priceFilter'] : 'all';

// Determine the sorting order based on the price filter
if ($priceFilter == 'low_to_high') {
    $priceOrder = "ASC";
} elseif ($priceFilter == 'high_to_low') {
    $priceOrder = "DESC";
} else {
    $priceOrder = ""; // No specific ordering
}

// SQL query to include search and price filter
$sql = "SELECT * FROM cards WHERE title LIKE '%$search%'";

if (!empty($priceOrder)) {
    $sql .= " ORDER BY price $priceOrder";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <!-- <link rel="stylesheet" href="./css/utils.css" /> -->
    <link rel="shortcut icon" href="./img/clogo.png"  type="image/x-icon">
 
</head>

<body>
    <div class="d-flex flex-wrap">
        <!-- Filter Form on the Left Side -->
        <div class="col-md-2 col-sm-3 m-3 mt-3">
            <div class="sticky-top">
                <h2 class="m-4 text-center mt-4"><b>Filters</b></h2>
                <form method="GET" action="all.php">
                    <!-- Price filter options -->
                    <div class="mb-3">
                        <label for="priceFilter" class="form-label">Filter by Price:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceFilter" id="priceAll" value="all" <?php if ($priceFilter == 'all') echo 'checked'; ?>>
                            <label class="form-check-label" for="priceAll">All</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceFilter" id="priceLowToHigh" value="low_to_high" <?php if ($priceFilter == 'low_to_high') echo 'checked'; ?>>
                            <label class="form-check-label" for="priceLowToHigh">Low to High</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="priceFilter" id="priceHighToLow" value="high_to_low" <?php if ($priceFilter == 'high_to_low') echo 'checked'; ?>>
                            <label class="form-check-label" for="priceHighToLow">High to Low</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                </form>
            </div>
        </div>
        <!-- End Filter Form on the Left Side -->

        <!-- Product Display -->
        <div class="col-md-9">
            <div class="container py-5 d-flex flex-wrap">
                <div class="row">
                    <section class=" mt-3" id="allproducts" style="background-color: #ffffff;">
                        <div class="sticky-toptrendings mt-1" id="trendings">
                        <img name="main-banner" src="https://assets.ajio.com/cms/AJIO/WEB/D-1.0-UHP-05102023-NewArrivals-Sectionheader.jpg" alt="1" style="position: relative; width: 100%;">
                        </div>
                        <div class="container py-5 d-flex flex-wrap">
                            <div class="row">
                                <?php
                                if ($result->num_rows > 0) {

                                    while ($row = $result->fetch_assoc()) {
                                  ?>
                                      <div class="col-md-6 col-lg-3 mb-4 mb-lg-3 mt-3" style="margin-left:30px;margin-right:30px">
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
                          
                                              <a href="product.php?product_id=<?php echo $row['pid']; ?>" class="btn btn-dark buy-now" id="tr">Buy Now</a>
                          
                                              <div class="icon">
                                                <i class="fas fa-shopping-cart m-1 "><a href="./card.php"><img src="./img/cart.png" alt="" style="width:1rem;"></i></a> <!-- Shopping cart icon -->
                                                <i class="far fa-heart m-1"><img src="./img/heart.png" alt="" style="width:1rem;"></i> <!-- Like icon -->
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
                </div>
            </div>
        </div>
        <!-- End Product Display -->
    </div>
     <!-- footer -->
     <?php require'footer.php'; ?>
</body>

</html>