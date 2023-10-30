<?php

require 'dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $insert_query = "INSERT INTO contactus (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($insert_query) === TRUE) {
        // inserted data Successfully !
 
        echo "<b>Thank you for contacting us. We will get back to you soon.</b>";
    } else {
        // Error handling if the query fails
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }

   
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Vanilla</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>

<body>
    <!-- Navigation Bar -->
    <div class="navv sticky-top">
        <?php require 'navbar.php' ?>
    </div>

    <!-- Contact Us Content -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Contact Us</h1>
                <p>If you have any questions, feedback, or inquiries, please don't hesitate to get in touch with us. We value your communication and strive to provide the best support to our customers.</p>
                <p>You can contact us through the following methods:</p>
                <ul>
                    <li><strong>Email:</strong> <a href="mailto:contact@vanilla.com">contact@vanilla.com</a></li>
                    <li><strong>Phone:</strong> <a href="tel:+1234567890">+1 (234) 567-890</a></li>
                    <li><strong>Address:</strong> 123 Vanilla Street, Rajarampuri 9th lane, Kolhapur</li>
                </ul>
            </div>
            <div class="col-md-6">
                <!-- Contact Form -->
                <form action="contactus.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Your Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                </form>
               
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php require 'footer.php'; ?>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
