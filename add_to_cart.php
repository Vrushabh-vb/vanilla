<?php
// Start the session
session_start();
require 'dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["user_id"])) {
    // Retrieve the user ID from the session
    $user_id = $_SESSION["user_id"];

    // Connect to the database (replace with your database credentials)
    $db = new mysqli("localhost", "root", "", "ecom");

    // Check for a database connection error
    if ($db->connect_error) {
        die("Database connection failed: " . $db->connect_error);
    }

    // Retrieve the product details from the form
    $product_id = $_GET["product_id"];
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $quantity = $_POST["quantity"];
    $category = $_POST["category"];
    $size = $_POST["size"];
    $price = $_POST["price"];
    $total_price = $price * $quantity;
    $img = $_POST["img"];

    // Insert the product data into the 'cart' table
    $insert_query = "INSERT INTO cart (user_id, product_id, product_name, description, qty, category, size, price, total_price, img)
                      VALUES ('$user_id', '$product_id', '$product_name', '$description', '$quantity', '$category', '$size', '$price', '$total_price', '$img')";

    if ($db->query($insert_query) === TRUE) {
        echo "Product added to the cart successfully!";
    } else {
        echo "Error: " . $insert_query . "<br>" . $db->error;
    }

    // Close the database connection
    $db->close();
}
?>

<!-- The rest of your product details page... -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="./img/clogo.png"  type="image/x-icon">
</head>

<body>
    <?php require 'navbar.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <section class="h-100 h-custom mt-0">
                <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col"><?php
    // Retrieve cart items from the database
     $user_id = $_SESSION["user_id"];
    $sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
    ?>
            

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="images/<?php echo $row['img']; ?>" class="img-fluid rounded-3" style="width: 120px;" alt="Product Image">
                                            <div class="flex-column ms-4">
                                                <p class="mb-2"><?php echo $row['product_name']; ?></p>
                                            </div>
                                        </div>
                                    </th>

                                    <td class="align-middle">
                                        <div class="col-md-3 col-lg-3 col-xl-3 d-flex">
                                            <h5 class="mt-2">Quantity:</h5>
                                            <button class="btn btn-link px-2 decrease-quantity" data-product="<?php echo $productId; ?>">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <input min="1" max="10" name="quantity" value="<?php echo $row['qty']; ?>" type="number" class="form-control form-control-sm my-2 quantity-input" style="width: 4rem;" data-product="<?php echo $productId; ?>" />
                                            <button class="btn btn-link px-2 increase-quantity" data-product="<?php echo $productId; ?>">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Price:</h5>
                                            <h5 class="product-price" data-product="<?php echo $productId; ?>"> ₹<?php echo $row['price']; ?></h5>
                                            <h5 class="text-uppercase">Total Price:</h5>
                                            <h5 class="total-price" data-product="<?php echo $productId; ?>"> ₹<?php echo $row['total_price']; ?></h5>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                    <?php
                }
            } else {
                echo "No item found.";
            }
                    ?>
                        </table>
                    </div>

                    <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px; ">
                        <div class="card-body p-4 margin-left:10rem;">
                            <div class="row">
                                <div class="col-lg-4 col-xl-3">
                                    <div class="d-flex justify-content-between" style="font-weight: 500;">
                                        <p class="mb-0">Shipping</p>
                                        <p class="mb-0" style="margin-left:5rem;">₹99</p>
                                    </div>
                                    <hr class="my-1">
                                    <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                                        <p class="mb-2">Total (tax included)</p>
                                        <!-- Here you can calculate and display the total price for the items in the cart -->
                                        <p class="mb-2" id="cart-total-price" style="margin-left:5rem;">total price here</p>
                                    </div>
                                    <button type="button" class="btn btn-dark btn-block btn-lg" id="checkout-button">
                                        <div class="d-flex justify-content-between">
                                            <span id="" class="">Checkout</span>

                                            <!-- You may need to adjust this ID based on your HTML structure -->
                                            <span id="checkout-total-price"></span>
                                            <img id="loading-gif" src="./img/checkout.gif" alt="Loading" style="display: none; width: 150px">
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </section>

            <!-- footer -->
            <?php require'footer.php'; ?>
</body>

</html>

<script>
    // Get all quantity input elements
    const quantityInputs = document.querySelectorAll(".quantity-input");

    // Attach event listeners to each quantity input
    quantityInputs.forEach(function(input) {
        input.addEventListener("input", function() {
            const productId = input.getAttribute("data-product");
            const productPrice = parseFloat(document.querySelector(`.product-price[data-product="${productId}"]`).textContent.replace("₹", ""));
            const quantity = parseInt(input.value);
            const total = productPrice * quantity;
            const totalElement = document.querySelector(`.total-price[data-product="${productId}"]`);
            totalElement.textContent = `₹${total.toFixed(2)}`;

            // Calculate and update the cart total price
            updateCartTotalPrice();
        });
    });

    // Attach event listeners to increase and decrease buttons
    const increaseButtons = document.querySelectorAll(".increase-quantity");
    const decreaseButtons = document.querySelectorAll(".decrease-quantity");

    increaseButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            const productId = button.getAttribute("data-product");
            const input = document.querySelector(`.quantity-input[data-product="${productId}"]`);
            input.stepUp();
            input.dispatchEvent(new Event("input"));
        });
    });

    decreaseButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            const productId = button.getAttribute("data-product");
            const input = document.querySelector(`.quantity-input[data-product="${productId}"]`);
            input.stepDown();
            input.dispatchEvent(new Event("input"));
        });
    });

    // Function to update the cart total price
    function updateCartTotalPrice() {
        const totalPrices = document.querySelectorAll(".total-price");
        let cartTotal = 0;

        totalPrices.forEach(function(totalPrice) {
            cartTotal += parseFloat(totalPrice.textContent.replace("₹", ""));
        });

        // Update the cart total price display
        const cartTotalPriceElement = document.getElementById("cart-total-price");
        if (cartTotalPriceElement) {
            cartTotalPriceElement.textContent = `₹${cartTotal.toFixed(2)}`;
        }

        // Update the checkout total price display
        const checkoutTotalPriceElement = document.getElementById("checkout-total-price");
        if (checkoutTotalPriceElement) {
            checkoutTotalPriceElement.textContent = `₹${cartTotal.toFixed(2)}`;
        }
    }

    // Initial update of the cart total price
    updateCartTotalPrice();
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
            // After a delay
            window.location.href = "checkout.php";
        }, 1000); //  delay time
    });
</script>