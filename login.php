<?php
require 'navbar.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database (replace with your database credentials)
    $db = new mysqli("localhost", "root", "", "ecom");

    // Check for a database connection error
    if ($db->connect_error) {
        die("Database connection failed: " . $db->connect_error);
    }

    // Retrieve user login data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Fetch the user's data from the 'signup' table
    $select_query = "SELECT id, username, password FROM signup WHERE username = '$username'";
    $result = $db->query($select_query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $user_id = $row["id"];
        $stored_password = $row["password"];

        
        if ($password === $stored_password) {
            // Password is correct, set the user session
            $_SESSION["user_id"] = $user_id;
            $_SESSION['username'] = $username;
            header("Location: index.php");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }

    // Close the database connection
    $db->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Login</h2>
                        <form method="post" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-dark btn-block">Log In</button>
                            
                            <a href="signup.php"><button type="button" class="btn btn-info">sign up</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS from a CDN if needed -->
   <?php require'footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
