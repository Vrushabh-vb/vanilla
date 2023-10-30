<?php
session_start();
require 'navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database (replace with your database credentials)
    $db = new mysqli("localhost", "root", "", "ecom");

    // Check for a database connection error
    if ($db->connect_error) {
        die("Database connection failed: " . $db->connect_error);
    }

    // Retrieve user registration data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $pincode = $_POST["pincode"];
    $phone = $_POST["phone"];


    // Insert user data into the 'users' table

    $insert_query = "INSERT INTO signup (username, password, email, address, pincode, phone) VALUES ('$username', '$password', '$email', '$address', '$pincode', '$phone')";
    if ($db->query($insert_query) === TRUE) {
        echo "Registration successful. You can now log in.";
        header("Location: login.php");
    } else {
        echo "Error: " . $insert_query . "<br>" . $db->error;
    }

    // Close the database connection
    $db->close();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <!-- Include Bootstrap CSS from a CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card" style="width:25rem">
                    <div class="card-body" style="width:25rem">
                        <h2 class="card-title text-center">Sign Up</h2>
                        <form method="post" action="signup.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="pincode" class="form-label">Pincode:</label>
                                <input type="text" name="pincode" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number:</label>
                                <input type="text" name="phone" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address:</label>
                                <!-- <input type="textarea" name="address" class="form-control" required> -->
                                <textarea name="address" id="" class="form-control" cols="10" rows="3" required></textarea>
                            </div>


                            <button type="submit" class="btn btn-dark btn-block">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS from a CDN if needed -->

    <?php require 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>